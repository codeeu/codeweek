<?php

namespace App\Achievements\Types;

class OrganiserMaster2022 extends AchievementType
{
    public $icon = 'organiser/organiser_master_small.png';

    public $edition = 2022;

    public $name = 'Master Organiser 2022';

    public function description()
    {
        return 'Report 30 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 30;
    }
}
