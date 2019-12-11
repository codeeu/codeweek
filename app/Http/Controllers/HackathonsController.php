<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HackathonsController extends Controller
{
    public function index(){
        return view('hackathons.index');
    }
}
