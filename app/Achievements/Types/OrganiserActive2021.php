<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class OrganiserActive2021 extends AchievementType
{
    public $icon = 'organiser/organiser_active_small.png';
    public $edition = 2021;
    public $name = 'Active Organiser 2021';

    public function description()
    {
        return 'Report 5 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 5;
    }


}