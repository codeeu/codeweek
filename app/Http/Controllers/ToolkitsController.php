<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ToolkitsController extends Controller
{
    public function get(){


        $locale = App::getLocale();


        return view('toolkits', compact(['locale']));
    }
}
