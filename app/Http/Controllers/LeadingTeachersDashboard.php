<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadingTeachersDashboard extends Controller
{
    public function index()
    {
        return view('leading-teachers.actions');
    }
}
