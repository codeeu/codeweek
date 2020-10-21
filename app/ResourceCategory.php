<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ResourceCategory
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
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory whereLearn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory whereTeach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResourceCategory extends Model
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
