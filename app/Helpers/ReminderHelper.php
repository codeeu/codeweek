<?php

namespace App\Helpers;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReminderHelper
{

    public static function getCreatorsWithReportableEvents()
    {

        $result = Event::whereNull("reported_at")
            ->join("users", "creator_id","=","users.id")
            ->whereStatus("APPROVED")


            ->where("report_notifications_count","<",3)
            ->whereYear('end_date', '=', Carbon::now('Europe/Brussels')->year)
            ->where("users.email","<>","")
            ->where("end_date",'<=', Carbon::now())
            ->groupBy("users.email")
            ->distinct('users.email')
            ->orderBy("users.id")
            ->limit(2)
            ->get();

        return $result;









//        $ambassadors_count = User::role('ambassador')
//            ->whereNotNull("avatar_path")
//            ->whereNotNull("bio")
//            ->where("country_iso","<>", "")
//            ->join('countries', 'country_iso', '=', 'countries.iso')
//            ->groupBy('country_iso')
//            ->select('country_iso', DB::raw('count(*) as total'),'countries.name')
//            ->orderBy("countries.name")
//            ->get();
//
//
//        return $ambassadors_count;


    }



}