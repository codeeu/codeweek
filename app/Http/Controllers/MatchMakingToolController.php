<?php

namespace App\Http\Controllers;

use App\Country;
use App\ResourceLanguage;
use App\MatchmakingProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Filters\MatchmakingProfileFilters;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Str;

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
            // Fallback: try to match by computed slug from name or organisation name
            $search = str_replace('-', ' ', $slug);
            $candidates = MatchmakingProfile::query()
                ->where('organisation_name', 'like', "%{$search}%")
                ->orWhereRaw("CONCAT(COALESCE(first_name, ''), ' ', COALESCE(last_name, '')) LIKE ?", ["%{$search}%"])
                ->get(['id', 'slug', 'first_name', 'last_name', 'organisation_name']);

            foreach ($candidates as $candidate) {
                $orgSlug = $candidate->organisation_name ? Str::slug($candidate->organisation_name) : null;
                $nameSlug = Str::slug(trim("{$candidate->first_name} {$candidate->last_name}"));

                if ($slug === $orgSlug || $slug === $nameSlug) {
                    return redirect()->route('matchmaking_tool_detail', ['slug' => $candidate->slug], 301);
                }
            }

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
        // Match the exact format from the original CSV
        $csvHeaders = [
            'ID',
            'Start time',
            'Completion time',
            'Email',
            'Name',
            'Last modified time',
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
            'What areas of digital expertise does your organisation or you specialise in? ',
            'Would you like to be part of the wider EU Code Week community and receive updates about future activities and events?',
            'Do you have any additional information or comments that could help us better match you with schools and educators?',
            'By registering as a Digital Volunteer, you agree to being contacted later to share feedback about your experience.',
        ];

        // Example row with helpful values matching the original format
        $exampleRow = [
            '', // ID - leave empty, will be auto-generated
            '5/16/25 9:08:01', // Start time - format: M/D/YY H:MM:SS
            '5/16/25 9:15:42', // Completion time - format: M/D/YY H:MM:SS
            'example@example.com',
            'John Doe', // Full name
            '', // Last modified time - leave empty, will be auto-generated
            'Example Organisation',
            'www.example.org',
            'Non-Governmental Organisation (NGO)',
            'contact@example.org',
            'Belgium',
            'Our mission is to contribute to the inclusion of the Bulgarian public in the global digital community, to raise their quality of life, and to promote civic participation.',
            'Yes',
            'Delivering workshops or training;Providing learning resources or curricula;',
            'Maybe, I would like more details',
            'Primary Schools;',
            'Coding and programming;Cybersecurity;',
            'Yes',
            'GLBF, over the years, has promoted Code Week in Bulgaria through the network of public libraries.',
            'Yes',
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
            $emptyRow = array_fill(0, count($csvHeaders), '');
            fputcsv($stream, $emptyRow);
            fputcsv($stream, array_merge(['VALID OPTIONS:'], array_fill(1, count($csvHeaders) - 1, '')));
            fputcsv($stream, array_merge(['Organisation type options:', $validOrgTypes], array_fill(2, count($csvHeaders) - 2, '')));
            fputcsv($stream, array_merge(['Collaboration options:', $validCollaboration], array_fill(2, count($csvHeaders) - 2, '')));
            fputcsv($stream, array_merge(['Format options:', $validFormats], array_fill(2, count($csvHeaders) - 2, '')));
            fputcsv($stream, array_merge(['Type options:', 'volunteer;organisation'], array_fill(2, count($csvHeaders) - 2, '')));
            fputcsv($stream, $emptyRow);
            fputcsv($stream, array_merge(['NOTES:'], array_fill(1, count($csvHeaders) - 1, '')));
            fputcsv($stream, array_merge(['- Multiple values should be separated by semicolons (;)'], array_fill(1, count($csvHeaders) - 1, '')));
            fputcsv($stream, array_merge(['- Boolean fields: Yes/No'], array_fill(1, count($csvHeaders) - 1, '')));
            fputcsv($stream, array_merge(['- Dates should be in format: YYYY-MM-DD HH:MM:SS'], array_fill(1, count($csvHeaders) - 1, '')));
            fputcsv($stream, array_merge(['- Country should be the full country name (e.g., "Belgium", "United States")'], array_fill(1, count($csvHeaders) - 1, '')));
            fputcsv($stream, array_merge(['- Array fields (Languages, Support Activities, etc.) use semicolons (;)'], array_fill(1, count($csvHeaders) - 1, '')));
            fputcsv($stream, array_merge(['- Type field: "volunteer" or "organisation"'], array_fill(1, count($csvHeaders) - 1, '')));
            fputcsv($stream, array_merge(['- Format field: "Online", "In-person", or "Both"'], array_fill(1, count($csvHeaders) - 1, '')));
            
            fclose($stream);
        };
        
        return new StreamedResponse($callback, 200, $headers);
    }
}
