<?php

namespace App\Console;

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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('remind:ambassadors')
                  ->dailyAt('9:00');

        $schedule->command('remind:creators')
            ->dailyAt('10:00');

        $schedule->command('clean:remote')
            ->dailyAt('12:05');

        $schedule->command('import:eeducation')
            ->hourly();

        $schedule->command('notify:administrators')
            ->hourlyAt(30);

        $schedule->command('rss:meetandcode')
            ->hourlyAt(5);

        $schedule->command('api:germany')
            ->hourlyAt(10);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
