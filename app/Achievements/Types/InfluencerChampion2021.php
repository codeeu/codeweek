<?php

namespace App\Achievements\Types;

class InfluencerChampion2021 extends AchievementType
{
    public $icon = 'influencer/influencer_champion_small.png';

    public $edition = 2021;

    public $name = 'Champion Influencer 2021';

    public function description()
    {
        return 'Spread your influence more to get 40 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 40;
    }
}
