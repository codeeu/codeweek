<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model {
    use HasFactory;

    public function scopeActive($query) {
        return $query->where('active', true);
    }
}
