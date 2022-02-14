<?php

namespace App\Achievements\Types;

class OrganiserLegendary2022 extends AchievementType
{
    public $icon = 'organiser/organiser_legendary_small.png';
    public $edition = 2022;
    public $name = 'Legendary Organiser 2022';

    public function description()
    {
        return 'Report 20 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 20;
    }


}