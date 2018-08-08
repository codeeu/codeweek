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

        return view('home');


    }


}
