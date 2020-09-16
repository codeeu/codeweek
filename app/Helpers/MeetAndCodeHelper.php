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

class MeetAndCodeHelper
{

    public static function getLanguage($url)
    {

        $languages = [
            "uk" => "en",
            "sq" => "al",
            "sr" => "rs",
            "ie" => "en",
            "bs" => "ba",
            "dk" => "da",
        ];

        $parts = explode("/", $url);

        if (!isset($parts[4]) || strlen($parts[4]) !== 2) return null;

        $found_lang = $parts[4];

        $not_matched = ["ru", "ks", "no"];
        if (array_search($found_lang, $not_matched) !== false) return null;

        if (array_key_exists($found_lang, $languages)) return $languages[$found_lang];

        return $found_lang;

    }

    public static function detectLanguage($event)
    {
        $lang = self::getLanguage($event->event_url);
        if (!is_null($lang)) {
            $event->language = $lang;
            $event->save();
        }
    }

    public static function updateThemeAndAudience($event){
        if (!$event->audiences()->exists()){
            $event->audiences()->attach(8);
        }

        if (!$event->themes()->exists()){
            $event->themes()->attach(8);
        }

    }


}