<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::share('locales', config('app.locales'));

        \View::composer(['event.add','event.search','profile','event.edit'], function ($view) {
            $view->with('audiences', \App\Audience::all());
            $view->with('active_countries', \App\Country::withEvents());
            $view->with('themes', \App\Theme::orderBy('order', 'asc')->get());
        });

        \View::composer(['stats'], function ($view) {

            $view->with('active_countries', \App\Country::withEvents());

        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
