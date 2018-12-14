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

    public function types()
    {
        return $this->belongsToMany('App\ResourceType');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\ResourceSubject');
    }

    public function categories()
    {
        return $this->belongsToMany('App\ResourceCategory');
    }

    public function programmingLanguages()
    {
        return $this->belongsToMany('App\ResourceProgrammingLanguage','res_pl_pivot');
    }

    public function languages()
    {
        return $this->belongsToMany('App\ResourceLanguage');
    }
}
