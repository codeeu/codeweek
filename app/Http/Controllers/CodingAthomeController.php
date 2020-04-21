<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodingAtHomeController extends Controller
{
    public function show(){
        return view('codingathome');
    }
}
