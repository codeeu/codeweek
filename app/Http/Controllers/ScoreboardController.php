<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ScoreboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('edition')) {
            $edition = $request->query('edition');
        } else {
            $edition = Carbon::now('Europe/Brussels')->year;
        }

        $cache_time = 60 * 60 * 24; // One day cache

        if ($edition == Carbon::now('Europe/Brussels')->year) {
            $cache_time = 15 * 60; // 15 minutes Cache
        };


        $total = Cache::remember('total_' . $edition, $cache_time, function () use ($edition) {
            Log::info("Setting cache for scoreboard total in " . $edition);
            return DB::table('events')
                ->where('status', "=", "APPROVED")
                ->whereNull('deleted_at')
                ->whereYear('end_date', '=', $edition)
                ->count();
        });




        $events = Cache::remember('events_' . $edition, $cache_time, function () use ($edition) {
            Log::info("Setting cache for scoreboard events in " . $edition);

            $events = DB::table('events')
                ->join('countries', 'events.country_iso', '=', 'countries.iso')
                ->select('countries.iso as country_iso', 'countries.name as country_name', 'countries.population as country_population', DB::raw('count(*) as total'))
                ->where('status', "=", "APPROVED")
                ->whereYear('end_date', '=', $edition)
                ->whereNull('deleted_at')
                ->where('countries.parent', "=", "")
                ->groupBy(['countries.iso','countries.name','countries.population'])
                ->get();




            $eventsFromDependencies = DB::table('events')
                ->join('countries', 'events.country_iso', '=', 'countries.iso')
                ->select('countries.population as population', 'countries.parent as iso', DB::raw('count(*) as total'))
                ->where('status', "=", "APPROVED")
                ->whereNull('deleted_at')
                ->whereYear('end_date', '=', $edition)
                ->whereNotNull('countries.parent')
                ->groupBy(['parent','countries.population'])
                ->get();


            $parentsArr = [];
            foreach ($eventsFromDependencies as $dependantCountryEvents) {
                if (isset($parentsArr[$dependantCountryEvents->iso])) {
                    $parentsArr[$dependantCountryEvents->iso][0] += $dependantCountryEvents->total;
                    $parentsArr[$dependantCountryEvents->iso][1] += $dependantCountryEvents->population;
                } else {
                    $parentsArr[$dependantCountryEvents->iso] = array($dependantCountryEvents->total, $dependantCountryEvents->population);
                }

            }


            foreach ($events as $mainCountry) {
                if (isset($parentsArr[$mainCountry->country_iso])) {
                    $mainCountry->total += $parentsArr[$mainCountry->country_iso][0];
                    $mainCountry->country_population += $parentsArr[$mainCountry->country_iso][1];

                }
                //countries.population / count(*)
                $mainCountry->rank = $mainCountry->country_population / $mainCountry->total;

            }

            $total = 0;
            foreach ($events as $line) {
                $total += $line->total;
            };

            Log::info("Total from countries displayed: " . $total);


            return $events;


        });

        Log::info("Total displayed in scoreboard: " . $total);

        $years = range(\Carbon\Carbon::now()->year, 2014, -1);

        return view('scoreboard', [
            'events' => $events->sortBy('rank'),
            'total' => $total,
            'edition' => $edition,
            'years' => $years
        ]);
    }
}
