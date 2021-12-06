<?php

namespace App\Achievements\Console;

use App\User;
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
                $user->resetExperience();
                $user->awardExperience($user->reported() * 2);
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
