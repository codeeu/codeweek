<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ResourcesPageController extends Controller
{
    public function index(Request $request): View
    {
        return view('resources-page');
    }
}
