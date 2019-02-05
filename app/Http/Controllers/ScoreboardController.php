<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ScoreboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('edition')) {
            $edition = $request->query('edition');
        } else {
            $edition = Carbon::now('Europe/Brussels')->year;
        }

        $total =  DB::table('events')
            ->where('status',"=","APPROVED")
            ->whereYear('end_date', '=', $edition)
            ->count();

        $events = DB::table('events')
            ->join('countries', 'events.country_iso', '=', 'countries.iso')
            ->select('countries.iso', 'countries.name as country_name','countries.population as country_population', DB::raw('count(*) as total'), DB::raw('countries.population / count(*) as rank'))
            ->where('status',"=","APPROVED")
            ->whereYear('end_date', '=', $edition)
            ->groupBy('countries.iso')
            ->orderBy('rank','asc')
            ->get();


        $years = [2019, 2018, 2017, 2016, 2015, 2014];
        return view('scoreboard', [
            'events'=>$events,
            'total'=>$total,
            'edition'=>$edition,
            'years' => $years
        ]);
    }
}
