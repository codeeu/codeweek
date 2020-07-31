<?php

namespace App;


class ActivityType
{
    public static function list()
    {
        return collect((object)[
            ["id" => 1, "name" => "open-online", "order" => 0, "key" => "open-online"],
            ["id" => 2, "name" => "invite-online", "order" => 1, "key" => "invite-online"],
            ["id" => 3, "name" => "open-in-person", "order" => 2, "key" => "open-in-person"],
            ["id" => 4, "name" => "invite-in-person", "order" => 3, "key" => "invite-in-person"]
        ]);
    }
}