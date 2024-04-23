<?php

namespace App\Achievements\Console;

use App\User;
use Illuminate\Console\Command;

class SyncUsersAchievements extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'badges:sync-users-achievements';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Award Badges if achievement is fulfilled';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        User::role('leading teacher')
            ->chunk(100, function ($users, $index) {
                $this->reportProgress($index);
                $users->each(function ($user) {
                    $user->achievements()->sync(
                        app('achievements')->filter->qualifier($user)->map->modelKey()
                    );
                });
            });
    }

    protected function reportProgress($index): void
    {
        $from = ($index - 1) * 100;
        $to = ($index - 1) * 100 + 100;
        $this->info("Progress for users {$from} - {$to}");
    }
}
