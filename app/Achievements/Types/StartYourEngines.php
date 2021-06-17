<?php

namespace App\Achievements\Types;

class StartYourEngines extends AchievementType
{

    public $icon = 'test.svg';

    public function description()
    {
        return 'nice description';
    }

    public function qualifier($user)
    {
        return $user->getExperience()->points >= 1000;
    }


}