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
        'open_primary_new_tab',
        'url2',
        'button2_text',
        'open_second_new_tab',
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
        'open_primary_new_tab' => 'boolean',
        'open_second_new_tab' => 'boolean',
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
     * Full URL for image. Use asset() for paths so images in public/ resolve correctly.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }
        $value = trim($this->image);
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }
        return asset(ltrim($value, '/'));
    }
}
