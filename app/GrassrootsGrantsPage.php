<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\URL;

class GrassrootsGrantsPage extends Model
{
    protected $table = 'grassroots_grants_page';

    protected $fillable = [
        'is_preview_mode',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'meta_title',
        'meta_description',
        'round_title',
        'overview_intro',
        'overview_activity_types',
        'overview_underserved',
    ];

    protected $casts = [
        'is_preview_mode' => 'boolean',
    ];

    public function hubs(): HasMany
    {
        return $this->hasMany(GrassrootsGrantsHub::class, 'page_id')->orderBy('position');
    }

    public function activeHubs(): HasMany
    {
        return $this->hubs()->where('active', true);
    }

    public static function config(): self
    {
        $page = self::first();
        if ($page) {
            return $page;
        }

        return self::create([
            'is_preview_mode' => true,
            'hero_title' => 'EU Code Week Grants for Grassroots',
            'hero_subtitle' => 'Round 1 project highlights from grassroots coding initiatives across Europe.',
            'hero_image' => '/images/contact-us.png',
            'meta_title' => 'Grassroots Grants – EU Code Week',
            'meta_description' => 'Discover EU Code Week Round 1 grassroots grant projects, impact, and funded initiatives across Europe.',
            'round_title' => 'Round 1 of Grants',
        ]);
    }

    public function previewSignedUrl(int $days = 14): string
    {
        return URL::temporarySignedRoute(
            'grassroots-grants.preview',
            now()->addDays($days),
        );
    }
}
