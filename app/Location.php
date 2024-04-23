<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getGeopositionAttribute()
    {
        return $this->latitude.','.$this->longitude;
    }
}
