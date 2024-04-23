<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    //

    public function index(Request $request): View
    {
        return view('2021.challenges.index');
    }
}
