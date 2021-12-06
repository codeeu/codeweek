<?php

namespace App\Achievements\Types;

class OrganiserLegendary2021 extends AchievementType
{
    public $icon = 'organiser/organiser_legendary_small.png';
    public $name = 'Legendary Organiser 2021';

    public function description()
    {
        return 'Legendary Organiser 2021';
    }

    public function qualifier($user)
    {
        return $user->reported(2021) >= 20;
    }


}