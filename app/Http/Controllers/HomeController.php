<?php

namespace App\Http\Controllers;

use App\Helpers\EventHelper;
use App\User;

class HomeController extends Controller
{
    public function index()
    {

        return view('index')->with([
            'events' => $this->eventsNearMe()
        ]);
    }

    private function eventsNearMe()
    {
        $geoip = User::getGeoIPData();
        return EventHelper::getCloseEvents($geoip->lon, $geoip->lat);


    }
}
