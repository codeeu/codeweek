<?php

namespace App\Achievements\Types;

class OrganiserLegendary2024 extends AchievementType
{
    public $icon = 'organiser/organiser_legendary_2024.png';
    public $edition = 2024;
    public $name = 'Legendary Organiser 2024';

    public function description()
    {
        return 'Report 20 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 20;
    }


}