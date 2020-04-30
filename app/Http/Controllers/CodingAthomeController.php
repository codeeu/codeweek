<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CodingAtHomeController extends Controller
{
    public function show(){
        return view('codingathome.codingathome');
    }


}
