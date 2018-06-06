<?php

namespace App\Http\Controllers;

use App\Helpers\EventHelper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {


        $years = [2018, 2017, 2016, 2015, 2014];

        $selectedYear = $request->input("year") ? $request->input("year") : Carbon::now()->year;


        return view('index')->with([
            'events' => $this->eventsNearMe(),
            'years' => $years,
            'selectedYear' => $selectedYear
        ]);
    }

    private function eventsNearMe()
    {
        $geoip = User::getGeoIPData();
        return EventHelper::getCloseEvents($geoip->lon, $geoip->lat);


    }
}
