<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\ResourceProgrammingLanguage
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
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage whereLearn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage whereTeach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceProgrammingLanguage whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ResourceProgrammingLanguage extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'active' => true,
        'learn' => true,
        'teach' => true,
    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(\App\ResourceItem::class, 'res_pl_pivot');
    }
}
