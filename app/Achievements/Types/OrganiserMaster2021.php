<?php

namespace App\Achievements\Types;

class OrganiserMaster2021 extends AchievementType
{
    public $icon = 'organiser/organiser_master_small.png';
    public $name = 'Master Organiser 2021';

    public function description()
    {
        return 'Master Organiser 2021';
    }

    public function qualifier($user)
    {
        return $user->reported(2021) >= 30;
    }


}