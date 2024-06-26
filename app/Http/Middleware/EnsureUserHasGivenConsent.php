<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasGivenConsent
{
    public function handle($request, Closure $next)
    {

        if (Auth::check() && !Auth::user()->hasGivenConsent()) {
            return redirect()->route('consent.show');
        }

        return $next($request);
    }
}
