<?php

namespace App\Achievements\Types;

class SuperExpert extends AchievementType
{
    public $icon = 'star-orange.svg';

    public function description()
    {
        return 'Super Expert';
    }

    public function qualifier($user)
    {
        return $user->getExperience()->points >= 10000;
    }
}
