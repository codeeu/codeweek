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


        /*$events = Event::
            groupBy('country')
            ->whereDate('end_date', '>', Carbon::now('Europe/Stockholm'))
            ->get();
*/
        $events = DB::table('events')
            ->join('countries_plus_country', 'events.country', '=', 'countries_plus_country.iso')
            ->select('country', 'countries_plus_country.name as country_name',DB::raw('count(*) as total'))
            ->whereDate('end_date', '>', Carbon::now('Europe/Brussels'))
            ->groupBy('country')
            ->orderBy('total','desc')
            ->get();

        return view('scoreboard', ['events'=>$events]);
    }
}
