<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DreamJobRoleModel extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'slug',
        'role',
        'image',
        'country',
        'description1',
        'description2',
        'link',
        'video',
        'pathway_map_link',
        'pathway_title',
        'pathway_cta_text',
        'position',
        'active',
    ];

    protected $casts = [
        'position' => 'integer',
        'active' => 'boolean',
    ];
}
