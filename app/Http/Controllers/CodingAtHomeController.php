<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CodingAtHomeController extends Controller
{
    public function show(): View
    {
        return view('codingathome.codingathome');
    }
}
