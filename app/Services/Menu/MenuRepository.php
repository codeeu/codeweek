<?php

namespace App\Services\Menu;

use App\Models\MenuSection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class MenuRepository
{
    /**
     * @return Collection<int, MenuSection>
     */
    public function sectionsForLocation(string $location): Collection
    {
        if (! Schema::hasTable('menu_sections') || ! Schema::hasTable('menu_items')) {
            return collect();
        }

        return Cache::remember(
            "menus.location.{$location}.v1",
            now()->addHour(),
            function () use ($location) {
                return MenuSection::query()
                    ->where('location', $location)
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->with([
                        'items' => function ($query) {
                            $query
                                ->where('is_active', true)
                                ->orderBy('sort_order');
                        },
                    ])
                    ->get();
            }
        );
    }
}

