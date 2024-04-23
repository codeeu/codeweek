<?php

namespace App\Achievements;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Achievement extends Model
{
    protected $guarded = [];

    public function awardTo(User $user)
    {
        $this->users()->attach($user);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_achievements');
    }

    public function levelAsNumber()
    {
        return [
            'beginner' => 1,
            'intermediate' => 2,
            'advanced' => 3,
        ][$this->level];
    }

    //    public function newCollection(array $models = [])
    //    {
    //        return new Achievements($models);
    //    }

}
