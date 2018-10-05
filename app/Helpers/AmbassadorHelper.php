<?php

namespace App\Helpers;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AmbassadorHelper
{

    public static function getByActiveCountries()
    {

        $ambassadors_count = User::role('ambassador')
            ->whereNotNull("avatar_path")
            ->whereNotNull("bio")
            ->where("country_iso","<>", "")
            ->join('countries', 'country_iso', '=', 'countries.iso')
            ->groupBy('country_iso')
            ->select('country_iso', DB::raw('count(*) as total'),'countries.name')
            ->orderBy("countries.name")
            ->get();


        return $ambassadors_count;


    }

    public static function getByCountry($country_iso)
    {

        $ambassadors = User::role('ambassador')
            ->where("country_iso","=", $country_iso)
            ->get();

        return $ambassadors;

    }

}