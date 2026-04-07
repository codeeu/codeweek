<?php

namespace App\Console\Commands;

use App\Jobs\ProcessUserDeletion;
use App\User;
use Illuminate\Console\Command;
use Throwable;

class DeleteUserAccount extends Command
{
    protected $signature = 'users:delete-account
                            {email : The email address of the account to delete}
                            {--dry-run : Show what would be deleted without deleting}
                            {--queue : Dispatch deletion through the queue instead of running immediately}
                            {--force : Skip confirmation prompt}';

    protected $description = 'Delete a user account by email and reassign related event ownership to the legacy user.';

    public function handle(): int
    {
        $email = mb_strtolower(trim((string) $this->argument('email')));

        /** @var User|null $user */
        $user = User::withTrashed()
            ->whereRaw('LOWER(email) = ?', [$email])
            ->first();

        if (!$user) {
            $this->error("No user found for email: {$email}");
            return self::FAILURE;
        }

        $this->info("Found user #{$user->id}: {$user->firstname} {$user->lastname} <{$user->email}>");

        if ($this->option('dry-run')) {
            $this->line('Dry run enabled. No changes were made.');
            return self::SUCCESS;
        }

        if (!$this->option('force')) {
            $confirmed = $this->confirm(
                "This will permanently delete user #{$user->id} ({$user->email}). Continue?",
                false
            );

            if (!$confirmed) {
                $this->line('Cancelled.');
                return self::SUCCESS;
            }
        }

        try {
            if ($this->option('queue')) {
                ProcessUserDeletion::dispatch($user->id);
                $this->info("Deletion job dispatched for user #{$user->id}.");
                return self::SUCCESS;
            }

            // Execute immediately for urgent/account-support requests.
            (new ProcessUserDeletion($user->id))->handle();
            $this->info("User #{$user->id} has been deleted.");

            return self::SUCCESS;
        } catch (Throwable $e) {
            $this->error("Failed to delete user #{$user->id}: {$e->getMessage()}");
            return self::FAILURE;
        }
    }
}
