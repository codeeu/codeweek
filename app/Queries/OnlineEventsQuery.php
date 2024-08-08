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

class OnlineEventsQuery
{
    public static function trigger($country, $highlighted_status = null)
    {
        return Event::where(function ($query) use ($country, $highlighted_status) {

            if (! auth()->user()->hasRole('super admin')) {
                $query->where('country_iso', '=', Auth::user()->country->iso);
            }

            if (! is_null($country)) {
                $query->where('country_iso', '=', $country->iso);
            }

            if (! is_null($highlighted_status)) {
                $query->where('highlighted_status', '=', $highlighted_status);
            }

            $query->where('status', 'APPROVED');
            $query->where('activity_type', 'open-online');
            $query->where(
                function ($query) {
                    $query->where('start_date', '>=', Carbon::now()->subDays(15))->where('end_date', '>=', Carbon::now());
                });

            //             dd($query->toSql());

        })->orderBy('start_date', 'asc')->paginate(20);

    }
}
