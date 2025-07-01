<?php

namespace App\Http\Controllers;

use App\ResourceCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatchMakingToolController extends Controller
{
    public function index(Request $request): View
    {

        $query = $request->input('q', '');

        $selected_languages = $request->input('languages', []);
        $selected_locations = $request->input('locations', []);
        $selected_types = $request->input('types', []);
        $selected_topics = $request->input('topics', []);

        if (! is_null($selected_languages)) {
            $selected_languages = \App\ResourceLanguage::find($selected_languages);
        }

        if (! is_null($selected_locations)) {
            $selected_locations = \App\Location::find($selected_locations);
        }

        if (! is_null($selected_types)) {
            $selected_types = \App\ResourceType::find($selected_types);
        }

        if (! is_null($selected_topics)) {
            $selected_topics = ResourceCategory::find($selected_topics);
        }

        $languages = \App\ResourceLanguage::orderBy('position')->get();
        $locations = \App\Location::orderBy('name')->get();
        $types = \App\ResourceType::orderBy('position')->get();
        $topics = \App\ResourceCategory::orderBy('position')->get();

        return view('matchmaking-tool.index', compact(['query', 'selected_languages', 'selected_locations', 'selected_types', 'selected_topics', 'languages', 'locations', 'types', 'topics']));
    }

    public function show(Request $request, string $tool): View
    {
        return view('matchmaking-tool.show', ['tool' => $tool]);
    }
}
