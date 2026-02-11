<?php

namespace App\Providers;

use App\City;
use App\Country;
use App\Event;
use App\Observers\EventObserver;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Lang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
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
            ['event.add', 'event.search', 'event.edit'],
            function ($view) {
                $audiences = \App\Audience::all()->map(function ($audience) {
                    $audience->name = __('event.audience.' . $audience->name);
                    return $audience;
                });
        
                $themes = \App\Theme::orderBy('order', 'asc')->get()->map(function ($theme) {
                    $theme->name = __('event.theme.' . $theme->name);
                    return $theme;
                });

                $activeCountries = \App\Country::withEvents();

                $view->with('audiences', $audiences);
                $view->with('activity_types', \App\ActivityType::list());
                $view->with('countries', \App\Country::translated());
                $view->with('languages', Arr::sort(Lang::get('base.languages')));
                $view->with('active_countries', $activeCountries);
                $view->with('themes', $themes);
            }
        );

        \View::composer(['community', 'profile'], function ($view) {
            $supportedCountries = [
                'GR',
                'CY',
                'MT',
                'IT',
                'BG',
                'TR',
                'UA',
                'PL',
                'IE',
                'FR',
                'LU',
                'NL',
                'BE',
                'SK',
                'CZ',
                'NO',
                'IS',
                'FI',
                'SE',
                'PT',
                'ES',
                'LV',
                'LT',
                'HR',
                'SI',
                'DE',
                'AT',
                'CH',
                'RO',
                'MD',
                'DK',
                'HU',
            ];

            $activeCountries = Country::query()->orderBy('name')->get();

            $cities = City::query()
                    ->whereIn('country_iso', $activeCountries->pluck('iso'))
                    ->select(['id', 'city', 'country_iso'])
                    ->orderBy('country_iso')
                    ->orderBy('city')
                    ->get();

            $view->with('cities', $cities);
            $view->with('active_countries', $activeCountries);
            $view->with('supportedCountries', $supportedCountries);
        });

        \View::composer(['stats'], function ($view) {
            $view->with('active_countries', \App\Country::withEvents());
        });

        View::composer('static.girls-in-digital-week', \App\Http\View\Composers\GirlsInDigitalComposer::class);

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

         // Register the Minecraft Blade component
        Blade::component('homepage.minecraft', 'minecraft');

         //Livewire::paginationView('vendor.livewire.pagination');

        $this->bootAuth();
        $this->bootEvent();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(
                \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class
            );
        }
        $this->app->bind(\Illuminate\Contracts\Debug\ExceptionHandler::class, \App\Exceptions\Handler::class);
    }

    public function bootAuth(): void
    {
        Gate::define('report-excellence', function ($user, $edition) {

            $excellences = $user->excellences;

            $collection = $excellences->filter(
                function ($value, $key) use ($edition) {
                    return $value->edition == $edition;
                }
            );

            return $collection->count() > 0;
        });

        Gate::define('report-super-organiser', function ($user, $edition) {

            $superOrganisers = $user->superOrganisers;

            $collection = $superOrganisers->filter(
                function ($value, $key) use ($edition) {
                    return $value->edition == $edition;
                }
            );

            return $collection->count() > 0;
        });

    }

    public function bootEvent(): void
    {

        Event::observe(EventObserver::class);
    }
}
