<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Importer extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function event()
    {
        return $this->hasOne('App\Event', 'id', 'event_id');
    }


}
