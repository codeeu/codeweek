<?php

namespace App\Http\Controllers;

use App\Country;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Queries\PendingEventsQuery;
use App\Queries\CountriesQuery;

class PendingEventsController extends Controller {
    public function index(Request $request, Country $country = null) {
        $countries = CountriesQuery::withPendingEvents();

        $events = PendingEventsQuery::trigger($country);

        if ($events->isEmpty() && $events->currentPage() > 1) {
            $lastPage = $events->lastPage();
            return redirect('/pending?page=' . $lastPage);
        }

        return view(
            'event.pending',
            with([
                'country_iso' => is_null($country) ? '' : $country->iso,
                'country_name' => is_null($country) ? '' : $country->name,
                'events' => $events,
                'countries' => $countries
            ])
        );
    }
}
