<?php


namespace App\Achievements;


use Illuminate\Database\Eloquent\Collection;

class Achievements extends Collection
{
    public function for($user){
        return $user->achievements;
    }

    public function sortByLevel($asc = true)
    {
        $method = $asc ? 'sortBy' : 'sortByDesc';

        return $this->$method->levelAsNumber();
    }

    public function sortByLevelDesc()
    {
        return $this->sortByLevel(false);
    }

    public function asPercentageOfTotalAvailable()
    {
        $totalAchievements = Achievement::count();

        return $totalAchievements ? round($this->count() / $totalAchievements * 100) : 0;
    }
}