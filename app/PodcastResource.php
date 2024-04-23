<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodcastResource extends Model
{
    use HasFactory;

    public function podcast()
    {
        return $this->belongsTo(\App\Podcast::class);
    }
}
