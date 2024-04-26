<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Importer
 *
 * @property int $id
 * @property string $original_id
 * @property int $event_id
 * @property string|null $original_updated_at
 * @property string $seen_at
 * @property string $status
 * @property string $website
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Event|null $event
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Importer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Importer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Importer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Importer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereOriginalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereOriginalUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereSeenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Importer whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|Importer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Importer withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Importer extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    public function event(): HasOne
    {
        return $this->hasOne(\App\Event::class, 'id', 'event_id');
    }
}
