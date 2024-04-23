<?php

namespace App\Http\Controllers;

use App\Country;
use App\Filters\UserFilters;
use App\Helpers\AmbassadorHelper;
use App\User;

class AmbassadorController extends Controller
{
    public function create()
    {
        return view('ambassador.volunteer');
    }

    public function index(UserFilters $filters)
    {

        if (empty($filters->getFilters())) {

            $country_iso = auth()->user()?->country ? auth()->user()->country->iso : User::getGeoIPData()->iso_code;

            return redirect('ambassadors?country_iso='.$country_iso);
        }

        $ambassadors = User::role('ambassador')->filter($filters)->whereNotNull('avatar_path')->whereNotNull('bio')->paginate(10);

        return view('ambassadors')->with([
            'ambassadors' => $ambassadors,
            'countries' => Country::withEvents(),
            'countries_with_ambassadors' => AmbassadorHelper::getByActiveCountries(),

        ]);
    }

    public function profile()
    {
        return view('ambassador.profile');
    }
}
