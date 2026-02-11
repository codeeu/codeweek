<?php

namespace App\Http\Middleware;

use App\Nova\Dashboards\Main;
use Closure;
use Illuminate\Http\Request;
use Laravel\Nova\Nova;
use Symfony\Component\HttpFoundation\Response;

class EnsureNovaMainDashboard
{
    /**
     * Ensure the Main dashboard is registered so /nova/dashboards/main resolves.
     * Handles edge cases (e.g. Octane flushState, registration order).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        self::ensureMainDashboardRegistered($request);

        return $next($request);
    }

    /**
     * Call from anywhere (e.g. web middleware) to ensure Main dashboard exists for Nova paths.
     */
    public static function ensureMainDashboardRegistered(Request $request): void
    {
        $path = $request->path();
        $isNova = $path === 'nova' || str_starts_with($path, 'nova/') || str_starts_with($path, 'nova-api/');
        if (! $isNova) {
            return;
        }

        $hasMain = collect(Nova::$dashboards)->contains(function ($dashboard) {
            return $dashboard->uriKey() === 'main';
        });

        if (! $hasMain) {
            Nova::dashboards([new Main]);
        }
    }

    private function isNovaDashboardRequest(Request $request): bool
    {
        $path = $request->path();

        return $path === 'nova/dashboards/main'
            || str_starts_with($path, 'nova/dashboards/')
            || $path === 'nova-api/dashboards/main'
            || str_starts_with($path, 'nova-api/dashboards/');
    }
}
