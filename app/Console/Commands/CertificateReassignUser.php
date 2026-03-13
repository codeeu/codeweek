<?php

namespace App\Console\Commands;

use App\Excellence;
use App\User;
use Illuminate\Console\Command;

class CertificateReassignUser extends Command
{
    protected $signature = 'certificate:reassign-user
                            {--from-email= : Current account email (certificates will be moved FROM this user)}
                            {--from-user-id= : Alternatively, source user ID (use when the from user no longer exists by email)}
                            {--to-email= : Target account email (certificates will be moved TO this user)}
                            {--dry-run : List what would be moved, do not update}';

    protected $description = 'Reassign all Excellence/Super Organiser certificate rows from one user to another (e.g. after email change)';

    public function handle(): int
    {
        $fromEmail = trim((string) $this->option('from-email'));
        $fromUserId = $this->option('from-user-id');
        $toEmail = trim((string) $this->option('to-email'));
        $dryRun = (bool) $this->option('dry-run');

        if ($toEmail === '') {
            $this->error('Provide --to-email (target account).');
            return self::FAILURE;
        }
        if ($fromEmail === '' && ($fromUserId === null || $fromUserId === '')) {
            $this->error('Provide either --from-email or --from-user-id (source of certificates).');
            return self::FAILURE;
        }

        $fromUser = null;
        $fromLabel = '';
        if ($fromUserId !== null && $fromUserId !== '') {
            $fromUser = User::find((int) $fromUserId);
            $fromLabel = 'user_id ' . (int) $fromUserId;
        } else {
            $fromUser = User::where('email', $fromEmail)->first();
            $fromLabel = $fromEmail;
        }

        if (! $fromUser) {
            $this->error('Source user not found: ' . ($fromLabel ?: $fromEmail));
            return self::FAILURE;
        }

        if ($fromEmail !== '' && strtolower($fromUser->email) === strtolower($toEmail)) {
            $this->error('From and to must be different.');
            return self::FAILURE;
        }

        $toUser = User::where('email', $toEmail)->first();
        if (! $toUser) {
            $this->error("User not found: {$toEmail}");
            return self::FAILURE;
        }

        if ($fromUser->id === $toUser->id) {
            $this->error('From and to user are the same. Nothing to do.');
            return self::FAILURE;
        }

        $rows = Excellence::where('user_id', $fromUser->id)->orderBy('edition')->orderBy('type')->get();

        if ($rows->isEmpty()) {
            $this->info("No certificate rows found for {$fromLabel} (user_id {$fromUser->id}). Nothing to move.");
            return self::SUCCESS;
        }

        $this->info("Found {$rows->count()} certificate row(s) for {$fromLabel} (user_id {$fromUser->id}).");
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

        // Check first: target must not already have an excellence for the same edition+type (unique constraint)
        $conflicts = [];
        foreach ($rows as $e) {
            $exists = Excellence::where('user_id', $toUser->id)
                ->where('edition', $e->edition)
                ->where('type', $e->type)
                ->exists();
            if ($exists) {
                $conflicts[] = "edition {$e->edition}, type {$e->type}";
            }
        }
        if (count($conflicts) > 0) {
            $this->newLine();
            $this->error('Cannot reassign: target user already has certificate(s) for the same edition+type:');
            foreach ($conflicts as $c) {
                $this->line('  - ' . $c);
            }
            $this->line('Resolve duplicates (e.g. merge or delete one side) before reassigning.');
            return self::FAILURE;
        }

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
