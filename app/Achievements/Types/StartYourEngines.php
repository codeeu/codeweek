<?php

namespace App\Achievements\Types;

class StartYourEngines extends AchievementType
{
    public $icon = 'star-green.svg';

    public function description()
    {
        return 'Start Your Engines';
    }

    public function qualifier($user)
    {
        return $user->getExperience()->points >= 1000;
    }
}
