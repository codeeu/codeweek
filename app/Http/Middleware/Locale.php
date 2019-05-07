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

        if (isset($request->lang)) {
            $lang = strtolower($request->lang);
            if (in_array($lang, config('app.locales'))) {
                session(['locale' => $lang]);
            }
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