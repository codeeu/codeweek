<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ResourcesController extends Controller
{
    public function all(Request $request): View
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

        $levels = \App\ResourceLevel::orderBy('position')->get();
        $types = \App\ResourceType::orderBy('position')->get();
        //$languages = \App\ResourceLanguage::all();
        $languages = \App\ResourceLanguage::orderBy('position')->get();

        $programmingLanguages = \App\ResourceProgrammingLanguage::orderBy('position')->get();
        $categories = \App\ResourceCategory::orderBy('position')->get();
        $subjects = \App\ResourceSubject::orderBy('position')->get();


        return view('resources.index', compact(['query', 'selected_subjects', 'selected_programming_languages', 'selected_categories', 'selected_languages', 'selected_levels', 'selected_types', 'programmingLanguages', 'levels', 'languages', 'categories', 'subjects', 'types']));
    }
}
