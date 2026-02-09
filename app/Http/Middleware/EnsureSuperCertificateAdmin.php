<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSuperCertificateAdmin
{
    private const ALLOWED_EMAIL = 'bernard@matrixinternet.ie';

    /**
     * Handle an incoming request. Only the super certificate admin email can access.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || $request->user()->email !== self::ALLOWED_EMAIL) {
            abort(403, 'Access denied. This area is restricted to the certificate administrator.');
        }

        return $next($request);
    }
}
