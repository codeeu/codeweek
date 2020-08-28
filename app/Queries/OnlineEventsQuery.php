<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 20/04/18
 * Time: 09:30
 */

namespace App\Queries;


use App\Event;
use App\Facades\Calendar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OnlineEventsQuery
{

    public static function trigger($country)
    {
        return Event::where(function ($query) use ($country) {

            if (!auth()->user()->hasRole('super admin')) {
                $query->where('country_iso', '=', Auth::user()->country->iso);
            }

            if (!is_null($country)) {
                $query->where('country_iso', '=', $country->iso);
            }

            $query->where('activity_type', 'open-online');
            $query->where('start_date', '>=', Carbon::now());


        })->orderBy('created_at', 'desc')->paginate(20);

    }
}