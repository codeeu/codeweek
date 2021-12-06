<?php

namespace App\Achievements\Types;

class OrganiserExpert2021 extends AchievementType
{
    public $icon = 'organiser/organiser_expert_small.png';
    public $name = 'Expert Organiser 2021';

    public function description()
    {
        return 'Expert Organiser 2021';
    }

    public function qualifier($user)
    {
        return $user->reported(2021) >= 10;
    }


}