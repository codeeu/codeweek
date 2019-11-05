<?php

namespace App\Helpers;

use App\Event;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExcellenceWinnersHelper
{



    public static function criteria1($edition)
    {

        $codes = Event::
        select(DB::raw('sum(participants_count) as total_participants, codeweek_for_all_participation_code'))
            ->where([
                ['status', 'like', 'APPROVED']
            ])
            ->whereYear('end_date', '=', $edition)
            ->groupBy('codeweek_for_all_participation_code')
            ->having('total_participants',">=",500)
            ->get()
            ->toArray();



        Log::info('Criteria 1');
        return $codes;

    }

    public static function criteria2($edition)
    {

        $codes = Event::
        select(DB::raw('count(DISTINCT creator_id) as total_creators, codeweek_for_all_participation_code'))
            ->where([
                ['status', 'like', 'APPROVED']
            ])
            ->whereYear('end_date', '=', $edition)
            ->groupBy('codeweek_for_all_participation_code')
            ->having('total_creators',">=",10)
            ->get()
            ->pluck('codeweek_for_all_participation_code')
            ->toArray();

        Log::info('Criteria 2');
        return $codes;

    }

    public static function criteria3($edition)
    {

        $codes = Event::
        select(DB::raw('count(DISTINCT country_iso) as total_countries, codeweek_for_all_participation_code'))
            ->where([
                ['status', 'like', 'APPROVED']
            ])
            ->whereYear('end_date', '=', $edition)
            ->groupBy('codeweek_for_all_participation_code')
            ->having('total_countries',">=",3)
            ->get()
            ->pluck('codeweek_for_all_participation_code')
            ->toArray();

        Log::info('Criteria 3');
        return $codes;

    }

    public static function getWinnerCodes($edition = null)
    {

        if (is_null($edition)) {
            $edition = Carbon::now()->year;
        }

        $winnerCodes = [];

        $crit1 = self::criteria1($edition);
        $crit2 = self::criteria2($edition);
        $crit3 = self::criteria3($edition);

        array_push($winnerCodes, $crit1, $crit2, $crit3);

        $result = collect($winnerCodes)->flatten()->unique();

        return $result;




    }

    public static function getDetailsByCodeweek4All(array $toArray)
    {

        return Event::
        select(DB::raw('sum(participants_count) as total_participants, count(DISTINCT creator_id) as total_creators, count(DISTINCT country_iso) as total_countries,  codeweek_for_all_participation_code'))
            ->where([
                ['status', 'like', 'APPROVED']
            ])
            ->whereIn('codeweek_for_all_participation_code',$toArray)
            ->groupBy('codeweek_for_all_participation_code')
            ->get()
            ->toArray();
    }


}