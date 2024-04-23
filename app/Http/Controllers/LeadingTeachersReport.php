<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LeadingTeachersReport extends Controller
{
    public function index(): View
    {
        return view('leading-teachers.report');
    }
}
