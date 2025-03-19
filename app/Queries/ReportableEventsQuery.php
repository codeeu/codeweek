<?php

/**
 * @Author: Bernard Hanna
 * @Date:   2025-01-29 14:25:28
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2025-03-12 17:57:08
 */


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

        return Event::where('status', 'APPROVED')
            ->where('creator_id', '=', Auth::user()->id)
            ->where(function ($query) {
                $query->whereNull('reported_at')
                    ->orWhereNull('certificate_url');
            })
            ->where('start_date', '<=', Carbon::now())
            ->orderBy('end_date', 'desc')->paginate(20);
    }

    public static function reported()
    {

        return Event::where('status', 'APPROVED')
            ->where('creator_id', '=', Auth::user()->id)
            ->whereNotNull('reported_at')
            ->where('start_date', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')->paginate(20);
    }
}
