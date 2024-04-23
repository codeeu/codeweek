<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Audience
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Audience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Audience extends Model
{
    //
}
