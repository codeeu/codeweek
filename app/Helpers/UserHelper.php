<?php

namespace App\Helpers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Str;

class UserHelper
{

    public static function deleteInactiveUsers($nonActivityYears)
    {
        $deletedUsers = User::whereDate('updated_at', '<=',
            now()->subYear($nonActivityYears))
            ->delete();
        return $deletedUsers;
    }

    public static function hocusPocus()
    {
        return random_int(1000000, 2000000) * random_int(1000, 10000);
    }

    public static function getActiveUserByEmail($email)
    {
        $users = User::where('email', '=', $email)->get();


        if (count($users) == 0) {
            //Create User
            return self::createUser($email);
        };

        return $users[0];


    }

    public static function createUser($email)
    {

        $user = User::create(
            [
                'firstname' => 'Unknown',
                'lastname' => 'User',
                'username' => 'Unknown User',
                'password' => bcrypt(Str::random()),
                'email_display' => $email,
                'email' => $email
            ]
        );

        //Send an email to reset the password
        Mail::to($user)->queue(
            new \App\Mail\UserCreated($user)
        );

        return $user;
    }
}
