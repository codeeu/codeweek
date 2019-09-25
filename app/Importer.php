<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Importer extends Model
{
    protected $guarded = [];


    public function event()
    {
        return $this->hasOne('App\Event', 'id', 'event_id');
    }


}
