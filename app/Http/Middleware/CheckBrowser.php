<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Log;

class CheckBrowser
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (isset($_SERVER) && isset($_SERVER['HTTP_USER_AGENT'])) {
            $ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
            if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0') !== false && strpos($ua, 'rv:11.0') !== false)) {
                // do stuff for IE
                Log::info($ua);
                abort(403, 'We are sorry but we do not support Internet Explorer. Please use Microsoft Edge, Chrome or Firefox to access Codeweek.eu');
            }
        }

        return $next($request);
    }
}
