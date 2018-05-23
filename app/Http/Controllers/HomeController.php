<?php

namespace App\Http\Controllers;

use App\Helpers\EventHelper;
use Illuminate\Http\Request;

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
        $geoip = geoip(geoip()->getClientIP());
        return EventHelper::getCloseEvents($geoip->lon, $geoip->lat);


    }
}
