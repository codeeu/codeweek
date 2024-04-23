<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\App;

class ToolkitsController extends Controller
{
    public function get(): View
    {

        $locale = App::getLocale();

        return view('toolkits', compact(['locale']));
    }
}
