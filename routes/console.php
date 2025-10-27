<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('delete:unactiveusers')->weeklyOn(4, '8:00');

Schedule::command('remind:ambassadors')->dailyAt('9:00');

Schedule::command('remind:creators')->dailyAt('10:00');

Schedule::command('clean:remote')->dailyAt('12:05');

Schedule::command('import:eeducation')->dailyAt('04:00');

Schedule::command('notify:administrators')->hourlyAt(30);

Schedule::command('rss:meetandcode')->hourlyAt(5);

Schedule::command('api:germany')->hourlyAt(10);

Schedule::command('magic:key')->hourlyAt(13);

Schedule::command('relocate')->hourlyAt(30);

Schedule::command('relocate:country')->everyTwoMinutes();

Schedule::command('certificate:issues')->hourlyAt(33);

//Schedule::command('certificates:fix')->everyFiveMinutes();

Schedule::command('app:sync-blogs')->dailyAt('1:00');
Schedule::command('app:export-search-data-to-json')->dailyAt('2:00');

Schedule::command('events:generate-recurring')->dailyAt('01:00');
