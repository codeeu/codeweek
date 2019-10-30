<?php

namespace App\Helpers;

use App\Event;
use App\Importer;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ImporterHelper
{


    //Create or load Technical user based on username

    public static function getTechnicalUser($username)
    {


        if (!User::where("username", "=", $username)->get()->isEmpty()) {
            return User::where("username", "=", $username)->first();
        };


        return User::create([
            'firstname' => "",
            'lastname' => "",
            'username' => $username,
            "password" => bcrypt(Str::random()),
            "email" => bcrypt(Str::random())
        ]);


    }

    public static function clean(){
        $ids = self::getDeletedEventsIDs();

        $deletedFromEvents = Event::whereIn('id', $ids)->delete();
        Log::info("Deleted From Events because they are not in Remote API: " . $deletedFromEvents);
        $deletedFromImporters = Importer::whereIn('event_id', $ids)->delete();
        Log::info("Deleted from Importers Table: " . $deletedFromImporters);

    }

    //Return the IDs of events to delete
    public static function getDeletedEventsIDs()
    {

        //Get current seen_at
        $currentSeenAt = Carbon::parse(Importer::max('seen_at'));

        //Get Event IDs that have not been seen in the last 24 hours
        $IDstoDelete = Importer::where('seen_at', '<=', $currentSeenAt->subDay(1))->pluck('event_id');

        return $IDstoDelete;


    }






}