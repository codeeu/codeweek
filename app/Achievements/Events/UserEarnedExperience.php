<?php

namespace App\Achievements\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserEarnedExperience
{
    use Dispatchable, SerializesModels;

    public $user;

    public $points;

    public $totalPoints;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $points, $totalPoints)
    {
        $this->user = $user;
        $this->points = $points;
        $this->totalPoints = $totalPoints;
    }
}
