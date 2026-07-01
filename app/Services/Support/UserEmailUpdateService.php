<?php

namespace App\Services\Support;

use App\Models\Support\SupportCase;
use App\User;
use Illuminate\Support\Facades\DB;

class UserEmailUpdateService
{
    public function __construct(
        private readonly SupportEmailChangeRequestResolver $resolver,
    ) {
    }

    public function updateFromCase(SupportCase $case, bool $dryRun, bool $viaEmailApproval = false): array
    {
        $resolved = $this->resolver->resolve($case);

        return $this->updateEmail(
            case: $case,
            fromEmail: (string) ($resolved['from_email'] ?? ''),
            toEmail: (string) ($resolved['to_email'] ?? ''),
            dryRun: $dryRun,
            viaEmailApproval: $viaEmailApproval,
        );
    }

    public function updateEmail(
        SupportCase $case,
        string $fromEmail,
        string $toEmail,
        bool $dryRun,
        bool $viaEmailApproval = false,
    ): array {
        $tool = 'user_email_update';
        $from = SupportEmailAddress::normalize($fromEmail) ?? '';
        $to = SupportEmailAddress::normalize($toEmail) ?? '';
        $input = [
            'from' => $from,
            'to' => $to,
            'dry_run' => $dryRun,
        ];

        if (! $this->isValidEmail($from)) {
            return SupportJson::fail($tool, $input, 'invalid_from_email');
        }
        if (! $this->isValidEmail($to)) {
            return SupportJson::fail($tool, $input, 'invalid_to_email');
        }
        if ($from === $to) {
            return SupportJson::fail($tool, $input, 'from_and_to_emails_identical');
        }

        $matches = User::withTrashed()
            ->whereRaw('LOWER(email) = ?', [$from])
            ->orWhereRaw('LOWER(email_display) = ?', [$from])
            ->get();

        if ($matches->isEmpty()) {
            return SupportJson::fail($tool, $input, 'no_matching_user_found');
        }

        if ($matches->count() > 1) {
            return SupportJson::fail($tool, $input, [
                'ambiguous_user_match',
                'matched_user_ids: '.$matches->pluck('id')->implode(','),
            ]);
        }

        /** @var User $user */
        $user = $matches->first();

        $conflict = User::withTrashed()
            ->where('id', '<>', $user->id)
            ->where(function ($q) use ($to) {
                $q->whereRaw('LOWER(email) = ?', [$to])
                    ->orWhereRaw('LOWER(email_display) = ?', [$to]);
            })
            ->exists();

        if ($conflict) {
            return SupportJson::fail($tool, $input, 'to_email_already_in_use');
        }

        $wouldUpdateEmailDisplay = SupportEmailAddress::normalize((string) ($user->email_display ?? '')) === $from;

        $before = [
            'user_id' => $user->id,
            'email' => $user->email,
            'email_display' => $user->email_display,
            'email_verified_at' => optional($user->email_verified_at)->toISOString(),
        ];

        if (SupportEmailAddress::normalize((string) $user->email) === $to
            && (! $wouldUpdateEmailDisplay || SupportEmailAddress::normalize((string) ($user->email_display ?? '')) === $to)) {
            return SupportJson::ok($tool, $input, [
                'dry_run' => $dryRun,
                'before' => $before,
                'after' => $before,
                'would_update_email_display' => false,
                'note' => 'email_already_matches_requested_value',
            ]);
        }

        $after = [
            'user_id' => $user->id,
            'email' => $to,
            'email_display' => $wouldUpdateEmailDisplay ? $to : $user->email_display,
            'email_verified_at' => null,
        ];

        if ($dryRun) {
            return SupportJson::ok($tool, $input, [
                'dry_run' => true,
                'before' => $before,
                'after' => $after,
                'would_update_email_display' => $wouldUpdateEmailDisplay,
            ]);
        }

        if (config('support_gmail.dry_run') && ! $viaEmailApproval) {
            return SupportJson::fail($tool, $input, 'dry_run_mode_requires_email_approval');
        }

        DB::transaction(function () use ($user, $to, $wouldUpdateEmailDisplay) {
            $user->email = $to;
            if ($wouldUpdateEmailDisplay) {
                $user->email_display = $to;
            }
            if (property_exists($user, 'email_verified_at')) {
                $user->email_verified_at = null;
            }
            $user->save();
        });

        $user->refresh();

        return SupportJson::ok($tool, $input, [
            'dry_run' => false,
            'before' => $before,
            'after' => [
                'user_id' => $user->id,
                'email' => $user->email,
                'email_display' => $user->email_display,
                'email_verified_at' => optional($user->email_verified_at)->toISOString(),
            ],
            'would_update_email_display' => $wouldUpdateEmailDisplay,
        ]);
    }

    private function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
