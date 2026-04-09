<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class MenuItem extends Model implements Sortable
{
    use SortableTrait;

    protected $table = 'menu_items';

    protected $fillable = [
        'menu_section_id',
        'label',
        'label_key',
        'label_overrides',
        'url',
        'route_name',
        'route_params',
        'open_in_new_tab',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'label_overrides' => 'array',
        'route_params' => 'array',
        'open_in_new_tab' => 'bool',
        'is_active' => 'bool',
        'sort_order' => 'int',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
        'sort_on_has_many' => true,
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(MenuSection::class, 'menu_section_id');
    }

    public function resolvedLabel(?string $locale = null): string
    {
        $locale = $locale ?: app()->getLocale();

        $override = $this->label_overrides[$locale] ?? null;
        if (is_string($override) && trim($override) !== '') {
            return $override;
        }

        if (is_string($this->label_key) && $this->label_key !== '') {
            return __($this->label_key);
        }

        return (string) ($this->label ?? '');
    }

    public function resolvedHref(): ?string
    {
        if (is_string($this->route_name) && $this->route_name !== '') {
            $params = is_array($this->route_params) ? $this->route_params : [];

            if (Route::has($this->route_name)) {
                return route($this->route_name, $params);
            }
        }

        if (is_string($this->url) && $this->url !== '') {
            return $this->url;
        }

        return null;
    }

    protected static function booted(): void
    {
        static::saved(function (self $item) {
            $location = $item->section?->location;
            if ($location) {
                Cache::forget("menus.location.{$location}.v1");
            }
        });

        static::deleted(function (self $item) {
            $location = $item->section?->location;
            if ($location) {
                Cache::forget("menus.location.{$location}.v1");
            }
        });
    }
}

