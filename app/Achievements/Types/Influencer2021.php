<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class Influencer2021 extends AchievementType
{
    public $icon = 'influencer/Influencer_normal_small.png';
    public $edition = 2021;
    public $name = 'Influencer 2021';


    public function description()
    {
        return 'Spread your influence more to get 10 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 10;
    }


}
