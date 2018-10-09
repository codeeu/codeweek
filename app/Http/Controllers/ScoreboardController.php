<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ScoreboardController extends Controller
{
    public function index()
    {

        $total =  DB::table('events')
            ->where('status',"=","APPROVED")
            ->whereYear('end_date', '>=', Carbon::now('Europe/Brussels')->year)
            ->count();

        $events = DB::table('events')
            ->join('countries', 'events.country_iso', '=', 'countries.iso')
            ->select('countries.iso', 'countries.name as country_name','countries.population as country_population', DB::raw('count(*) as total'), DB::raw('countries.population / count(*) as rank'))
            ->where('status',"=","APPROVED")
            ->whereYear('end_date', '>=', Carbon::now('Europe/Brussels')->year)
            ->groupBy('countries.iso')
            ->orderBy('rank','asc')
            ->get();

        return view('scoreboard', [
            'events'=>$events,
            'total'=>$total
        ]);
    }
}
