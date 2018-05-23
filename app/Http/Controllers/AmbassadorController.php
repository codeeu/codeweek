<?php

namespace App\Http\Controllers;

use App\Country;
use App\Filters\UserFilters;
use App\Queries\CountriesQuery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AmbassadorController extends Controller
{

    public function index(UserFilters $filters)
    {
        if (empty($filters->getFilters())) {
            $country_iso = auth()->user()->country ? auth()->user()->country->iso : User::getGeoIPData()->iso_code;
            return redirect('ambassadors?country_iso=' . $country_iso);
        };


        $ambassadors = User::role('ambassador')->filter($filters)->paginate(10);

        return view('ambassadors')->with([
            "ambassadors" => $ambassadors,
            "countries" => Country::withEvents()
        ]);
    }


}
