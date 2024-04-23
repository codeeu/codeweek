<?php

namespace App\Console\Commands\clean;

use App\Event;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Germany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:germany';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extract users from German Imported Events';

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
    public function handle(): int
    {
        $events = Event::whereIn('codeweek_for_all_participation_code', ['cw20-baden', 'cw20-bonn', 'cw20-hamburg'])->get();

        $newUsers = [];
        $existingUsers = [];

        foreach ($events as $event) {
            $user = User::where(['email' => $event->user_email])->first();

            Log::info($event->id.' - '.$event->user_email);
            if ($user == null) {

                $newUsers[] = $event->user_email;

                //Create user
                $user = User::create(
                    [
                        'email' => $event->user_email,
                        'firstname' => $event->organizer,
                        'lastname' => '',
                        'username' => $event->organizer,
                        'password' => bcrypt(Str::random()),
                    ]);

            } else {
                //Add to existing if it has not been created previously by the script.
                if (! in_array($user->email, $newUsers)) {
                    $existingUsers[] = $user->email;
                }

            }

            //Update the event
            $event->creator_id = $user->id;
            $event->save();

        }

        //Log them all
        Log::info('===  REPORT START ===');
        Log::info('---------------------');
        Log::info('---------------------');
        Log::info('-- Existing Users ---');
        Log::info('---------------------');
        Log::info('---------------------');
        foreach (array_unique($existingUsers) as $existingUser) {
            Log::info($existingUser);
        }

        Log::info('---------------------');
        Log::info('---------------------');
        Log::info('--- Created Users ---');
        Log::info('---------------------');
        Log::info('---------------------');
        foreach (array_unique($newUsers) as $newUser) {
            Log::info($newUser);
        }
        Log::info('===  REPORT END ===');

    }
}
