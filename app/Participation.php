<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $fillable=['user_id','event_name','event_date','names','participation_url'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
