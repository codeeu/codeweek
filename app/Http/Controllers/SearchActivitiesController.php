<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SearchActivitiesController extends Controller
{
    public function index(): View
    {
        return view('map.index');
    }
}
