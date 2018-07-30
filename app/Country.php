<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'iso';
    public $incrementing = false;

    public $guarded = [];


    public static function withEvents()
    {

        $countries = Country::has('events')->orderBy('iso')->get()->unique();

        return $countries;

    }


    public function events()
    {

        return $this->hasMany('App\Event');

    }

}
