<?php

namespace App\Http\Controllers;

use App\Helpers\EventHelper;
use App\Http\Resources\EventResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $geoip = User::getGeoIPData();
        $activities = EventHelper::getCloseEvents($geoip->lon, $geoip->lat, 0, 5);
        $activities = EventResource::collection($activities);
        return view('static.home', compact('activities'));
    }
}
