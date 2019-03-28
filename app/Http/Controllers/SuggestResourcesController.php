<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuggestResourcesController extends Controller
{
    public function get(){
        return view ("resources.suggest");
    }
}
