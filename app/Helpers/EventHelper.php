<?php

namespace App\Helpers;

use App\Country;
use App\Event;
use App\User;
use Arr;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Log;

class EventHelper
{
    public static function getCloseEvents($longitude, $latitude, $id = 0, $num = 3)
    {
        //acos is not known with sqlite that is used for testing.
        if (config('codeweek.db_connection') == 'sqlite') {
            return Event::take($num)->get();
        }

        $events = Event::selectRaw(
            'id, title, slug, start_date, end_date, picture, description, picture, creator_id, highlighted_status, recurring_event, 
        ( 6371 *
         acos( cos( radians(?) ) *
         cos( radians( latitude ) ) *
         cos( radians( longitude ) -
         radians(?) ) +
         sin( radians(?) ) *
         sin( radians( latitude ) ) ) )
         AS distance',
            [$latitude, $longitude, $latitude]
        )
            ->where('status', 'APPROVED')
            ->where('id', '<>', $id)
            ->where('end_date', '>', Carbon::now())
            ->orderBy('distance')
            ->take($num)
            ->get();

        return $events;
    }

    public static function getPendindEvents()
    {
        $country_isos_ambassadors = User::role('ambassador')
            ->distinct()
            ->select('country_iso')
            ->where('country_iso', '<>', '')
            ->get();

        $countries = [];

        foreach ($country_isos_ambassadors as $country) {
            array_push($countries, $country->country_iso);
        }

        $events = Event::where('status', 'PENDING')
            ->distinct()
            ->select('country_iso')
            ->where('start_date', '>', Carbon::createFromDate(2018, 1, 1))
            ->whereIn('country_iso', $countries)
            ->get();

        return $events;
    }

    public static function getReportedEventsWithoutCertificates()
    {
        $events = Event::where('status', 'APPROVED')
            ->whereNotNull('reported_at')
            ->whereNull('certificate_url')
            ->whereNotNull('approved_by')
            ->whereDate('reported_at', '>', Carbon::now()->subDays(10))
            ->orderBy('id', 'desc')
            ->get();

        return $events;
    }

    private static function getPendingEventsForCountry($country)
    {

        $events = Event::where('status', 'PENDING')
            ->where('start_date', '>', Carbon::createFromDate(2018, 1, 1))
            ->where('country_iso', $country)
            ->get();

        return $events;
    }

    private static function getPendingEventsCountForCountry($country)
    {

        $count = Event::where('status', 'PENDING')
            ->select('country_iso')
            ->where('start_date', '>', Carbon::createFromDate(2018, 1, 1))
            ->where('country_iso', $country)
            ->count();

        return $count;
    }

    private static function getEventsQuery()
    {
        return Event::where('status', 'PENDING')
            ->where('start_date', '>', Carbon::createFromDate(2018, 1, 1));
    }

    public static function getPendingEvents(?string $country = null)
    {

        if (is_null($country)) {
            //Get pending events for all countries
            return self::getEventsQuery()->get();
        } else {
            //Get pending events for specific country
            return self::getPendingEventsForCountry($country);
        }

    }

    public static function getPendingEventsCount(?string $country = null)
    {

        if (is_null($country)) {
            //Get pending events count for all countries
            return self::getEventsQuery()->count();
        } else {
            //Get pending events count for specific country
            return self::getPendingEventsCountForCountry($country);
        }

    }

    public static function getNextPendingEvent(Event $event, ?string $country = null)
    {
        if (is_null($country)) {
            //Get pending events count for all countries
            return self::getEventsQuery()->where('id', '>', $event->id)->limit(1)->first();
        } else {
            //Get pending events count for specific country
            return Event::where('status', 'PENDING')
                ->where('country_iso', $country)
                ->where('start_date', '>', Carbon::createFromDate(2018, 1, 1))
                ->where('id', '<>', $event->id)->limit(1)->first();

        }

    }

    public static function getOnlineEvents()
    {
        $events = Event::where([
            'activity_type' => 'open-online',
            'status' => 'APPROVED',
            'highlighted_status' => 'FEATURED',
        ])
            ->where('start_date', '>=', \Carbon\Carbon::now()->subDays(15))->where('end_date', '>=', \Illuminate\Support\Carbon::now())
//            ->where('start_date', '>=', Carbon::now()->subDays(30))
            ->orderBy('start_date')
            ->get();

        return $events;
    }

    public static function getCenteredNotRelocatedEvents($iso)
    {
        //Get all activities in the center of the map for the specified country that have not yet been relocated
        $country = Country::where('iso', '=', $iso)->first();

        if (is_null($country)) {
            return [];
        }

        $events = Event::where([
            'country_iso' => $iso,
            'longitude' => number_format($country->longitude, 6),
            'latitude' => number_format($country->latitude, 6),
            'relocated' => false,
            ['location', '<>', 'online'],
        ])
            ->orderBy('created_at', 'desc')
            ->limit(30)
            ->get();

        return $events;
    }

    public static function trimGeoposition($latitude, $longitude, $precision = 2)
    {

        $result = round($latitude, $precision, PHP_ROUND_HALF_DOWN).','.round($longitude, $precision, PHP_ROUND_HALF_DOWN);
        Log::info($result);

        return $result;
    }

    public static function getDistinctEmailsWithUsersHavingNullEmail()
    {

        $query = DB::table('events')->distinct()->select('events.user_email')
            ->join('users', 'events.creator_id', '=', 'users.id')
            ->whereNull('users.email');

        //        dd($query->toSql());
        $records = $query->get()->toArray();

        //        dd($records);
        return Arr::pluck($records, 'user_email');

    }

    //    public static function getActivitiesWithUsersHavingNullEmail()
    //    {
    //
    //        $query = DB::table('events')
    //            ->join('users', 'events.creator_id', '=', 'users.id')
    //            ->whereNull('users.email')
    //            ->select(['events.id']);
    //
    ////        dd($query->toSql());
    //        return $query->get();
    //    }

    //    public static function reassignUser($activity_id)
    //    {
    //        Log::info('Activity with null email user: ' . $activity_id);
    //        //Get user email
    //        $event = Event::withTrashed()->where('id', '=', $activity_id)->first();
    //        $email = $event->user_email;
    //
    //
    //        //Deactivate all users with the email
    //        DB::table('users')->where('email', $email)->delete();
    //
    //        $user = User::withTrashed()->where('email', $email)
    //            ->orderByDesc('created_at')
    //            ->firstOrCreate(
    //                [
    //                    'firstname' => 'John',
    //                    'lastname' => 'Doe',
    //                    'username' => 'John Doe',
    //                    'password' => bcrypt(Str::random()),
    //                    'email_display' => $email,
    //                    'email' => $email
    //                ]
    //            );
    //
    //        $user->restore();
    //
    //        Log::info('Assigning user: ' . $user->id);
    //
    //        // Link activity to active user
    //        DB::table('events')->where('id', $activity_id)->update(['creator_id' => $user->id]);
    //
    //
    //    }

    public static function reassignActivities(User $user)
    {
        Event::withTrashed()->where('user_email', '=', $user->email)->update(['creator_id' => $user->id]);
    }
}
