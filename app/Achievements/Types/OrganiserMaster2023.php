<?php

namespace App\Achievements\Types;

class OrganiserMaster2023 extends AchievementType
{
    public $icon = 'organiser/organiser_master_2023.png';

    public $edition = 2023;

    public $name = 'Master Organiser 2023';

    public function description()
    {
        return 'Report 30 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 30;
    }
}
