<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class MailingHelper
{
    public static function getActiveCreators($country)
    {

        $activeIds = DB::table('events')
            ->join('users', 'users.id', '=', 'events.creator_id')
            ->where('status', 'APPROVED')
            ->where('users.receive_emails', true)
            ->where('events.country_iso', '=', $country)
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
}
