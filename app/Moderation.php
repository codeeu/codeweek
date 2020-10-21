<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Moderation
 *
 * @property int $id
 * @property string|null $message
 * @property string $status
 * @property int $status_by
 * @property int $event_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation whereStatusBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Moderation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Moderation extends Model
{
    protected $guarded = [];
}
