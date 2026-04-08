<?php

namespace App\Achievements\Types;

class InfluencerExpert2026 extends AchievementType
{
    public $icon = 'influencer/influencer_expert_2026.png';

    public $edition = 2026;

    public $name = 'Expert Influencer 2026';

    public function description()
    {
        return 'Spread your influence more to get 30 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 30;
    }
}

