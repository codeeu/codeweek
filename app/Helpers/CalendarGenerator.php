<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarGenerator
{

    protected $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function format_month($date)
    {

        $dt = Carbon::parse($date);

        return $dt->format('F Y');
    }

    public function get_first_day($start_date)
    {

        $dt = Carbon::parse($start_date);
        return $dt->startOfMonth()->dayOfWeek;

    }

    public function get_calendar($event)
    {
        $start_date = Carbon::parse($event->start_date);
        $end_date = Carbon::parse($event->end_date);

        $start_day = $start_date->day;
        if($start_date->month == $end_date->month){
            $end_day = $end_date->day;
        } else {
            $end_day = $start_date->lastOfMonth()->day;
        }

        $firstDay = $start_date->startOfMonth()->dayOfWeek;
        $lastDay = $start_date->lastOfMonth()->day;

        if ($firstDay == 0) $firstDay = 7;

        list($row, $j) = $this->get_first_week($firstDay, $start_day, $end_day);

        do {
            $row .= $this->get_week($j,$lastDay, $start_day, $end_day);
            $j=$j+7;
        } while ($j <= $lastDay);


        return $row;

    }

    public function get_week($start, $lastDay, $start_day, $end_day)
    {
        $row = "<tr>";
        for ($i = $start; $i < $start + 7; $i++) {
            if($i <= $lastDay){
                if($i>=$start_day && $i<=$end_day){
                    $row .= "<td class=\"sat filled\"><span class=\"dayNumberNoEvents\">" . $i . "</span></td>";
                } else {
                    $row .= "<td class=\"sat\"><span class=\"dayNumberNoEvents\">" . $i . "</span></td>";
                }

            } else {
                $row .= "<td class=\"noday\">&nbsp;</td>";
            }

        }
        $row .= "</tr>";
        return $row;
    }

    /**
     * @param $firstDay
     * @param $start_day
     * @param $end_day
     * @return array
     */
    public function get_first_week($firstDay, $start_day, $end_day): array
    {
        $row = "<tr>";
        for ($i = 1; $i < $firstDay; $i++) {
            $row .= "<td class=\"noday\">&nbsp;</td>";
        }

        for ($j = 1; $j <= 8 - $i; $j++) {
            if ($j >= $start_day && $j <= $end_day) {
                $row .= "<td class=\"sat filled\"><span class=\"dayNumberNoEvents\">$j</span></td>";
            } else {
                $row .= "<td class=\"sat\"><span class=\"dayNumberNoEvents\">$j</span></td>";
            }

        }

        $row .= "</tr>";
        return array($row, $j);
    }

}