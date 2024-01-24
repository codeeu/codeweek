<?php

namespace App\Achievements\Types;

class OrganiserChampion2024 extends AchievementType
{
    public $icon = 'organiser/organiser_champion_2024.png';
    public $edition = 2024;
    public $name = 'Champion Organiser 2024';

    public function description()
    {
        return 'Report 15 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 15;
    }


}