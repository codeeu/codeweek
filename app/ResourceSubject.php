<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\ResourceSubject
 *
 * @property int $id
 * @property string $name
 * @property int $position
 * @property int $active
 * @property int $teach
 * @property int $learn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ResourceItem[] $items
 * @property-read int|null $items_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject whereLearn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject whereTeach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceSubject whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ResourceSubject extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'active' => true,
        'learn' => true,
        'teach' => false,
    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(\App\ResourceItem::class);
    }
}
