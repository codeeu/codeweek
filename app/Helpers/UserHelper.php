<?php

namespace App\Helpers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserHelper {

    public static function deleteInactiveUsers($nonActivityYears) {
        $deletedUsers = User::whereDate( 'updated_at', '<=', 
                                now()->subYear($nonActivityYears))
                             ->delete();
        return $deletedUsers;
    }
}
