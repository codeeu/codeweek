<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LeadingTeachersList extends Controller
{
    public function index()
    {

        $leadingTeachers = User::role('leading teacher')->with('country')->get();

        return view('leading-teachers.admin.list', compact(['leadingTeachers']));
    }
}
