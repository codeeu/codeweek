<?php

namespace App\Http\Controllers;

use App\Country;
use App\ResourceLanguage;
use App\MatchmakingProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Filters\MatchmakingProfileFilters;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        $topics    = MatchmakingProfile::getUniqueDigitalExpertiseAreas();

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
        return MatchmakingProfile::query()
            ->filter($filters)
            ->orderByDesc('start_time')
            ->paginate(12);
    }

    public function downloadTemplate()
    {
        $csvHeaders = [
            'Email',
            'Name',
            'Organisation name',
            'Organisation website',
            'Organisation type',
            'Main email address',
            'Country/Region/Areas of operation:',
            'Want to tell us more about your organisation?',
            'Do you give your consent to use your logo and display it in the matchmaking directory?',
            'What kind of activities or support can you offer to schools and educators? (Select all that apply):',
            'Are you interested in collaborating with schools to bring real-world expertise into the classroom?',
            'What types of schools are you most interested in working with?',
            'What areas of digital expertise does your organisation or you specialise in?',
            'Would you like to be part of the wider EU Code Week community and receive updates about future activities and events?',
            'Do you have any additional information or comments that could help us better match you with schools and educators?',
            'By registering as a Digital Volunteer, you agree to being contacted later to share feedback about your experience.',
            'Start time',
            'Completion time',
        ];

        // Example row with helpful values
        $exampleRow = [
            'example@example.com',
            'John Doe',
            'Example Organisation',
            'www.example.org',
            'Non-Governmental Organisation (NGO)',
            'contact@example.org',
            'Belgium',
            'Our mission is to promote coding education.',
            'Yes',
            'Delivering workshops or training;Providing learning resources or curricula;',
            'Yes',
            'Primary Schools;Secondary Schools;',
            'Coding and programming;Cybersecurity;',
            'Yes',
            'Additional information about our organisation.',
            'Yes',
            '2025-01-01 10:00:00',
            '2025-01-01 10:30:00',
        ];

        // Get valid options for reference
        $validOrgTypes = implode('; ', MatchmakingProfile::getValidOrganizationTypeOptions());
        $validCollaboration = implode('; ', MatchmakingProfile::getValidCollaborationOptions());
        $validFormats = implode('; ', MatchmakingProfile::getValidFormats());

        $filename = 'matchmaking-template.csv';
        
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        
        $callback = function () use ($csvHeaders, $exampleRow, $validOrgTypes, $validCollaboration, $validFormats) {
            $stream = fopen('php://output', 'w');
            
            // Add BOM for Excel compatibility
            fprintf($stream, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Write headers
            fputcsv($stream, $csvHeaders);
            
            // Write example row
            fputcsv($stream, $exampleRow);
            
            // Write a comment row with valid options
            fputcsv($stream, ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['VALID OPTIONS:', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['Organisation type options:', $validOrgTypes, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['Collaboration options:', $validCollaboration, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['Format options:', $validFormats, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['NOTES:', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['- Multiple values should be separated by semicolons (;)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['- Boolean fields: Yes/No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['- Dates should be in format: YYYY-MM-DD HH:MM:SS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['- Country should be the full country name (e.g., "Belgium", "United States")', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            
            fclose($stream);
        };
        
        return new StreamedResponse($callback, 200, $headers);
    }
}
