<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'categories',
        'tags',
        'description',
        'content',
        'thumbnail',
        'path',
        'date',
        'modified',
        'status',
        'type',
        'slug'
    ];
}
