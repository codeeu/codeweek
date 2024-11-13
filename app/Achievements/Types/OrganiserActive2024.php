<?php

namespace App\Achievements\Types;

class OrganiserActive2024 extends AchievementType
{
    public $icon = 'organiser/organiser_active_2024.png';

    public $edition = 2024;

    public $name = 'Active Organiser 2024';

    public function description()
    {
        return 'Report 5 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 5;
    }
}
