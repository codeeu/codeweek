<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Unicodeveloper\Identify\Identify;

class CheckBrowser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        $identify = new Identify();
//        if (strcmp("Internet Explorer",$identify->browser()->getName()) == 0){
//            Log::info($identify->browser()->getName());
//            Log::info($identify->browser()->getVersion());
//            abort(403, 'We are sorry but we do not support Internet Explorer. Please use Microsoft Edge, Chrome or Firefox to access Codeweek.eu');
//        }

        return $next($request);
    }
}
