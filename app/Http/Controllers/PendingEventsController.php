<?php

namespace App\Http\Controllers;

use App\Country;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Queries\PendingEventsQuery;
use App\Queries\CountriesQuery;

class PendingEventsController extends Controller
{
    public function index(Country $country = null)
    {

        $countries = CountriesQuery::withPendingEventsCurrentYear();

        $events = PendingEventsQuery::trigger($country);

        return view('event.pending', with([
            'country_iso' => is_null($country) ?'' : $country->iso,
            'country_name' => is_null($country) ?'' : $country->name,
            'events' => $events,
            'countries' => $countries
        ]));

    }

}
