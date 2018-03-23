<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class School extends Model
{

    use LogsActivity;

    protected $fillable=['name','description','location','description','country'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "School " . $this->id . " has been {$eventName}";
    }

    protected static $logFillable = true;

    public function path()
    {
        return '/school/' . $this->id;
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
