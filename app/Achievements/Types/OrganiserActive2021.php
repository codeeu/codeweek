<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class OrganiserActive2021 extends AchievementType
{
    public $icon = 'organiser/organiser_active_small.png';
    public $name = 'Active Organiser 2021';

    public function description()
    {
        return 'Active Organiser 2021';
    }

    public function qualifier($user)
    {
        return $user->reported(2021) >= 5;
    }


}