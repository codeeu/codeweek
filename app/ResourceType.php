<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ResourceType
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
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereLearn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereTeach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResourceType extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'active' => true,
        'learn' => true,
        'teach' => false,
    ];

    public function items()
    {
        return $this->belongsToMany('App\ResourceItem');
    }
}
