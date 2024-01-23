<?php

namespace App\Achievements\Types;

use Illuminate\Support\Facades\Log;

class InfluencerExpert2024 extends AchievementType
{
    public $icon = 'influencer/influencer_expert_2024.png';
    public $edition = 2024;
    public $name = 'Expert Influencer 2024';

    public function description()
    {
        return 'Spread your influence more to get 30 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 30;
    }


}
