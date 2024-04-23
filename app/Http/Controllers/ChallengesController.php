<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    //

    public function index(Request $request)
    {
        return view('2021.challenges.index');
    }
}
