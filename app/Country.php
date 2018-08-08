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

        $isos = DB::table('events')
            ->select(['country_iso'])
            ->where('status',"=","APPROVED")
            ->groupBy('country_iso')
            ->get()
            ->pluck('country_iso')
        ;



        $countries = Country::findMany($isos)->sortBy('name');


        return $countries;

    }


    public function events()
    {

        return $this->hasMany('App\Event');

    }

}
