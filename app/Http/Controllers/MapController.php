<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Request $request): View
    {
        $years = range(Carbon::now()->year, 2014, -1);

        $selectedYear = $request->input('year') ? $request->input('year') : Carbon::now()->year;

        $iso_country_of_user = User::getGeoIPData()->iso_code;

        return view('map')->with([
            'years' => $years,
            'selectedYear' => $selectedYear,
            'current_country_iso' => $iso_country_of_user,

        ]);
    }
}
