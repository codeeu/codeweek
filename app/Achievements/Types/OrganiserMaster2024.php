<?php

namespace App\Achievements\Types;

class OrganiserMaster2024 extends AchievementType
{
    public $icon = 'organiser/organiser_master_2024.png';

    public $edition = 2024;

    public $name = 'Master Organiser 2024';

    public function description()
    {
        return 'Report 30 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 30;
    }
}
