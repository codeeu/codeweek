<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index($section = 'learn')
    {
        $isLearn = false;
        if ($section == 'learn') {
            $isLearn = true;
        };

        $levels = \App\ResourceLevel::whereLearn($isLearn)->get();
        $languages = \App\ResourceLanguage::all();

        $programmingLanguages = \App\ResourceProgrammingLanguage::whereLearn($isLearn)->get();
        $categories = \App\ResourceCategory::whereLearn($isLearn)->get();
        $subjects = \App\ResourceSubject::whereLearn($isLearn)->get();
        $types = \App\ResourceType::whereLearn($isLearn)->get();

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
