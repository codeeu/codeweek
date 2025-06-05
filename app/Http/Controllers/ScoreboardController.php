<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ScoreboardController extends Controller
{
    public function index(Request $request)
    {
        // Define valid years range
        $years = range(Carbon::now('Europe/Brussels')->year, 2014, -1);

        // Get edition from request, default to current year if not present
        $edition = $request->query('edition', Carbon::now('Europe/Brussels')->year);

        // Validate that edition is a valid year within the range
        if (!in_array((int) $edition, $years)) {
            abort(400, 'Invalid edition year.');
        }

        // Cast edition to integer after validation
        $edition = (int) $edition;

        $cache_time = 60 * 60 * 24; // One day cache

        // Set shorter cache time for the current year
        if ($edition == Carbon::now('Europe/Brussels')->year) {
            $cache_time = 15 * 60; // 15 minutes Cache
        }

        // Retrieve total events count from cache or DB
        $total = Cache::remember('total_' . $edition, $cache_time, function () use ($edition) {
            Log::info("Setting cache for scoreboard total in " . $edition);
            return DB::table('events')
                ->where('status', "APPROVED")
                ->whereNull('deleted_at')
                ->whereYear('end_date', '=', $edition)
                ->count();
        });

        // Retrieve events data from cache or DB
        $events = Cache::remember('events_' . $edition, $cache_time, function () use ($edition) {
            Log::info("Setting cache for scoreboard events in " . $edition);

            // Fetch main country events
            $events = DB::table('events')
                ->join('countries', 'events.country_iso', '=', 'countries.iso')
                ->select('countries.iso as country_iso', 'countries.name as country_name', 'countries.population as country_population', DB::raw('count(*) as total'))
                ->where('status', "APPROVED")
                ->whereYear('end_date', '=', $edition)
                ->whereNull('deleted_at')
                ->where('countries.parent', "=", "")
                ->groupBy(['countries.iso', 'countries.name', 'countries.population'])
                ->get();

            // Fetch dependent country events (children)
            $eventsFromDependencies = DB::table('events')
                ->join('countries', 'events.country_iso', '=', 'countries.iso')
                ->select('countries.population as population', 'countries.parent as iso', DB::raw('count(*) as total'))
                ->where('status', "APPROVED")
                ->whereNull('deleted_at')
                ->whereYear('end_date', '=', $edition)
                ->whereNotNull('countries.parent')
                ->groupBy(['parent', 'countries.population'])
                ->get();

            // Merge dependent country events with main country events
            $parentsArr = [];
            foreach ($eventsFromDependencies as $dependantCountryEvents) {
                if (isset($parentsArr[$dependantCountryEvents->iso])) {
                    $parentsArr[$dependantCountryEvents->iso][0] += $dependantCountryEvents->total;
                    $parentsArr[$dependantCountryEvents->iso][1] += $dependantCountryEvents->population;
                } else {
                    $parentsArr[$dependantCountryEvents->iso] = array($dependantCountryEvents->total, $dependantCountryEvents->population);
                }
            }

            // Add dependent data to main country events
            foreach ($events as $mainCountry) {
                if (isset($parentsArr[$mainCountry->country_iso])) {
                    $mainCountry->total += $parentsArr[$mainCountry->country_iso][0];
                    $mainCountry->country_population += $parentsArr[$mainCountry->country_iso][1];
                }
                // Calculate rank based on population and total events
                $mainCountry->rank = $mainCountry->country_population / $mainCountry->total;
            }

            // Calculate the total events count for the scoreboard
            $total = 0;
            foreach ($events as $line) {
                $total += $line->total;
            }

            Log::info("Total from countries displayed: " . $total);

            return $events;
        });

        Log::info("Total displayed in scoreboard: " . $total);

        // Return the view with the relevant data
        return view('scoreboard', [
            'events' => $events->sortBy('rank'),
            'total' => $total,
            'edition' => $edition,
            'years' => $years
        ]);
    }
}
