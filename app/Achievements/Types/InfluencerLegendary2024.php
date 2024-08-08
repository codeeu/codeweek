<?php

namespace App\Achievements\Types;

class InfluencerLegendary2024 extends AchievementType
{
    public $icon = 'influencer/influencer_legendary_2024.png';

    public $edition = 2024;

    public $name = 'Legendary Influencer 2024';

    public function description()
    {
        return 'Spread your influence more to get 60 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 60;
    }
}
