<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class InfluencerLegendary2022 extends AchievementType
{
    public $icon = 'influencer/influencer_legendary_small.png';
    public $edition = 2022;
    public $name = 'Legendary Influencer 2022';

    public function description()
    {
        return 'Spread your influence more to get 60 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 60;
    }


}
