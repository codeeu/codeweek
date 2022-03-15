<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodcastGuest extends Model
{
    use HasFactory;

    protected $table = 'podcast_guests';

    public function podcast(){
        return $this->belongsTo('App\Podcast');
    }
}
