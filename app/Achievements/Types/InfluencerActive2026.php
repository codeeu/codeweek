<?php

namespace App\Achievements\Types;

class InfluencerActive2026 extends AchievementType
{
    public $icon = 'influencer/influencer_active_2026.png';

    public $edition = 2026;

    public $name = 'Active Influencer 2026';

    public function description()
    {
        return 'Spread your influence more to get 20 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 20;
    }
}

