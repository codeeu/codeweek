<?php

namespace App;

use App\Achievements\Events\UserEarnedExperience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    public function awardExperience($points)
    {
        $this->increment('points', $points);

        if (app()->runningInConsole() && ! app()->runningUnitTests()) {
            return $this;
        }

        UserEarnedExperience::dispatch($this->user, $points, $this->points);

        return $this;
    }

    public function stripExperience($points)
    {
        $this->points -= $points;
        if ($this->points < 0) {
            $this->points = 0;
        }
        $this->update(['points' => $this->points]);
        UserEarnedExperience::dispatch($this->user, $points, $this->points);

        return $this;
    }
}
