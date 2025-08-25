<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\ResourceLanguage
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $position
 * @property int $active
 * @property int $teach
 * @property int $learn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ResourceItem[] $items
 * @property-read int|null $items_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage whereLearn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage whereTeach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLanguage whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ResourceLanguage extends Model
{
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
