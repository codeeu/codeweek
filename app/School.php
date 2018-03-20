<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable=['name','description','location','description','country'];


    public function path()
    {
        return '/school/' . $this->id;
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
