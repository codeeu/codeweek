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

        $cache_time = 60 * 60 * 24 * 365;
        if ($edition == Carbon::now('Europe/Brussels')->year) {
            $cache_time = 5 * 60;
        };


        $total = Cache::remember('total_' . $edition, $cache_time, function () use ($edition) {
            Log::info("Setting cache for scoreboard total in " . $edition);
            return DB::table('events')
                ->where('status', "=", "APPROVED")
                ->whereYear('end_date', '=', $edition)
                ->count();
        });


        $events = Cache::remember('events_' . $edition, $cache_time, function () use ($edition) {
            Log::info("Setting cache for scoreboard events in " . $edition);
            return DB::table('events')
                ->join('countries', 'events.country_iso', '=', 'countries.iso')
                ->select('countries.iso as country_iso', 'countries.name as country_name', 'countries.population as country_population', DB::raw('count(*) as total'), DB::raw('countries.population / count(*) as rank'))
                ->where('status', "=", "APPROVED")
                ->whereYear('start_date', '=', $edition)
                ->groupBy('countries.iso')
                ->orderBy('rank', 'asc')
                ->get();
        });

        $years = [2019, 2018, 2017, 2016, 2015, 2014];
        return view('scoreboard', [
            'events' => $events,
            'total' => $total,
            'edition' => $edition,
            'years' => $years
        ]);
    }
}
