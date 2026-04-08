<?php

namespace App\Achievements\Types;

class InfluencerChampion2026 extends AchievementType
{
    public $icon = 'influencer/influencer_champion_2026.png';

    public $edition = 2026;

    public $name = 'Champion Influencer 2026';

    public function description()
    {
        return 'Spread your influence more to get 40 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 40;
    }
}

