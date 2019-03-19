<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index($section = 'learn')
    {

        $levels = \App\ResourceLevel::where($section ,"=", true)->orderBy('position')->get();
        $languages = \App\ResourceLanguage::all();

        $programmingLanguages = \App\ResourceProgrammingLanguage::where($section ,"=", true)->orderBy('position')->get();
        $categories = \App\ResourceCategory::where($section ,"=", true)->orderBy('position')->get();
        $subjects = \App\ResourceSubject::where($section ,"=", true)->orderBy('position')->get();
        $types = \App\ResourceType::where($section ,"=", true)->orderBy('position')->get();

        return view('resources.index', compact(['programmingLanguages', 'levels', 'languages', 'categories', 'subjects', 'types','section']));
    }

    public function learn(){
        return $this->index('learn');
    }

    public function teach(){
        return $this->index('teach');
    }

    public function show($country)
    {
        return view("resources.{$country}.index", compact('country'));

    }
}
