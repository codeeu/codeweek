<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class Influencer2023 extends AchievementType
{
    public $icon = 'influencer/influencer_normal_2023.png';
    public $edition = 2023;
    public $name = 'Influencer 2023';

    public function description()
    {
        return 'Spread your influence more to get 10 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 10;
    }


}
