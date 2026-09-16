<?php

namespace App\Console\Commands;

use App\Jobs\ProcessUserDeletion;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SoftDeleteUsersWithoutConsent extends Command
{
    protected $signature = 'users:delete-without-consent';
    protected $description = 'Delete users who have not given consent and transfer their data to legacy user';

    public function handle()
    {
        $this->info('Creating or verifying legacy user...');

        // Create legacy user if it doesn't exist
        $legacyUser = User::firstOrCreate(
            ['id' => 1000000],
            [
                'firstname' => 'Codeweek Legacy User',
                'lastname' => 'Codeweek Legacy',
                'username' => 'codeweek-legacy',
                'password' => Hash::make(Str::random(40)),
                'email' => 'legacy@codeweek.eu',
                'country_iso' => 'BE',
                'remember_token' => Str::random(60),
                'privacy' => 1,
                'email_display' => 'legacy@codeweek.eu',
                'receive_emails' => 0,
                'magic_key' => 2520090911,
                'consent_given_at' => now(),
                'future_consent_given_at' => now(),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // 'approved' is guarded against mass assignment, so set it explicitly.
        if (! $legacyUser->approved) {
            $legacyUser->approved = 1;
            $legacyUser->save();
        }

        $this->info('Starting to process users without consent...');

        // Get users without consent in chunks to avoid memory issues
        User::whereNull('consent_given_at')
            ->where('id', '!=', 1000000) // Exclude the legacy user
            ->chunkById(100, function ($users) {
                foreach ($users as $user) {
                    ProcessUserDeletion::dispatch($user->id);
                    $this->info("Dispatched deletion job for user ID: {$user->id}");
                }
            });

        $this->info('All deletion jobs have been dispatched. Check the queue worker logs for progress.');
    }
}
