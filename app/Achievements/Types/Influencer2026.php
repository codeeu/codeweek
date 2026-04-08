<?php

namespace App\Achievements\Types;

class Influencer2026 extends AchievementType
{
    public $icon = 'influencer/influencer_normal_2026.png';

    public $edition = 2026;

    public $name = 'Influencer 2026';

    public function description()
    {
        return 'Spread your influence more to get 10 bits';
    }

    public function qualifier($user)
    {
        return $user->influence($this->edition) >= 10;
    }
}

