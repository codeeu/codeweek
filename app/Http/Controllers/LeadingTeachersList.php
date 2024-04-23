<?php

namespace App\Http\Controllers;

class LeadingTeachersList extends Controller
{
    public function index()
    {

        return view('leading-teachers.admin.list');
    }
}
