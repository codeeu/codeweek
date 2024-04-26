<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class ToolkitsController extends Controller
{
    public function get(): View
    {

        $locale = App::getLocale();

        return view('toolkits', compact(['locale']));
    }
}
