<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class OrganiserActive2023 extends AchievementType
{
    public $icon = 'organiser/organiser_active_2023.png';
    public $edition = 2023;
    public $name = 'Active Organiser 2023';

    public function description()
    {
        return 'Report 5 activities to unlock';
    }

    public function qualifier($user)
    {
        return $user->reported($this->edition) >= 5;
    }


}