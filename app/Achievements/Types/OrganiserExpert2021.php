<?php

namespace App\Achievements\Types;

class OrganiserExpert2021 extends AchievementType
{
    public $icon = 'organiser/organiser_expert_small.png';
    public $edition = 2021;
    public $name = 'Expert Organiser 2021';

    public function description()
    {
        return 'Report 10 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 10;
    }


}