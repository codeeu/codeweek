<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 20/04/18
 * Time: 09:30
 */

namespace App\Queries;


use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReportableEventsQuery
{

    public static function reportable()
    {

        return Event::where('status','APPROVED')
            ->where('creator_id', '=', Auth::user()->id)
            ->where('reported_at', '=', null)
            ->where('start_date', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')->paginate(6);

    }

    public static function reported()
    {


        return Event::where('status','APPROVED')
            ->where('creator_id', '=', Auth::user()->id)
            ->where('reported_at', '<>', null)
            ->where('start_date', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')->paginate(20);

    }
}