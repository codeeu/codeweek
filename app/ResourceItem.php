<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceItem extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'active' => true,
        'learn' => true,
        'teach' => false,
    ];

    public function levels()
    {
        return $this->belongsToMany('App\ResourceLevel');
    }
}
