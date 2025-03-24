<?php

/**
 * @Author: Bernard Hanna
 * @Date:   2025-03-21 18:42:08
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2025-03-22 13:07:31
 */


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\School
 * ...
 */
class School extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'description', 'location', 'description', 'country'];

    protected static $logFillable = true;

    // ✅ Required method for LogsActivity
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->useLogName('school');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return 'School ' . $this->id . " has been {$eventName}";
    }

    public function path()
    {
        return '/school/' . $this->id;
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(\App\User::class);
    }
}
