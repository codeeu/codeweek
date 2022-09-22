<?php

namespace App\Http\Controllers;

use App\Country;
use App\Queries\CountriesQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function index(Request $request, Country $country = null)
    {

        $countries = CountriesQuery::withPendingEvents();

        return view(
            'review',
            with([
                'country_iso' => $this->getSelectedCountry($country),
                'target' => 'review',
                'countries' => $countries
            ])
        );

    }

    protected function getSelectedCountry($country)
    {


        if (auth()->user()->isAmbassador()) {
            return auth()->user()->country->iso;
        }


        if (auth()->user()->isAdmin()) {

            if (!is_null($country)) {
                if ($country == '00') {
                    return null;
                }
                return $country->iso;
            }

            if (!is_null(auth()->user()->current_country)) {
                return auth()->user()->current_country;
            }

            return null;


        }

        return null;
    }
}
