<?php

namespace App\Http\Controllers;

use App\Country;
use App\ResourceCategory;
use App\ResourceLanguage;
use App\MatchmakingProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Filters\MatchmakingProfileFilters;

class MatchMakingToolController extends Controller
{
    public function index(Request $request): View
    {
        $selected_languages = $request->input('languages', []);
        $selected_locations = $request->input('locations', []);
        $selected_types = $request->input('types', []);
        $selected_topics = $request->input('topics', []);

        $selected_languages = is_array($selected_languages) ? array_filter($selected_languages) : [];
        $selected_locations = is_array($selected_locations) ? array_filter($selected_locations) : [];
        $selected_types     = is_array($selected_types)     ? array_filter($selected_types)     : [];
        $selected_topics    = is_array($selected_topics)    ? array_filter($selected_topics)    : [];

        $used_languages = MatchmakingProfile::query()
            ->whereNotNull('languages')
            ->pluck('languages')
            ->filter()
            ->flatMap(function ($langs) {
                return is_array($langs) ? $langs : (json_decode($langs, true) ?: []);
            })
            ->unique()
            ->values()
            ->all();

        $languages = ResourceLanguage::whereIn('name', $used_languages)
            ->orderBy('position')
            ->get(['id', 'name'])
            ->toArray();
            
        $used_countries = MatchmakingProfile::query()
            ->whereNotNull('country')
            ->pluck('country')
            ->unique()
            ->values()
            ->all();

        $locations = Country::whereIn('iso', $used_countries)
            ->orderBy('name')
            ->get(['iso', 'name'])
            ->toArray();

        $types     = MatchmakingProfile::getValidOrganizationTypeOptions();
        $topics    = ResourceCategory::orderBy('position')->get()->toArray();

        $support_types   = MatchmakingProfile::getValidTypes();
        $valid_formats = MatchmakingProfile::getValidFormats();

        return view('matchmaking-tool.index', compact([
            'selected_languages',
            'selected_locations',
            'selected_types',
            'selected_topics',
            'languages',
            'locations',
            'types',
            'topics',
            'support_types',
            'valid_formats',
        ]));
    }

    public function show(Request $request, string $slug): View
    {
        $profile = MatchmakingProfile::where('slug', $slug)->first();

        if (! $profile) {
            abort(404);
        }

        $locations = Country::orderBy('name')->select(['iso', 'name'])->get()->toArray();

        return view('matchmaking-tool.show', [
            'profile' => $profile,
            'locations' => $locations,
        ]);
    }

    public function searchPOST(MatchmakingProfileFilters $filters, Request $request)
    {
        return MatchmakingProfile::where('type', '!=', null)
            ->filter($filters)
            ->orderByDesc('start_time')
            ->paginate(12);
    }
}
