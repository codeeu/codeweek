<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceLanguage extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'active' => true,
        'learn' => true,
        'teach' => false,
    ];

    public function items()
    {
        return $this->belongsToMany('App\ResourceItem');
    }
}
