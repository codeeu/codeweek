<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BadgesController extends Controller
{

    public function my(Request $request)
    {
        $achievements = app('achievements');
        $userAchievements = auth()->user()->achievements;

        return view('badges.user', [
            'user' => auth()->user(),
            'achievements' => $achievements,
            'userAchievements' => $userAchievements,
            'year' => Carbon::now()->year
        ]);
    }

    public function leaderboard(Request $request)
    {

        //  $users = User::with('experience')->role('leading teacher')->orderByDesc('experience.points')->paginate(15);
        $year = $request['year'] ?? Carbon::now()->year;
        $page = $request['page'] ?? 1;

        $users = User
            ::role('leading teacher')
//    ::where('user_id','=',$this->id)
//    ->where('quantity','>',0)
            ->join('experiences', 'users.id', '=', 'experiences.user_id')
            ->where('experiences.year', '=', $year)
            ->orderByDesc('experiences.points')
            ->select('users.*')
            ->paginate(50);

        //dd($users);

        $rank = $users->firstItem();


        return view('badges.leaderboard', [
            'years' => range(\Carbon\Carbon::now()->year, 2018, -1),
            'users' => $users,
            'rank' => $rank,
            'year' => $year
        ]);
    }


    public function user(Request $request, User $user)
    {

        if (!($user->id == auth()->id() || auth()->user()->isAdmin() || auth()->user()->isLeadingTeacherAdmin())) {
            abort(403, 'You are not allowed');
        }

        $year = $request['year'] ?? Carbon::now()->year;

        $achievements = app('achievements')->filter(function ($achievement) use ($year) {
            return $achievement->edition == $year;
        });

        $organiserBadges = $achievements->filter(function ($achievement) {
            return Str::contains(Str::lower($achievement->name), 'organiser');
        });

        $influencerBadges = $achievements->filter(function ($achievement) {
            return Str::contains(Str::lower($achievement->name), 'influencer');
        });


        $userAchievements = $user->achievements;


        return view('badges.user', [
            'user' => $user,
            'achievements' => $achievements,
            'userAchievements' => $userAchievements,
            'year' => $year,
            'organiserBadges' => $organiserBadges,
            'influencerBadges' => $influencerBadges,
        ]);
    }
}
