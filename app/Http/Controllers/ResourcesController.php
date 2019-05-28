<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResourcesController extends Controller
{
    public function index(Request $request, $section = 'learn')
    {


        $query = $request->input('q') ?: "";
        $levels = $request->input('levels') ?: [];

        Log::info($levels);



        $levels = \App\ResourceLevel::where($section ,"=", true)->orderBy('position')->get();
        //$languages = \App\ResourceLanguage::all();
        $languages = \App\ResourceLanguage::where($section ,"=", true)->orderBy('position')->get();

        $programmingLanguages = \App\ResourceProgrammingLanguage::where($section ,"=", true)->orderBy('position')->get();
        $categories = \App\ResourceCategory::where($section ,"=", true)->orderBy('position')->get();
        $subjects = \App\ResourceSubject::where($section ,"=", true)->orderBy('position')->get();
        $types = \App\ResourceType::where($section ,"=", true)->orderBy('position')->get();

        return view('resources.index', compact(['query','programmingLanguages', 'levels', 'languages', 'categories', 'subjects', 'types','section']));
    }

    public function learn(Request $request){
        return $this->index($request, 'learn');
    }

    public function teach(Request $request){
        return $this->index($request, 'teach');
    }


}
