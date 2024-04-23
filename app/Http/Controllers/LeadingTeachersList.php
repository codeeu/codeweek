<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LeadingTeachersList extends Controller
{
    public function index(): View
    {

        return view('leading-teachers.admin.list');
    }
}
