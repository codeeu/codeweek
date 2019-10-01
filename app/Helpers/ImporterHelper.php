<?php

namespace App\Helpers;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
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


}