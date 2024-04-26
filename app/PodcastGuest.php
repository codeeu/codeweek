<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PodcastGuest extends Model
{
    use HasFactory;

    protected $table = 'podcast_guests';

    public function podcast(): BelongsTo
    {
        return $this->belongsTo(\App\Podcast::class);
    }
}
