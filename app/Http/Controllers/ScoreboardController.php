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


/*        $events = Event::
            groupBy('country')
            ->whereDate('end_date', '>', Carbon::now('Europe/Stockholm'))
            ->orderBy('country_count','desc')
            ->get();
*/
//        dd($events);

        $events = DB::table('events')
            ->join('countries', 'events.country_iso', '=', 'countries.iso')
            ->select('countries.iso', 'countries.name as country_name',DB::raw('count(*) as total'))
            ->whereDate('end_date', '>', Carbon::now('Europe/Brussels'))
            ->groupBy('countries.iso')
            ->orderBy('total','desc')
            ->get();



        return view('scoreboard', ['events'=>$events]);
    }
}
