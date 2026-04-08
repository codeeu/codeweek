<?php

namespace App\Achievements\Types;

class OrganiserExpert2026 extends AchievementType
{
    public $icon = 'organiser/organiser_expert_2026.png';

    public $edition = 2026;

    public $name = 'Expert Organiser 2026';

    public function description()
    {
        return 'Report 10 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 10;
    }
}

