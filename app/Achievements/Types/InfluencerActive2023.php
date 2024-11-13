<?php

namespace App\Achievements\Types;

class InfluencerActive2023 extends AchievementType
{
    public $icon = 'influencer/influencer_active_2023.png';

    public $edition = 2023;

    public $name = 'Active Influencer 2023';

    public function description()
    {
        return 'Spread your influence more to get 20 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 20;
    }
}
