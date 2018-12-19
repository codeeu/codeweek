<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {

        $levels = \App\ResourceLevel::all();
        $languages = \App\ResourceLanguage::all();

        $programmingLanguages = \App\ResourceProgrammingLanguage::all();
        $categories = \App\ResourceCategory::all();
        $subjects = \App\ResourceSubject::all();
        $types = \App\ResourceType::all();


        //dd($audiences);
        //dd($levels);

        return view('resources.index', compact(['programmingLanguages', 'levels', 'languages', 'categories', 'subjects', 'types']));
    }

    public function show($country)
    {
        return view("resources.{$country}.index", compact('country'));

    }
}
