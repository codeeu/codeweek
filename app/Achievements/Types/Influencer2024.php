<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class Influencer2024 extends AchievementType
{
    public $icon = 'influencer/influencer_normal_2024.png';
    public $edition = 2024;
    public $name = 'Influencer 2024';

    public function description()
    {
        return 'Spread your influence more to get 10 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 10;
    }


}
