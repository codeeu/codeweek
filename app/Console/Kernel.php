<?php

namespace App\Console;

use App\Achievements\Console\GenerateAchievementCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        GenerateAchievementCommand::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

        $schedule->command('delete:unactiveusers')->weeklyOn(4, '8:00');

        $schedule->command('remind:ambassadors')->dailyAt('9:00');

        $schedule->command('remind:creators')->dailyAt('10:00');

        $schedule->command('clean:remote')->dailyAt('12:05');

        $schedule->command('import:eeducation')->dailyAt('04:00');

        $schedule->command('notify:administrators')->hourlyAt(30);

        $schedule->command('rss:meetandcode')->hourlyAt(5);

        $schedule->command('api:germany')->hourlyAt(10);

        $schedule->command('magic:key')->hourlyAt(13);

        $schedule->command('relocate')->hourlyAt(30);

        $schedule->command('relocate:country')->everyTwoMinutes();

        $schedule->command('certificate:issues')->hourlyAt(33);

        $schedule->command('certificates:fix')->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
