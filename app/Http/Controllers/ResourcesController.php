<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ResourcesController extends Controller
{
    public function index(Request $request, $section = 'learn'): View
    {

        $query = $request->input('q', '');
        $selected_levels = $request->input('levels', []);
        $selected_types = $request->input('types', []);
        $selected_programming_languages = $request->input('proglang', []);
        $selected_categories = $request->input('categories', []);
        $selected_languages = $request->input('languages', []);
        $selected_subjects = $request->input('subjects', []);

        if (! is_null($selected_levels)) {
            $selected_levels = \App\ResourceLevel::find($selected_levels);
        }

        if (! is_null($selected_types)) {
            $selected_types = \App\ResourceType::find($selected_types);
        }

        if (! is_null($selected_programming_languages)) {
            $selected_programming_languages = \App\ResourceProgrammingLanguage::find($selected_programming_languages);
        }

        if (! is_null($selected_categories)) {
            $selected_categories = \App\ResourceCategory::find($selected_categories);
        }

        if (! is_null($selected_languages)) {
            $selected_languages = \App\ResourceLanguage::find($selected_languages);
        }

        if (! is_null($selected_subjects)) {
            $selected_subjects = \App\ResourceSubject::find($selected_subjects);
        }

        $levels = \App\ResourceLevel::where($section, '=', true)->orderBy('position')->get();
        $types = \App\ResourceType::where($section, '=', true)->orderBy('position')->get();
        //$languages = \App\ResourceLanguage::all();
        $languages = \App\ResourceLanguage::where($section, '=', true)->orderBy('position')->get();

        $programmingLanguages = \App\ResourceProgrammingLanguage::where($section, '=', true)->orderBy('position')->get();
        $categories = \App\ResourceCategory::where($section, '=', true)->orderBy('position')->get();
        $subjects = \App\ResourceSubject::where($section, '=', true)->orderBy('position')->get();


        return view('resources.index', compact(['query', 'selected_subjects', 'selected_programming_languages', 'selected_categories', 'selected_languages', 'selected_levels', 'selected_types', 'programmingLanguages', 'levels', 'languages', 'categories', 'subjects', 'types', 'section']));
    }

    public function learn(Request $request)
    {
        return $this->index($request, 'learn');
    }

    public function teach(Request $request)
    {
        return $this->index($request, 'teach');
    }
}
