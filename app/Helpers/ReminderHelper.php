<?php

namespace App\Helpers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReminderHelper
{
    public static function getInactiveCreators($edition)
    {
        // $active = Event::where('status','APPROVED')->where
        //$result = Event::whereNotIn('creator_id', [100,200])->get(['field_name1','field_name2']);
        $activeIds = DB::table('events')
            ->join('users', 'users.id', '=', 'events.creator_id')
            //->where('creator_id','=',$this->id)
            ->where('status', 'APPROVED')
            ->where('users.receive_emails', true)
            ->whereNull('users.deleted_at')
            ->whereNull('events.deleted_at')
            ->whereYear('events.end_date', '=', $edition)
            ->groupBy('users.email')
            ->select('users.id')
            ->get()
            ->pluck('id')
            ->toArray();

        return DB::table('events')
            ->join('users', 'users.id', '=', 'events.creator_id')
            //->where('creator_id','=',$this->id)
            ->where('status', 'APPROVED')
            ->whereNull('events.deleted_at')
            ->where(function ($query) use ($edition) {
                return $query->whereYear('events.end_date', '=', $edition - 1);
                //->orWhereYear('events.end_date', '=', $edition - 2);
            })

            ->whereIntegerNotInRaw('events.creator_id', $activeIds)
            ->groupBy('users.email')
            ->select('users.email')
            ->get()
            ->pluck('email');
    }

    public static function getActiveCreators()
    {

        $activeIds = DB::table('events')
            ->join('users', 'users.id', '=', 'events.creator_id')

            ->where('status', 'APPROVED')
            ->where('users.receive_emails', true)
            ->whereNull('users.deleted_at')
            ->whereNull('events.deleted_at')
            ->groupBy('users.email')
            ->select('users.id')
            ->get()
            ->pluck('id')
            ->toArray();

        return DB::table('events')
            ->join('users', 'users.id', '=', 'events.creator_id')

            ->where('status', 'APPROVED')
            ->whereNull('events.deleted_at')
            ->whereIntegerInRaw('events.creator_id', $activeIds)
            ->groupBy('users.email')
            ->select(['users.email', 'users.magic_key'])
            ->get();

    }

    public static function getCreatorsWithReportableEvents()
    {
        $result = Event::whereNull('reported_at')
            ->join('users', 'creator_id', '=', 'users.id')
            ->whereStatus('APPROVED')
            ->where('report_notifications_count', '<', 3)
            ->whereYear('end_date', '=', Carbon::now('Europe/Brussels')->year)
            ->where('users.email', '<>', '')
            ->where(function ($query) {
                $query
                    ->whereNull('last_report_notification_sent_at')
                    ->orWhere(
                        'last_report_notification_sent_at',
                        '<',
                        Carbon::now()->subDays(7)
                    );
            })
            ->where('end_date', '<=', Carbon::now())
            ->groupBy(['users.email','events.id'])
            ->orderBy('users.id')
            ->get()
            ->unique();

        return $result;
    }

    /**
     * @return mixed
     */
    public static function getReportableEvents()
    {
        $result = Event::whereNull('reported_at')
            ->whereStatus('APPROVED')
            ->where('report_notifications_count', '<', 3)
            ->whereYear('end_date', '=', Carbon::now('Europe/Brussels')->year)
            ->where(function ($query) {
                $query
                    ->whereNull('last_report_notification_sent_at')
                    ->orWhere(
                        'last_report_notification_sent_at',
                        '<',
                        Carbon::now()->subDays(7)
                    );
            })
            ->where('end_date', '<=', Carbon::now());

        return $result;
    }
}
