<?php

namespace App\Http\Controllers;

use App\Excellence;
use App\Exports\ExcellenceExport;
use App\Helpers\ExcellenceWinnersHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ExcellenceWinnersController extends Controller
{
    public function list(Request $request, $edition = 2024): View
    {

        //        $ttl = 1;
        $ttl = 60 * 60 * 24;

        //        dd($request->all());

        if ($request->input('edition')) {
            $edition = $request->get('edition');
        }

        //Log::info("Edition: " . $edition);

        if ($request->input('clear_cache')) {
            Log::info('cache cleaned');
            Cache::forget('details');
        }

        $details = ExcellenceWinnersHelper::query($edition, false);

        $total_events = DB::table('events')
            ->where('status', 'APPROVED')
            //->where('codeweek_for_all_participation_code', '<>', 'cw19-apple-eu')
            ->whereYear('end_date', '=', $edition)
            ->whereNull('deleted_at')
            ->count();

        $total_reported = DB::table('events')
            ->where('status', 'APPROVED')
            ->whereNotNull('reported_at')
            ->whereNull('deleted_at')
            ->whereYear('end_date', '=', $edition)
            ->count();

        $percentage_reported = ($total_reported / $total_events) * 100;

        if ($request->input('participants')) {
            if ($request->input('participants') == -1) {
                $details = $details->sortByDesc('total_participants');
            } else {
                $details = $details->sortBy('total_participants');
            }
        }

        if ($request->input('teachers')) {
            if ($request->input('teachers') == -1) {
                $details = $details->sortByDesc('total_creators');
            } else {
                $details = $details->sortBy('total_creators');
            }
        }

        if ($request->input('countries')) {
            if ($request->input('countries') == -1) {
                $details = $details->sortByDesc('total_countries');
            } else {
                $details = $details->sortBy('total_countries');
            }
        }

        if ($request->input('activities')) {
            if ($request->input('activities') == -1) {
                $details = $details->sortByDesc('total_activities');
            } else {
                $details = $details->sortBy('total_activities');
            }
        }

        if ($request->input('super')) {
            if ($request->input('super') == -1) {
                $details = $details->sortByDesc('super_winner');
            } else {
                $details = $details->sortBy('super_winner');
            }
        }

        if ($request->input('reporting')) {
            if ($request->input('reporting') == -1) {
                $details = $details->sortByDesc('reporting_percentage');
            } else {
                $details = $details->sortBy('reporting_percentage');
            }
        }

        return view('excellence.winners', compact(['edition', 'details', 'total_events', 'total_reported', 'percentage_reported']));
        //return view('excellence.winners',compact(['edition']));

    }

    public function excel()
    {
        return (new ExcellenceExport)->download('excellence.xlsx');

    }
}
