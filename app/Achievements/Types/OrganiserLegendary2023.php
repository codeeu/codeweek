<?php

namespace App\Achievements\Types;

class OrganiserLegendary2023 extends AchievementType
{
    public $icon = 'organiser/organiser_legendary_2023.png';

    public $edition = 2023;

    public $name = 'Legendary Organiser 2023';

    public function description()
    {
        return 'Report 20 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 20;
    }
}
