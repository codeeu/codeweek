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
            ->join("users", "creator_id", "=", "users.id")
            ->whereStatus("APPROVED")
            ->where("report_notifications_count", "<", 3)
            ->whereYear('end_date', '=', Carbon::now('Europe/Brussels')->year)
            ->where("users.email", "<>", "")
            ->where(function ($query) {
                $query->whereNull("last_report_notification_sent_at")
                    ->orWhere('last_report_notification_sent_at', '<', Carbon::now()->subDays(7));
            })
            ->where("end_date", '<=', Carbon::now())
            ->groupBy("users.email")
            ->distinct('users.email')
            ->orderBy("users.id")
            ->get();

        return $result;


    }

    /**
     * @return mixed
     */
    public static function getReportableEvents()
    {
        $result = Event::whereNull("reported_at")
            ->whereStatus("APPROVED")
            ->where("report_notifications_count", "<", 3)
            ->whereYear('end_date', '=', Carbon::now('Europe/Brussels')->year)
            ->where(function ($query) {
                $query->whereNull("last_report_notification_sent_at")
                    ->orWhere('last_report_notification_sent_at', '<', Carbon::now()->subDays(7));
            })
            ->where("end_date", '<=', Carbon::now());


        return $result;



    }


}