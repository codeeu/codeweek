<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MediaUpload extends Model
{
    protected $fillable = [
        'title',
        'file_path',
        'disk',
    ];

    public function getResolvedUrlAttribute(): ?string
    {
        if (empty($this->file_path)) {
            return null;
        }

        return Storage::disk($this->disk ?: 'resources')->url($this->file_path);
    }
}
