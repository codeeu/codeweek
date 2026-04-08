<?php

namespace App\Achievements\Types;

class InfluencerLegendary2026 extends AchievementType
{
    public $icon = 'influencer/influencer_legendary_2026.png';

    public $edition = 2026;

    public $name = 'Legendary Influencer 2026';

    public function description()
    {
        return 'Spread your influence more to get 60 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 60;
    }
}

