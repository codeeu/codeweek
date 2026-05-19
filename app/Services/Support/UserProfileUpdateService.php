<?php

namespace App\Services\Support;

use App\Models\Support\SupportCase;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserProfileUpdateService
{
    public function __construct(
        private readonly SupportProfileRequestParser $parser,
    ) {
    }

    /**
     * @param  array{email?: ?string, firstname?: ?string, lastname?: ?string}  $fields
     */
    public function updateFromCase(SupportCase $case, bool $dryRun, bool $viaEmailApproval = false): array
    {
        $parsed = $this->parser->parse((string) ($case->normalized_message ?? $case->raw_message ?? ''));
        $email = $case->target_email ?: $parsed['email'];

        return $this->updateProfile(
            case: $case,
            email: (string) $email,
            firstname: $parsed['firstname'],
            lastname: $parsed['lastname'],
            dryRun: $dryRun,
            viaEmailApproval: $viaEmailApproval,
        );
    }

    public function updateProfile(
        SupportCase $case,
        string $email,
        ?string $firstname,
        ?string $lastname,
        bool $dryRun,
        bool $viaEmailApproval = false,
    ): array {
        $tool = 'user_profile_update';
        $input = [
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'dry_run' => $dryRun,
        ];

        if (!$this->isValidEmail($email)) {
            return SupportJson::fail($tool, $input, 'invalid_email');
        }

        if ($firstname === null && $lastname === null) {
            return SupportJson::fail($tool, $input, 'no_profile_fields_to_update');
        }

        $normalized = trim(Str::lower($email));
        $matches = User::query()
            ->whereRaw('LOWER(email) = ?', [$normalized])
            ->orWhereRaw('LOWER(email_display) = ?', [$normalized])
            ->get();

        if ($matches->isEmpty()) {
            return SupportJson::fail($tool, $input, 'no_matching_user_found');
        }

        if ($matches->count() !== 1) {
            return SupportJson::fail($tool, $input, 'ambiguous_user_match');
        }

        /** @var User $user */
        $user = $matches->first();

        $before = [
            'user_id' => $user->id,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
        ];

        $changes = [];
        if ($firstname !== null && $firstname !== $user->firstname) {
            $changes['firstname'] = $firstname;
        }
        if ($lastname !== null && $lastname !== $user->lastname) {
            $changes['lastname'] = $lastname;
        }

        if ($changes === []) {
            return SupportJson::ok($tool, $input, [
                'dry_run' => $dryRun,
                'changes_planned' => [],
                'changes_applied' => [],
                'before' => $before,
                'after' => $before,
                'note' => 'profile_already_matches_requested_values',
            ]);
        }

        $planned = [
            'model' => 'user',
            'user_id' => $user->id,
            'change' => 'update_profile_names',
            'fields' => array_keys($changes),
        ];

        if ($dryRun) {
            $after = array_merge($before, $changes);

            return SupportJson::ok($tool, $input, [
                'dry_run' => true,
                'changes_planned' => [$planned],
                'changes_applied' => [],
                'before' => $before,
                'after' => $after,
            ]);
        }

        if (config('support_gmail.dry_run') && !$viaEmailApproval) {
            return SupportJson::fail($tool, $input, 'dry_run_mode_requires_email_approval');
        }

        DB::transaction(function () use ($user, $changes) {
            if (isset($changes['firstname'])) {
                $user->firstname = $changes['firstname'];
            }
            if (isset($changes['lastname'])) {
                $user->lastname = $changes['lastname'];
            }
            $user->save();
        });

        $user->refresh();

        $after = [
            'user_id' => $user->id,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
        ];

        return SupportJson::ok($tool, $input, [
            'dry_run' => false,
            'changes_planned' => [$planned],
            'changes_applied' => [$planned],
            'before' => $before,
            'after' => $after,
        ]);
    }

    private function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
