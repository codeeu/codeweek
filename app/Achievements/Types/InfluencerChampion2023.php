<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class InfluencerChampion2023 extends AchievementType
{
    public $icon = 'influencer/influencer_champion_2023.png';
    public $edition = 2023;
    public $name = 'Champion Influencer 2023';

    public function description()
    {
        return 'Spread your influence more to get 40 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 40;
    }


}
