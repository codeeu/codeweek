<?php

namespace App\Achievements\Types;

class InfluencerChampion2024 extends AchievementType
{
    public $icon = 'influencer/influencer_champion_2024.png';

    public $edition = 2024;

    public $name = 'Champion Influencer 2024';

    public function description()
    {
        return 'Spread your influence more to get 40 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 40;
    }
}
