<?php

namespace App\Achievements\Types;

class OrganiserActive2026 extends AchievementType
{
    public $icon = 'organiser/organiser_active_2026.png';

    public $edition = 2026;

    public $name = 'Active Organiser 2026';

    public function description()
    {
        return 'Report 5 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 5;
    }
}

