<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries_plus_country';
    protected $primaryKey = 'ISO';
    public $incrementing = false;

    public $guarded=[];
}
