<?php

namespace App\Http\Controllers;

use App\Country;
use App\Helpers\EventHelper;
use App\Queries\CountriesQuery;
use App\Queries\OnlineEventsQuery;
use Carbon\Carbon;
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

    public function calendar(Request $request)
    {

        $events = EventHelper::getOnlineEvents();

        $events->map(function($event){
            $event->title = str_limit($event->title, 50);
            $event->start_date = Carbon::parse($event->start_date)->toDateString();
        });

        $countries = CountriesQuery::withOnlineEvents('FEATURED');

        $countryNames = $this->getCountryNamesFromEvents($events);

        $languages = $events->groupBy('language')->keys()->all();

        return view('online-calendar.oc-index', [
            'events'=> $events,
            'countries' => $countries,
            'countryNames' => $countryNames,
            'languages' => $languages
        ]);

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

        $countryNames = $this->getCountryNamesFromEvents($events);

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

    /**
     * @param $events
     * @return mixed
     */
    private function getCountryNamesFromEvents($events)
    {
        $country_codes = $events->groupBy('country_iso')->keys()->all();

        $countriesObjects = Country::whereIn("iso", $country_codes)->get();
        $countryNames = $countriesObjects->mapWithKeys(function ($item) {
            return [$item['iso'] => __("countries." . $item['name'])];
        });
        return $countryNames;
    }


}
