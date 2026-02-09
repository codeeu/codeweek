<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'button_text',
        'url2',
        'button2_text',
        'image',
        'position',
        'active',
        'show_countdown',
        'countdown_target',
    ];

    protected $casts = [
        'active' => 'boolean',
        'show_countdown' => 'boolean',
        'countdown_target' => 'datetime',
        'position' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('position')->orderBy('id');
    }

    /**
     * Full URL for image (prefix with base URL if stored as path).
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        return url(ltrim($this->image, '/'));
    }
}
