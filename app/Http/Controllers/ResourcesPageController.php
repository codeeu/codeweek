<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourcesPageController extends Controller
{
    public function index(Request $request)
    {
        return view('resources-page');
    }
}
