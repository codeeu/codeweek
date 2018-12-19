<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchResourcesController extends Controller
{
    public function search(){
        $years = [2018, 2017, 2016, 2015, 2014];

        return $years;


    }
}
