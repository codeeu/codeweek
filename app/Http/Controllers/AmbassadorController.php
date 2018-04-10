<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AmbassadorController extends Controller
{
    public function index(){

        // Get the current country
        // Get list of countries with events
        // Show ambassador(s) for selected country

        $ambassadors = $users = User::role('ambassador')->get();


        return view('ambassadors', compact('ambassadors'));
    }
}
