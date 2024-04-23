<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HackathonsController extends Controller
{
    public function index()
    {
        return view('hackathons.index');
    }

    public function before(Request $request)
    {
        $routeName = Route::currentRouteName();

        return view('hackathons.before.'.$routeName);
    }

    public function after(Request $request)
    {
        $routeName = Route::currentRouteName();

        return view('hackathons.after.'.$routeName);
    }
}
