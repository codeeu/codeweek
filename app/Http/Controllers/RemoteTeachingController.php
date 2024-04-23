<?php

namespace App\Http\Controllers;

class RemoteTeachingController extends Controller
{
    public function index()
    {
        if (app()->getLocale() == 'en') {

            return view('static.remote-teaching-with-links');
        }

        return view('static.remote-teaching');

    }
}
