<?php

namespace App\Achievements\Types;

class OrganiserChampion2023 extends AchievementType
{
    public $icon = 'organiser/organiser_champion_2023.png';

    public $edition = 2023;

    public $name = 'Champion Organiser 2023';

    public function description()
    {
        return 'Report 15 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 15;
    }
}
