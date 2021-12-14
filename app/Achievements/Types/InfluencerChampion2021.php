<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class InfluencerChampion2021 extends AchievementType
{
    public $icon = 'influencer/influencer_champion_small.png';
    public $name = 'Champion Influencer 2021';

    public function description()
    {
        return 'Spread your influence more to get 400 bits';
    }

    public function qualifier($user)
    {
        return $user->influence(2021) >= 200;
    }


}