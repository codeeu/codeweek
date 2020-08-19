<?php

namespace App\Http\Controllers;

use App\Country;
use App\Helpers\EventHelper;
use App\Queries\CountriesQuery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OnlineCalendarController extends Controller
{
    public function index(Request $request)
    {

        $events = EventHelper::getOnlineEvents();

        $events->map(function($event){
            $event->title = str_limit($event->title, 50);
            $event->start_date = Carbon::parse($event->start_date)->toDateString();
        });

        $country_codes = $events->groupBy('country_iso')->keys()->all();

        $countries = Country::whereIn("iso", $country_codes)->get()->mapWithKeys(function ($item) {
            return [$item['iso'] => __("countries." . $item['name'])];
        });


        return view('online-calendar.oc-index', compact('events', 'countries'));
    }
}
