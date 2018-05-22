<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $geoip = geoip($ip = null);
        return view('index', compact('geoip'));
    }

    public function geo(){
        dd(geoip($ip = null));
    }
}
