<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model {
    //
    protected $guarded = [];

    protected $casts = [
        'release_date' => 'datetime'
    ];

    public function scopeActive($query) {
        return $query->where('active', true);
    }
}
