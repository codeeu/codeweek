<?php

namespace App\Http\Controllers;

use App\Country;
use App\Queries\CountriesQuery;
use App\Queries\OnlineEventsQuery;
use Illuminate\Http\Request;

class OnlineEventsController extends Controller
{
    public function list(Country $country = null){
        //List of online events per country
        $events = OnlineEventsQuery::trigger($country);

        $countries = CountriesQuery::withOnlineEvents();

        //dd($country_codes);
        $country_codes = $events->groupBy('country_iso')->keys()->all();

        $countriesObjects = Country::whereIn("iso", $country_codes)->get();
        $countryNames = $countriesObjects->mapWithKeys(function ($item) {
            return [$item['iso'] => __("countries." . $item['name'])];
        });


        return view('online-calendar.admin.list', with([
            'country_iso' => is_null($country) ?'' : $country->iso,
            'country_name' => is_null($country) ?'' : $country->name,
            'events' => $events,
            'countries' => $countries,
            'countryNames' => $countryNames
        ]));
    }
}
