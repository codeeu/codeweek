<?php

namespace App\Console\Commands;

use App\Helpers\EventHelper;
use App\Helpers\UserHelper;
use App\User;
use Illuminate\Console\Command;
use Log;

class RelocateEventsForUserWithNullEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'relocate:null';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Relocate Events for Users with Null Emails';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        //Get list of emails for events with creators having null emails
        $emails = EventHelper::getDistinctEmailsWithUsersHavingNullEmail();

        $this->info('Number of emails found with creator having null email: '.count($emails));

        //For each email, get the active user ID
        foreach ($emails as $email) {
            $user = UserHelper::getActiveUserByEmail($email);
            if ($user) {
                Log::info($email.' -> user: '.$user?->id ?? 'null');
                EventHelper::reassignActivities($user);
            } else {
                Log::info($email.' -> no user found '.$user?->id ?? 'null');
            }

        }
        //Delete all users with null email
        // User::withTrashed()->whereNull('email')->delete();

        // Get list of activities created by users with null emails
        //        $activities = EventHelper::getActivitiesWithUsersHavingNullEmail();

        //        Log::info('Number of activities linked to user with null email: '. count($activities));

        // Reassign each activity
        //        foreach ($activities as $activity) {
        //            EventHelper::reassignUser($activity->id);
        //        }

        return Command::SUCCESS;
    }
}
