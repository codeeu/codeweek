<?php

namespace App\Providers;

use App\Nova\Metrics\EventCount;
use App\Nova\Metrics\EventsPerDay;
use App\Nova\Metrics\ImporterTrend;
use App\Nova\Metrics\MeetCodeTrend;
use App\Nova\Metrics\UsersPerDay;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();
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
     * Get the cards that should be displayed on the Nova dashboard.
     */
    protected function cards(): array
    {
        return [
            new MeetCodeTrend,
            new ImporterTrend,
            new EventCount,
            new EventsPerDay,
            new UsersPerDay,

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
