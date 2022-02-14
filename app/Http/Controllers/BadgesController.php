<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BadgesController extends Controller
{

    public function my(Request $request){
        $achievements = app('achievements');
        $userAchievements = auth()->user()->achievements;

        return view('badges.user', [
            'user' => auth()->user(),
            'achievements' => $achievements,
            'userAchievements' => $userAchievements,
            'year' => Carbon::now()->year
        ]);
    }

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
        if (!($user->id == auth()->id() || auth()->user()->isAdmin() || auth()->user()->isLeadingTeacherAdmin())){
            abort(403, 'You are not allowed');
        }


        $achievements = app('achievements');
        $userAchievements = $user->achievements;

        return view('badges.user', [
            'user' => $user,
            'achievements' => $achievements,
            'userAchievements' => $userAchievements,
            'year' => Carbon::now()->year
        ]);
    }
}
