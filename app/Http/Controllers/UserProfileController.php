<?php

namespace App\Http\Controllers;

use App\Achievements\Achievement;
use App\Achievements\Achievements;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
            'userAchievements' => $userAchievements
        ]);
    }
}
