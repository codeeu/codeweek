<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckConsent
{
    public function handle($request, Closure $next)
    {
        $excludedRoutes = [
            'consent.show',
            'consent.store',
            'consent.logout',
        ];

        if (Auth::check() && !Auth::user()->hasGivenConsent()) {
            if (!in_array($request->route()->getName(), $excludedRoutes)) {
                return redirect()->route('consent.show');
            }
        }

        return $next($request);
    }
}
