<?php

namespace App\Services\Support;

use App\Models\Support\SupportCase;
use App\User;
use Illuminate\Database\Eloquent\Collection;
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
            currentFirstname: $parsed['current_firstname'] ?? null,
            currentLastname: $parsed['current_lastname'] ?? null,
        );
    }

    public function updateProfile(
        SupportCase $case,
        string $email,
        ?string $firstname,
        ?string $lastname,
        bool $dryRun,
        bool $viaEmailApproval = false,
        ?string $currentFirstname = null,
        ?string $currentLastname = null,
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

        $user = $this->resolveUserForProfileUpdate(
            $matches,
            $firstname,
            $lastname,
            $currentFirstname,
            $currentLastname,
        );
        if ($user === null) {
            return SupportJson::fail($tool, $input, [
                'ambiguous_user_match',
                'matched_user_ids: '.$matches->pluck('id')->implode(','),
            ]);
        }

        $warnings = $matches->count() > 1
            ? ['resolved_duplicate_email_to_user_id:'.$user->id]
            : [];

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
            ], $warnings);
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
            ], $warnings);
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
        ], $warnings);
    }

    /**
     * When multiple users share an email, pick the one that still needs the requested name change.
     *
     * @param  Collection<int, User>  $matches
     */
    private function resolveUserForProfileUpdate(
        Collection $matches,
        ?string $firstname,
        ?string $lastname,
        ?string $currentFirstname = null,
        ?string $currentLastname = null,
    ): ?User {
        if ($matches->count() === 1) {
            return $matches->first();
        }

        $active = $matches->filter(fn (User $user) => $user->deleted_at === null)->values();
        if ($active->count() === 1) {
            return $active->first();
        }

        $candidates = $active->isNotEmpty() ? $active : $matches->values();

        if ($currentFirstname !== null || $currentLastname !== null) {
            $byCurrent = $candidates->filter(
                fn (User $user) => $this->userMatchesCurrentNames($user, $currentFirstname, $currentLastname),
            )->values();
            if ($byCurrent->count() === 1) {
                return $byCurrent->first();
            }
            if ($byCurrent->isNotEmpty()) {
                $candidates = $byCurrent;
            }
        }

        $needingUpdate = $candidates->filter(function (User $user) use ($firstname, $lastname) {
            if ($firstname !== null && $firstname !== $user->firstname) {
                return true;
            }
            if ($lastname !== null && $lastname !== $user->lastname) {
                return true;
            }

            return false;
        });

        if ($needingUpdate->count() === 1) {
            return $needingUpdate->first();
        }

        if ($needingUpdate->count() > 1) {
            return $this->pickUserWithFewestChanges($needingUpdate, $firstname, $lastname);
        }

        return null;
    }

    private function userMatchesCurrentNames(User $user, ?string $currentFirstname, ?string $currentLastname): bool
    {
        if ($currentFirstname !== null && ! $this->namesEqual($currentFirstname, $user->firstname)) {
            return false;
        }
        if ($currentLastname !== null && ! $this->namesEqual($currentLastname, $user->lastname)) {
            return false;
        }

        return true;
    }

    /**
     * @param  Collection<int, User>  $candidates
     */
    private function pickUserWithFewestChanges(Collection $candidates, ?string $firstname, ?string $lastname): ?User
    {
        $ranked = $candidates->map(function (User $user) use ($firstname, $lastname) {
            $fieldsToChange = 0;
            if ($firstname !== null && $firstname !== $user->firstname) {
                $fieldsToChange++;
            }
            if ($lastname !== null && $lastname !== $user->lastname) {
                $fieldsToChange++;
            }

            $tieScore = 0;
            if ($firstname !== null && $this->namesEqual($firstname, $user->firstname)) {
                $tieScore += 2;
            }
            if ($lastname !== null && $user->lastname !== '' && $user->lastname !== 'Last Name') {
                $tieScore += 1;
            }

            return ['user' => $user, 'fields_to_change' => $fieldsToChange, 'tie_score' => $tieScore];
        })->sort(function (array $a, array $b): int {
            if ($a['fields_to_change'] !== $b['fields_to_change']) {
                return $a['fields_to_change'] <=> $b['fields_to_change'];
            }
            if ($a['tie_score'] !== $b['tie_score']) {
                return $b['tie_score'] <=> $a['tie_score'];
            }

            return $b['user']->id <=> $a['user']->id;
        })->values();

        if ($ranked->isEmpty()) {
            return null;
        }

        $best = $ranked->first();
        $sameRank = $ranked->filter(
            fn (array $row) => $row['fields_to_change'] === $best['fields_to_change']
                && $row['tie_score'] === $best['tie_score'],
        );

        return $sameRank->count() === 1 ? $best['user'] : null;
    }

    private function namesEqual(?string $a, ?string $b): bool
    {
        return Str::lower(trim((string) $a)) === Str::lower(trim((string) $b));
    }

    private function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
