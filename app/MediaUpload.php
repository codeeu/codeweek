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

    /**
     * New Nova uploads go to the main S3 disk. The resources bucket
     * currently denies PutObject for the shared IAM user.
     */
    protected $attributes = [
        'disk' => 's3',
    ];

    public function getResolvedUrlAttribute(): ?string
    {
        if (empty($this->file_path)) {
            return null;
        }

        return Storage::disk($this->disk ?: 's3')->url($this->file_path);
    }
}
