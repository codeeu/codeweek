<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ChallengesController extends Controller
{
    //

    public function index(Request $request): View
    {
        return view('2021.challenges.index');
    }
}
