<?php

namespace App\Http\Controllers;

use App\Helpers\EventHelper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class StaticPageController extends Controller
{
    public function index(Request $request)
    {
        $routeName = Route::currentRouteName();
        $actual_language = session('locale');
        $view = 'static.' . $actual_language . '.' . $routeName;
        if(!view()->exists($view)){
            $default_language = \Config::get('app.fallback_locale');
            $view = 'static.' . $default_language . '.' . $routeName;
        }
        if ($routeName == 'resources') {
            $countries =
                ["austria", "belarus", "belgium", "bulgaria", "china", "croatia", "cyprus", "czech_republic", "denmark", "estonia", "finland", "france", "germany",
                    "greece", "hungary", "iceland", "ireland", "isle_of_man", "italy", "kosovo", "latvia", "lithuania", "luxembourg", "malta", "moldova", "netherlands", "norway", "poland",
                    "portugal", "romania", "serbia", "slovakia", "slovenia", "spain", "sweden", "switzerland", "turkey", "ukraine", "united_kingdom"];

            return view($view, compact('countries'));

        }else {

            return view($view);
        }

    }


}
