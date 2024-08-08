<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RemoteTeachingController extends Controller
{
    public function index(): View
    {
        if (app()->getLocale() == 'en') {

            return view('static.remote-teaching-with-links');
        }

        return view('static.remote-teaching');

    }
}
