<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CleanUserWithNullEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:nulluser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Relocate events from user with a null email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get all the events by the user with null email
        $nullUserEvents = User::whereNull('email')->first()->events;
        $this->info('Events found for null email user:' . $nullUserEvents->count());

        // For each event, look at the user_email field
        foreach ($nullUserEvents as $event) {
            $userEmail = $event->user_email;
            //dump($userEmail);
            // See if an account exists with this user_email.
            $rightUser = User::firstWhere('email', '=', $userEmail);
            if ($rightUser !== null) {

                //  dump($rightUser->id);
                $event->creator_id = $rightUser->id;
                $event->save();
            } else {
                //Create a user
                $user = \App\User::create(
                    [
                        'email' => $userEmail,
                        'firstname' => '',
                        'lastname' => '',
                        'provider' => 'script',
                        'country_iso' => $event->country_iso
                    ]);

            }


        }

        // If yes, move the event to the user
        return 0;

    }
}
