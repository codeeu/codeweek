<?php

namespace App\Achievements\Console;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SyncExperience extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'badges:sync-xp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync users XP';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        User::role("leading teacher")->chunk(100, function($users, $index){
            $this->reportProgress($index);
            $users->each(function($user){
                for ($year = 2018; $year <= Carbon::now()->year; $year++ ){
                    $user->resetExperience($year);
                    $user->awardExperience($user->reported($year) * 2, $year);
                }

            });
        });
    }

    /**
     * @param $index
     */
    protected function reportProgress($index): void
    {
        $from = ($index - 1) * 100;
        $to = ($index - 1) * 100 + 100;
        $this->info("Syncing points for users {$from} - {$to}");
    }
}
