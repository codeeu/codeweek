<?php

namespace App\Http\Controllers;

use App\Country;
use App\Queries\CountriesQuery;
use App\Queries\OnlineEventsQuery;
use Illuminate\Http\Request;

class OnlineEventsController extends Controller
{
    public function list(Country $country = null)
    {
        return $this->build($country);
    }

    public function promoted(Country $country = null)
    {
        return $this->build($country, 'promoted');
    }

    public function featured(Country $country = null)
    {
        return $this->build($country, 'featured');
    }

    private function build(?Country $country, $highlightedStatus = null)
    {
        //List of online events per country
        if (!is_null($highlightedStatus)){
            $events = OnlineEventsQuery::trigger($country, strtoupper($highlightedStatus));
            $countries = CountriesQuery::withOnlineEvents($highlightedStatus);
        } else {
            $events = OnlineEventsQuery::trigger($country);
            $countries = CountriesQuery::withOnlineEvents('NONE');
        }

        $country_codes = $events->groupBy('country_iso')->keys()->all();

        $countriesObjects = Country::whereIn("iso", $country_codes)->get();
        $countryNames = $countriesObjects->mapWithKeys(function ($item) {
            return [$item['iso'] => __("countries." . $item['name'])];
        });

        if (is_null($highlightedStatus)) $highlightedStatus = "list";

        return view('online-calendar.admin.list', with([
            'country_iso' => is_null($country) ? '' : $country->iso,
            'country_name' => is_null($country) ? '' : $country->name,
            'events' => $events,
            'countries' => $countries,
            'countryNames' => $countryNames,
            'target' => 'online/' . $highlightedStatus
        ]));
    }


}
