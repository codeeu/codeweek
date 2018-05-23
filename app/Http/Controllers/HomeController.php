<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $geoip = geoip(geoip()->getClientIP());
        return view('index', compact('geoip'));
    }

    public function geo(){
        dd(geoip(geoip()->getClientIP()));
    }
}
