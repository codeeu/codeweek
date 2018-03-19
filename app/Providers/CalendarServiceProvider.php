<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Helpers\CalendarGenerator;

class CalendarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('formatter', function ($app) {
            return new CalendarGenerator($app['request']);
        });

    }
}
