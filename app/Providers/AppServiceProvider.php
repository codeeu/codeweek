<?php

namespace App\Providers;

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

        \View::composer(['event.add','event.search','profile'], function ($view) {
            $view->with('audiences', \App\Audience::all());
            $view->with('EUcountries', \App\Country::where('continent','=','EU')->orderBy('name','asc')->get());
            $view->with('themes', \App\Theme::orderBy('order', 'asc')->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
