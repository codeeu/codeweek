<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {

        $levels = \App\ResourceLevel::whereLearn(true)->get();
        $languages = \App\ResourceLanguage::all();

        $programmingLanguages = \App\ResourceProgrammingLanguage::whereLearn(true)->get();
        $categories = \App\ResourceCategory::whereLearn(true)->get();
        $subjects = \App\ResourceSubject::whereLearn(true)->get();
        $types = \App\ResourceType::whereLearn(true)->get();





        return view('resources.index', compact(['programmingLanguages', 'levels', 'languages', 'categories', 'subjects', 'types']));
    }

    public function show($country)
    {
        return view("resources.{$country}.index", compact('country'));

    }
}
