<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BadgesController extends Controller
{
    public function scoreboard(Request $request)
    {

        //  $users = User::with('experience')->role('leading teacher')->orderByDesc('experience.points')->paginate(15);
        $year = $request['year'] ?? Carbon::now()->year;
        $page = $request['page'] ?? 1;

        $users = User
            ::role('leading teacher')
//    ::where('user_id','=',$this->id)
//    ->where('quantity','>',0)
            ->join('experiences', 'users.id', '=', 'experiences.user_id')
            ->where('experiences.year','=',$year)
            ->orderByDesc('experiences.points')
            ->select('users.*')
            ->paginate(15);

        //dd($users);

        $rank = $users->firstItem();

        return view('badges.scoreboard', [
            'users' => $users,
            'rank' => $rank,
            'year' => $year
        ]);
    }



    public function user(User $user)
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
            'year' => Carbon::now()->year
        ]);
    }
}
