<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'logo_url',
        'categories',
        'description',
        'link_url',
        'main_img_url',
        'position',
        'active',
    ];

    protected $casts = [
        'categories' => 'array',
        'active' => 'boolean',
        'position' => 'integer',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('position')->orderBy('id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Convert to the same stdClass shape used by the Livewire component (id, name, logo_url, categories, description, link_url, main_img_url).
     */
    public function toPartnerObject(): \stdClass
    {
        $o = new \stdClass;
        $o->id = $this->id;
        $o->name = $this->name;
        $o->logo_url = $this->logo_url;
        $o->categories = $this->categories ?? [];
        $o->description = $this->description;
        $o->link_url = $this->link_url;
        $o->main_img_url = $this->main_img_url;
        return $o;
    }
}
