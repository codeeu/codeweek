<?php

if (! function_exists('format_month')) {

    function format_month($text)
    {
        return app('formatter')->format_month($text);
    }
}

if (! function_exists('get_first_day')) {

    function get_first_day($date)
    {
        return app('formatter')->get_first_day($date);
    }
}

if (! function_exists('get_first_week')) {

    function get_first_week($date)
    {
        return app('formatter')->get_first_week($date);
    }
}

if (! function_exists('get_week')) {

    function get_week($start)
    {
        return app('formatter')->get_week($start);
    }
}

if (! function_exists('get_calendar')) {

    function get_calendar($event)
    {
        return app('formatter')->get_calendar($event);
    }
}