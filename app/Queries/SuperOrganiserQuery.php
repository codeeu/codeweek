<?php

namespace App\Queries;


use App\Event;
use App\Excellence;
use Carbon\Carbon;
use DB;
use Doctrine\DBAL\Events;
use Illuminate\Support\Facades\Auth;

class SuperOrganiserQuery
{

    public static function mine()
    {

        return Excellence::where([
         'user_id' => auth()->id(),
         'type' => 'SuperOrganiser'
        ]);

    }

    public static function winners($edition){
        $winners =  DB::table('events')
            ->where('status', "=", "APPROVED")
            ->whereNull('deleted_at')
            ->whereYear('end_date', '=', $edition)
            ->groupBy('creator_id')
            ->having(DB::raw('count(creator_id)'), '>=', 10)
            ->pluck('creator_id')
            ->toArray();


        return $winners;
    }

    public static function byYear($edition)
    {


        return self::mine()
            ->where('edition', $edition);


    }


}