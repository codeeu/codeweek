<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class LeadingTeacherController extends Controller
{
    public function getCurrentToolkit(): Response
    {

        return response()->redirectTo('https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/Leading+Teachers+Toolkit+2020.zip');

    }
}
