<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Notification
 *
 * @property int $id
 * @property int $event_id
 * @property string|null $sent_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Event $event
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Notification extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event', 'id', 'event_id');
    }
}
