<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureSuperCertificateAdmin
{
    /**
     * Handle an incoming request. Only a configured certificate admin can access.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowed = config('codeweek.certificate_admin_emails', []);

        if (empty($allowed)) {
            Log::warning('Certificate backend access denied: CERTIFICATE_ADMIN_EMAILS is not set.');

            abort(403, 'The certificate administrator list is not configured. Set CERTIFICATE_ADMIN_EMAILS.');
        }

        $email = $request->user()?->email;

        if ($email === null || ! in_array(strtolower($email), array_map('strtolower', $allowed), true)) {
            abort(403, 'Access denied. This area is restricted to the certificate administrator.');
        }

        return $next($request);
    }
}
