<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excellence extends Model
{


    protected $fillable=['edition','name_for_certificate','certificate_url'];

    public static function byYear($year){
        return Excellence::with('user')->where(
            [
                ["edition", "=", $year],
                ["notified_at" , "=", null]
            ]
            )->get();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
