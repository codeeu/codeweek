<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LeadingTeachersDashboard extends Controller
{
    public function index(): View
    {
        return view('leading-teachers.actions');
    }
}
