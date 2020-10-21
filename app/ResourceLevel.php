<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ResourceLevel
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
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel whereLearn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel whereTeach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLevel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResourceLevel extends Model
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
