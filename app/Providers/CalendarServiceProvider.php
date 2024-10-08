<?php

namespace App\Providers;

use App\Helpers\CalendarGenerator;
use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {

        $this->app->singleton('formatter', function ($app) {
            return new CalendarGenerator($app['request']);
        });

    }
}
