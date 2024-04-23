<?php

namespace App\Http\Controllers;

use App\User;

class UserProfileController extends Controller
{
    public function index(User $user)
    {

        $achievements = app('achievements');
        $userAchievements = $user->achievements;

        //        foreach ($achievements as $achievement) {
        //            if (in_array($achievement->modelKey(), $userAchievements->pluck('id')->all())) {
        //                dump('found one');
        //            }
        //        }

        return view('badges.user', [
            'user' => $user,
            'achievements' => $achievements,
            'userAchievements' => $userAchievements,
        ]);
    }
}
