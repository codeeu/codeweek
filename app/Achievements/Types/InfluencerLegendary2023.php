<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class InfluencerLegendary2023 extends AchievementType
{
    public $icon = 'influencer/influencer_legendary_2023.png';
    public $edition = 2023;
    public $name = 'Legendary Influencer 2023';

    public function description()
    {
        return 'Spread your influence more to get 60 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 60;
    }


}
