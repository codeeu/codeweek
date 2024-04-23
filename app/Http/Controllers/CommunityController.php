<?php

namespace App\Http\Controllers;

use App\Country;
use App\Filters\UserFilters;
use App\User;

class CommunityController extends Controller
{
    public function index(UserFilters $filters)
    {
        if (empty($filters->getFilters())) {

            $country_iso = auth()->user()?->country ? auth()->user()->country->iso : User::getGeoIPData()->iso_code;

            return redirect('community?country_iso='.$country_iso);
        }

        $ambassadors = User::role('ambassador')->filter($filters)->whereNotNull('avatar_path')->whereNotNull('bio')->paginate(10);

        $teachers = User::role('leading teacher')->where('approved', 1)->with('city')->get();

        $countries = Country::withCoordinators();

        return view('community')->with([
            'ambassadors' => $ambassadors,
            'countries' => $countries,
            'teachers' => $teachers,
            'country_iso' => request()->get('country_iso'),
        ]);
    }
}
