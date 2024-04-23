<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\School
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $geoposition
 * @property string $location
 * @property string $country
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|School newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|School newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|School query()
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereGeoposition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class School extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'description', 'location', 'description', 'country'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return 'School '.$this->id." has been {$eventName}";
    }

    protected static $logFillable = true;

    public function path()
    {
        return '/school/'.$this->id;
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
