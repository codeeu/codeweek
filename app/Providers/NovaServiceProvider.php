<?php

namespace App\Providers;

use App\Nova\Dashboards\Main;
use App\Nova\Metrics\EventCount;
use App\Nova\Metrics\EventsPerDay;
use App\Nova\Metrics\ImporterTrend;
use App\Nova\Metrics\MeetCodeTrend;
use App\Nova\Metrics\UsersPerDay;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Illuminate\Http\Request;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();

        // Ensure dashboards are registered at boot so /nova/dashboards/main is always available
        // (ServingNova also registers them per-request; this covers edge cases)
        Nova::dashboards($this->dashboards());

//        Nova::mainMenu(function (Request $request) {
//            return [
//                MenuSection::dashboard(Main::class)->icon('chart-bar'),
//
//                MenuSection::make('Customers', [
//                    MenuItem::resource(User::class),
//                    MenuItem::resource(License::class),
//                ])->icon('user')->collapsable(),
//
//                MenuSection::make('Content', [
//                    MenuItem::resource(Series::class),
//                    MenuItem::resource(Release::class),
//                ])->icon('document-text')->collapsable(),
//            ];
//        });
    }

    /**
     * Register the Nova routes.
     */
    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewNova', function ($user) {
            return $user->hasRole('super admin') || $user->hasRole('ambassador') || $user->hasRole('resource editor');
        });
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     */
    public function tools(): array
    {
        return [];
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
