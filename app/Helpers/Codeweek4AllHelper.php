<?php

namespace App\Helpers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Codeweek4AllHelper
{
    public static function kpis($code, $edition = null)
    {

        if (is_null($edition)) {
            $edition = Carbon::now()->year;
        }

        $result = Event::select(DB::raw('count(DISTINCT creator_id) as total_creators, sum(participants_count) as participants_count, count(id) as event_count,  codeweek_for_all_participation_code'))
            ->where([
                ['status', 'APPROVED'],
                ['codeweek_for_all_participation_code', '=', $code],
            ])
            ->whereYear('end_date', '=', $edition)
            ->groupBy('codeweek_for_all_participation_code')
            ->get();



        return $result;

    }

    public static function countries($code, $edition = null)
    {

        if (is_null($edition)) {
            $edition = Carbon::now()->year;
        }

        select(DB::raw('count(DISTINCT creator_id) as total_creators, sum(participants_count) as total_participants, codeweek_for_all_participation_code'))
            ->where([
                ['status', 'APPROVED'],
            ])
            ->whereYear('end_date', '=', $edition)
            ->groupBy('codeweek_for_all_participation_code')
            ->having('total_participants', '>', 0)
            ->having('total_creators', '>=', 10)
            ->get()
            ->pluck('codeweek_for_all_participation_code')
            ->toArray();

        $result = Event::select(DB::raw('sum(participants_count) as participants_count, count(id) as event_count,  codeweek_for_all_participation_code'))
            ->where([
                ['status', 'APPROVED'],
                ['codeweek_for_all_participation_code', '=', $code],
            ])
            ->whereYear('end_date', '=', $edition)
            ->groupBy('codeweek_for_all_participation_code')
            ->first();

        return $result;

    }

    public static function getDetailsByCodeweek4All(array $toArray, $edition = null)
    {

        if (is_null($edition)) {
            $edition = Carbon::now()->year;
        }

        return Event::select(DB::raw('codeweek_for_all_participation_code, sum(participants_count) as total_participants, count(DISTINCT creator_id) as total_creators, count(DISTINCT country_iso) as total_countries,  count(id) as total_activities, ((100.0*count(reported_at))/count(*)) as reporting_percentage'))
            ->where([
                ['status', 'APPROVED'],
            ])
            ->whereYear('end_date', '=', $edition)
            ->whereIn('codeweek_for_all_participation_code', $toArray)
            ->groupBy('codeweek_for_all_participation_code')
            ->get();
    }

    public static function getCountriesByCodeweek4All($code, $edition = null)
    {
        if (is_null($edition)) {
            $edition = Carbon::now()->year;
        }

        $result = Event::select(DB::raw('countries.name , count(events.id) as event_per_country'))
            ->join('countries', 'events.country_iso', '=', 'countries.iso')
            ->where([
                ['status', 'APPROVED'],
                ['codeweek_for_all_participation_code', 'like', $code],
            ])
            ->whereYear('end_date', '=', $edition)
            ->groupBy('country_iso')
            ->get();

        return $result;
    }

    public static function getInitiatorByCodeweek4All($code)
    {
        $result = Event::select(DB::raw('users.email'))
            ->join('users', 'events.creator_id', '=', 'users.id')
            ->where([
                ['status', 'APPROVED'],
                ['codeweek_for_all_participation_code', 'like', $code],
            ])
            ->orderBy('events.created_at', 'asc')
            ->first()
            ->email;

        return $result;

    }
}
