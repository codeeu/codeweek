<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Participation
 *
 * @property int $id
 * @property int $user_id
 * @property string $names
 * @property string $event_name
 * @property string $event_date
 * @property int $active
 * @property string|null $participation_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Participation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereEventDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereEventName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereParticipationUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Participation extends Model
{
    protected $fillable = ['user_id', 'event_name', 'event_date', 'names', 'participation_url', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\User::class);
    }
}
