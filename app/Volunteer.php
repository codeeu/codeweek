<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Volunteer
 *
 * @property int $id
 * @property int $user_id
 * @property string $status
 * @property int|null $approved_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Volunteer extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
