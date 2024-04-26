<?php

namespace App\Achievements\Types;

class OrganiserChampion2022 extends AchievementType
{
    public $icon = 'organiser/organiser_champion_small.png';

    public $edition = 2022;

    public $name = 'Champion Organiser 2022';

    public function description()
    {
        return 'Report 15 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 15;
    }
}
