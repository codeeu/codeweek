<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 20/04/18
 * Time: 09:30
 */

namespace App\Queries;


use App\Event;
use Illuminate\Support\Facades\Auth;

class PendingEventsQuery
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


            $query->Where('status', 'like', 'PENDING');

        })->orderBy('created_at', 'desc')->paginate(6);

    }
}