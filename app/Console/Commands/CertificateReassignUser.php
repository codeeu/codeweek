<?php

namespace App\Console\Commands;

use App\Excellence;
use App\User;
use Illuminate\Console\Command;

class CertificateReassignUser extends Command
{
    protected $signature = 'certificate:reassign-user
                            {--from-email= : Current account email (certificates will be moved FROM this user)}
                            {--to-email= : Target account email (certificates will be moved TO this user)}
                            {--dry-run : List what would be moved, do not update}';

    protected $description = 'Reassign all Excellence/Super Organiser certificate rows from one user to another (e.g. after email change)';

    public function handle(): int
    {
        $fromEmail = trim((string) $this->option('from-email'));
        $toEmail = trim((string) $this->option('to-email'));
        $dryRun = (bool) $this->option('dry-run');

        if ($fromEmail === '' || $toEmail === '') {
            $this->error('Provide both --from-email and --to-email.');
            return self::FAILURE;
        }

        if (strtolower($fromEmail) === strtolower($toEmail)) {
            $this->error('From and to email must be different.');
            return self::FAILURE;
        }

        $fromUser = User::where('email', $fromEmail)->first();
        $toUser = User::where('email', $toEmail)->first();

        if (! $fromUser) {
            $this->error("User not found: {$fromEmail}");
            return self::FAILURE;
        }
        if (! $toUser) {
            $this->error("User not found: {$toEmail}");
            return self::FAILURE;
        }

        $rows = Excellence::where('user_id', $fromUser->id)->orderBy('edition')->orderBy('type')->get();

        if ($rows->isEmpty()) {
            $this->info("No certificate rows found for {$fromEmail} (user_id {$fromUser->id}). Nothing to move.");
            return self::SUCCESS;
        }

        $this->info("Found {$rows->count()} certificate row(s) for {$fromEmail} (user_id {$fromUser->id}).");
        $this->info("Target: {$toEmail} (user_id {$toUser->id}).");
        $this->newLine();

        $table = $rows->map(fn (Excellence $e) => [
            $e->id,
            $e->edition,
            $e->type,
            $e->certificate_url ? 'Yes' : 'No',
            $e->notified_at ? 'Yes' : 'No',
        ])->toArray();
        $this->table(['id', 'edition', 'type', 'has PDF', 'sent'], $table);

        if ($dryRun) {
            $this->newLine();
            $this->warn('Dry run: no changes made. Run without --dry-run to reassign.');
            return self::SUCCESS;
        }

        if (! $this->confirm('Reassign these rows to ' . $toEmail . '?')) {
            $this->info('Aborted.');
            return self::SUCCESS;
        }

        $updated = Excellence::where('user_id', $fromUser->id)->update(['user_id' => $toUser->id]);

        $this->info("Done. Reassigned {$updated} row(s) to {$toEmail}. Certificates will now appear under the target account.");
        return self::SUCCESS;
    }
}
