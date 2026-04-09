<?php

namespace App\Console\Commands\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\SupportJson;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UserUpdateEmailCommand extends Command
{
    protected $signature = 'support:user-update-email {from} {to} {--dry-run} {--json}';

    protected $description = 'Support tool: update a user email address (dry-run supported)';

    public function handle(): int
    {
        $from = $this->normalizeEmail((string) $this->argument('from'));
        $to = $this->normalizeEmail((string) $this->argument('to'));
        $dryRun = (bool) $this->option('dry-run');

        $input = [
            'from' => $from,
            'to' => $to,
            'dry_run' => $dryRun,
        ];

        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'CLI: support:user-update-email',
            'raw_message' => 'CLI invocation',
            'normalized_message' => null,
            'status' => 'investigating',
            'risk_level' => 'high',
            'correlation_id' => SupportJson::correlationId(),
        ]);

        try {
            if (!$this->isValidEmail($from)) {
                throw new \InvalidArgumentException('Invalid FROM email.');
            }
            if (!$this->isValidEmail($to)) {
                throw new \InvalidArgumentException('Invalid TO email.');
            }
            if ($from === $to) {
                throw new \InvalidArgumentException('FROM and TO emails are identical.');
            }

            /** @var \Illuminate\Database\Eloquent\Collection<int, User> $matches */
            $matches = User::withTrashed()
                ->whereRaw('LOWER(email) = ?', [$from])
                ->orWhereRaw('LOWER(email_display) = ?', [$from])
                ->get();

            if ($matches->count() === 0) {
                $payload = SupportJson::fail('user_update_email', $input, 'No user found for FROM email (email or email_display).');
                $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));
                return self::FAILURE;
            }

            if ($matches->count() > 1) {
                $payload = SupportJson::fail('user_update_email', $input, [
                    'Multiple users match FROM email; refusing to update.',
                    'Matches: '.implode(', ', $matches->map(fn (User $u) => (string) $u->id)->all()),
                ]);
                $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));
                return self::FAILURE;
            }

            $user = $matches->first();
            if (!$user) {
                throw new \RuntimeException('Unexpected: missing matched user.');
            }

            $conflict = User::withTrashed()
                ->where('id', '<>', $user->id)
                ->where(function ($q) use ($to) {
                    $q->whereRaw('LOWER(email) = ?', [$to])
                        ->orWhereRaw('LOWER(email_display) = ?', [$to]);
                })
                ->exists();

            if ($conflict) {
                $payload = SupportJson::fail('user_update_email', $input, 'TO email already exists on another user (email or email_display).');
                $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));
                return self::FAILURE;
            }

            $before = [
                'id' => $user->id,
                'email' => $user->email,
                'email_display' => $user->email_display,
                'deleted_at' => $user->deleted_at?->toISOString(),
                'email_verified_at' => optional($user->email_verified_at)->toISOString(),
            ];

            $wouldUpdateEmailDisplay = ($this->normalizeEmail((string) ($user->email_display ?? '')) === $from);

            if (!$dryRun) {
                DB::transaction(function () use ($user, $to, $wouldUpdateEmailDisplay) {
                    $user->email = $to;
                    if ($wouldUpdateEmailDisplay) {
                        $user->email_display = $to;
                    }

                    // Email changed: require re-verification in case this is used for auth flows.
                    if (property_exists($user, 'email_verified_at')) {
                        $user->email_verified_at = null;
                    }

                    $user->save();
                });

                $user->refresh();
            }

            $after = [
                'id' => $user->id,
                'email' => $dryRun ? $to : $user->email,
                'email_display' => $dryRun
                    ? ($wouldUpdateEmailDisplay ? $to : $user->email_display)
                    : $user->email_display,
                'email_verified_at' => $dryRun ? null : optional($user->email_verified_at)->toISOString(),
            ];

            $result = [
                'support_case_id' => $case->id,
                'updated' => !$dryRun,
                'would_update_email_display' => $wouldUpdateEmailDisplay,
                'before' => $before,
                'after' => $after,
            ];

            $payload = SupportJson::ok('user_update_email', $input, $result);
        } catch (\Throwable $e) {
            $payload = SupportJson::fail('user_update_email', $input, $e->getMessage());
        }

        $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));

        return $payload['ok'] ? self::SUCCESS : self::FAILURE;
    }

    private function normalizeEmail(string $email): string
    {
        return strtolower(trim($email));
    }

    private function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

