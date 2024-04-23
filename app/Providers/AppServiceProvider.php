<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //        Model::shouldBeStrict(!$this->app->isProduction());

        Password::defaults(function () {
            return Password::min(10)->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised();
        });

        View::share('locales', config('app.locales'));

        Carbon::setLocale('app.locale');
        \View::composer(
            ['event.add', 'event.search', 'profile', 'event.edit'],
            function ($view) {
                $view->with('audiences', \App\Audience::all());
                $view->with('activity_types', \App\ActivityType::list());
                $view->with('countries', \App\Country::translated());
                $view->with('active_countries', \App\Country::withEvents());
                $view->with(
                    'themes',
                    \App\Theme::orderBy('order', 'asc')->get()
                );
            }
        );

        \View::composer(['stats'], function ($view) {
            $view->with('active_countries', \App\Country::withEvents());
        });

        /**
         * Paginate a standard Laravel Collection.
         *
         * @param  int  $perPage
         * @param  int  $total
         * @param  int  $page
         * @param  string  $pageName
         * @return array
         */
        Collection::macro('paginate', function (
            $perPage,
            $total = null,
            $page = null,
            $pageName = 'page'
        ) {
            $page =
                $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
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
            $this->app->register(
                \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class
            );
        }
    }
}
