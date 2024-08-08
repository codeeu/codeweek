<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('login');
    }
}
