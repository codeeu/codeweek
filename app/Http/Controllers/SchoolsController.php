<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function index()
    {
        $questions = [
            ["question" => "Lorem ipsum","answer" => "Dolorem ipes sum"],
            ["question" => "Lorem ipsum2","answer" => "Dolorem ipes sum2"]
        ];
        return view('schools', compact('questions'));
    }
}
