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
        if (! $this->isNovaDashboardRequest($request)) {
            return $next($request);
        }

        $hasMain = collect(Nova::$dashboards)->contains(function ($dashboard) {
            return $dashboard->uriKey() === 'main';
        });

        if (! $hasMain) {
            Nova::dashboards([new Main]);
        }

        return $next($request);
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
