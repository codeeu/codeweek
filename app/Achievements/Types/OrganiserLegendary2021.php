<?php

namespace App\Achievements\Types;

class OrganiserLegendary2021 extends AchievementType
{
    public $icon = 'organiser/organiser_legendary_small.png';
    public $edition = 2021;
    public $name = 'Legendary Organiser 2021';

    public function description()
    {
        return 'Report 20 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 20;
    }


}