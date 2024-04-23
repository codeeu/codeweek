<?php

namespace App\Achievements\Types;

class OrganiserExpert2023 extends AchievementType
{
    public $icon = 'organiser/organiser_expert_2023.png';

    public $edition = 2023;

    public $name = 'Expert Organiser 2023';

    public function description()
    {
        return 'Report 10 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 10;
    }
}
