<?php

namespace App\Achievements\Types;

class InfluencerActive2024 extends AchievementType
{
    public $icon = 'influencer/influencer_active_2024.png';

    public $edition = 2024;

    public $name = 'Active Influencer 2024';

    public function description()
    {
        return 'Spread your influence more to get 20 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 20;
    }
}
