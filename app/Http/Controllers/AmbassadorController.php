<?php

namespace App\Http\Controllers;

use App\Filters\UserFilters;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AmbassadorController extends Controller
{

    public function index(UserFilters $filters)
    {


        // Get the current country
        // Get list of countries with events
        // Show ambassador(s) for selected country

        $ambassadors = User::role('ambassador')->filter($filters)->paginate(1);
        $countries = [];

        return view('ambassadors')->with([
            "ambassadors"=>$ambassadors,
            "countries"=>$countries
        ]);
    }


}
