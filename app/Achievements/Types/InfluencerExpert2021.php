<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class InfluencerExpert2021 extends AchievementType
{
    public $icon = 'influencer/influencer_expert_small.png';
    public $name = 'Expert Influencer 2021';

    public function description()
    {
        return 'Spread your influence more to get 30 bits';
    }

    public function qualifier($user)
    {
        return $user->influence(2021) >= 30;
    }


}
