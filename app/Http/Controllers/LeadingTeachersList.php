<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LeadingTeachersList extends Controller
{
    public function index()
    {

        return view('leading-teachers.admin.list');
    }
}
