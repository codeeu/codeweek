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

        $events = DB::table('events')
            ->join('countries', 'events.country_iso', '=', 'countries.iso')
            ->select('countries.iso', 'countries.name as country_name',DB::raw('count(*) as total'))
            ->where('status',"=","APPROVED")
            ->whereYear('end_date', '>=', Carbon::now('Europe/Brussels')->year)
            ->groupBy('countries.iso')
            ->orderBy('total','desc')
            ->get();

        return view('scoreboard', ['events'=>$events]);
    }
}
