<?php

namespace App\Helpers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExcellenceWinnersHelper
{
    public static function query($edition = null, $withFullDetails = false)
    {
        $ttl = 1;

        //        $ttl = 60*60;
        return Cache::remember('details', $ttl, function () use ($withFullDetails, $edition) {
            //            Log::info('query without cache');
            $edition = ! is_null($edition) ? $edition : Carbon::now()->year;
            $codes = self::getWinnerCodes($edition);
            $details = Codeweek4AllHelper::getDetailsByCodeweek4All($codes->toArray(), $edition);
            $full = self::tagSuperWinners($details, $withFullDetails);

            return $full;

        });

    }

    public static function criteria1($edition)
    {

        $codes = Event::select(DB::raw('sum(participants_count) as total_participants, codeweek_for_all_participation_code'))
            ->where([
                ['status', 'APPROVED'],
            ])
            ->whereYear('end_date', '=', $edition)
            ->groupBy('codeweek_for_all_participation_code')
            ->having('total_participants', '>=', 500)
            ->get()
            ->pluck('codeweek_for_all_participation_code')
            ->toArray();

        //        Log::info('Criteria 1');
        return $codes;

    }

    public static function criteria2($edition)
    {

        $codes = Event::select(DB::raw('count(DISTINCT creator_id) as total_creators, sum(participants_count) as total_participants, codeweek_for_all_participation_code'))
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

        //        Log::info('Criteria 2');
        return $codes;

    }

    public static function criteria3($edition)
    {

        $codes = Event::select(DB::raw('count(DISTINCT country_iso) as total_countries, sum(participants_count) as total_participants,codeweek_for_all_participation_code'))
            ->where([
                ['status', 'APPROVED'],
            ])
            ->whereYear('end_date', '=', $edition)
            ->groupBy('codeweek_for_all_participation_code')
            ->having('total_countries', '>=', 3)
            ->having('total_participants', '>', 0)
            ->get()
            ->pluck('codeweek_for_all_participation_code')
            ->toArray();

        //        Log::info('Criteria 3');
        return $codes;

    }

    public static function getWinnerCodes($edition = null)
    {

        if (is_null($edition)) {
            $edition = Carbon::now()->year;
        }

        $winnerCodes = [];

        //$crit1 = self::criteria1($edition);
        $crit2 = self::criteria2($edition);
        $crit3 = self::criteria3($edition);

        array_push($winnerCodes, $crit2, $crit3);

        $result = collect($winnerCodes)->flatten()->unique();

        //Log::info($result);

        return $result;

    }

    public static function tagSuperWinners($details, $withFullDetails)
    {

        foreach ($details as $detail) {

            $detail->super_winner = '0';
            if ($detail->total_creators >= 10 && $detail->total_activities >= 10 && $detail->total_countries >= 3) {
                Log::info("Super winner: {$detail->codeweek_for_all_participation_code}");
                $detail->super_winner = 1;

                if ($withFullDetails) {
                    $detail->initiator_email = Codeweek4AllHelper::getInitiatorByCodeweek4All([$detail->codeweek_for_all_participation_code]);
                    $countries = Codeweek4AllHelper::getCountriesByCodeweek4All($detail->codeweek_for_all_participation_code, 2019);

                    $info = '';
                    foreach ($countries as $country) {
                        $info .= "{$country->name} ({$country->event_per_country})";

                        $info .= ' | ';

                    }

                    $detail->zoubidou = $info;
                }

            }
        }

        return $details;
    }
}
