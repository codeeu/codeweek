<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class InfluencerActive2022 extends AchievementType
{
    public $icon = 'influencer/influencer_active_small.png';
    public $edition = 2022;
    public $name = 'Active Influencer 2022';

    public function description()
    {
        return 'Spread your influence more to get 20 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 20;
    }


}
