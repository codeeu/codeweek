<?php

namespace App\Achievements\Types;

class InfluencerExpert2022 extends AchievementType
{
    public $icon = 'influencer/influencer_expert_small.png';

    public $edition = 2022;

    public $name = 'Expert Influencer 2022';

    public function description()
    {
        return 'Spread your influence more to get 30 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 30;
    }
}
