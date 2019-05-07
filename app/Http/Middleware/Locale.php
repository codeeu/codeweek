<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class Locale
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

        Log::info("In language detection middleware");
        Log::info("Lang detected: " . $request->lang);
        if (isset($request->lang)) {

            if (in_array($request->lang, config('app.locales'))) {
                session(['locale' => $request->lang]);
            }
            Log::info("Session Locale: " . session('locale'));
        }

        $raw_locale = session('locale');
        //dd(Config::get('app.locales'));
        if (in_array($raw_locale, Config::get('app.locales'))) {
            $locale = $raw_locale;
        }
        else $locale = Config::get('app.locale');
        App::setLocale($locale);

        return $next($request);
    }
}