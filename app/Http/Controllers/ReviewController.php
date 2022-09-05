<?php

namespace App\Http\Controllers;

use App\Country;
use App\Queries\CountriesQuery;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request, Country $country = null)
    {

        $countries = CountriesQuery::withPendingEvents();

        return view(
            'review',
            with([
                'country_iso' => is_null($country) ? '' : $country->iso,
                'country_name' => is_null($country) ? '' : $country->name,
                'target' => 'review',
                'countries' => $countries
            ])
        );

    }
}
