<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BypassAuthForLocal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        // Check if the environment is 'local' and the user is not authenticated
        if (app()->environment('local') && !Auth::check()) {
            // Automatically log in the first user or any test user
            Auth::login(User::first());
        }

        return $next($request);
    }
}
