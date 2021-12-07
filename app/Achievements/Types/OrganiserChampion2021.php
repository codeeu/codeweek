<?php

namespace App\Achievements\Types;

class OrganiserChampion2021 extends AchievementType
{
    public $icon = 'organiser/organiser_champion_small.png';
    public $name = 'Champion Organiser 2021';

    public function description()
    {
        return 'Report 15 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported(2021) >= 15;
    }


}