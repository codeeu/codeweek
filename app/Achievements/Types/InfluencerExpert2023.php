<?php

namespace App\Achievements\Types;

class InfluencerExpert2023 extends AchievementType
{
    public $icon = 'influencer/influencer_expert_2023.png';

    public $edition = 2023;

    public $name = 'Expert Influencer 2023';

    public function description()
    {
        return 'Spread your influence more to get 30 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 30;
    }
}
