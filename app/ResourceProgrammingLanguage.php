<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceProgrammingLanguage extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'active' => true,
        'learn' => true,
        'teach' => true,
    ];

    public function items()
    {
        return $this->belongsToMany('App\ResourceItem','res_pl_pivot');
    }
}
