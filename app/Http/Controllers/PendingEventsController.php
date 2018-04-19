<?php

namespace App\Http\Controllers;

use App\Country;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendingEventsController extends Controller
{
    public function index(Country $country)
    {

        var_dump($country->iso);

        $countries = Country::all();

        $events = Event::where(function ($query) {

            if (!auth()->user()->hasRole('super admin')) {
                $query->where('country_iso', '=', Auth::user()->country->iso);
            }

            $query->Where('status', 'like', 'PENDING');

        })->orderBy('created_at', 'desc')->paginate(6);

        return view('event.pending', with([
            'country_iso' => $country->iso ?: '',
            'events' => $events,
            'countries' => $countries
        ]));

    }

}
