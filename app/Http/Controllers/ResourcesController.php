<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {

        $levels = \App\ResourceLevel::all();

        $audiences = \App\Audience::all();


        //dd($audiences);
        //dd($levels);

        return view('resources.index', compact(['audiences', 'levels']));
    }

    public function show($country)
    {
        return view("resources.{$country}.index", compact('country'));

    }
}
