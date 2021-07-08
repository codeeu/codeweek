<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemoteTeachingController extends Controller
{
    public function index()
    {
        if("en" ==  app()->getLocale()){

            return view('static.remote-teaching-with-links');
        }

        return view('static.remote-teaching');

    }
}
