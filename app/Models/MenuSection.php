<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class MenuSection extends Model implements Sortable
{
    use SortableTrait;

    protected $table = 'menu_sections';

    protected $fillable = [
        'location',
        'column',
        'title',
        'title_key',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'sort_order' => 'int',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'menu_section_id');
    }

    protected static function booted(): void
    {
        static::saved(function (self $section) {
            Cache::forget("menus.location.{$section->location}.v1");
        });

        static::deleted(function (self $section) {
            Cache::forget("menus.location.{$section->location}.v1");
        });
    }
}

