<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\EventCount;
use App\Nova\Metrics\EventsPerDay;
use App\Nova\Metrics\ImporterTrend;
use App\Nova\Metrics\MeetCodeTrend;
use App\Nova\Metrics\UsersPerDay;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * URI key for the dashboard (must match Nova's default route /nova/dashboards/main).
     *
     * @return string
     */
    public function uriKey()
    {
        return 'main';
    }

    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new MeetCodeTrend,
            new ImporterTrend,
            new EventCount,
            new EventsPerDay,
            new UsersPerDay,
        ];
    }
}
