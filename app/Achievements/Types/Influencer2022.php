<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class Influencer2022 extends AchievementType
{
    public $icon = 'influencer/Influencer_normal_small.png';
    public $edition = 2022;
    public $name = 'Influencer 2022';

    public function description()
    {
        return 'Spread your influence more to get 10 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 10;
    }


}
