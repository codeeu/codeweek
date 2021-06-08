<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeadingTeacherController extends Controller
{
    public function getCurrentToolkit(){

        return response()->redirectTo('https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/Leading+Teachers+Toolkit+2020.zip');


    }
}
