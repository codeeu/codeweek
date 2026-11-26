<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\URL;

class GrassrootsGrantsPage extends Model
{
    public const SLUG_ROUND_1 = 'round-1';

    public const SLUG_ROUND_2 = 'round-2';

    protected $table = 'grassroots_grants_page';

    protected $fillable = [
        'slug',
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

    public function withoutExcludedEvidence(): self
    {
        $this->loadMissing([
            'activeHubs.activeProjects.links',
            'activeHubs.activeProjects.images',
        ]);

        $this->activeHubs->each(function (GrassrootsGrantsHub $hub): void {
            $hub->activeProjects->each(function (GrassrootsGrantsProject $project): void {
                $project->setRelation(
                    'images',
                    $project->images
                        ->reject(fn (GrassrootsGrantsProjectImage $image): bool => $image->isExcludedFromPublic())
                        ->values()
                );
            });
        });

        return $this;
    }

    public static function forSlug(string $slug): self
    {
        $page = self::query()->where('slug', $slug)->first();
        if ($page) {
            return $page;
        }

        if ($slug === self::SLUG_ROUND_1) {
            return self::create([
                'slug' => self::SLUG_ROUND_1,
                'is_preview_mode' => true,
                'hero_title' => 'EU Code Week Grants for Grassroots',
                'hero_subtitle' => 'Round 1 project highlights from grassroots coding initiatives across Europe.',
                'hero_image' => '/images/contact-us.png',
                'meta_title' => 'Grassroots Grants – Round 1 – EU Code Week',
                'meta_description' => 'Discover EU Code Week Round 1 grassroots grant projects, impact, and funded initiatives across Europe.',
                'round_title' => 'Round 1 of Grants',
            ]);
        }

        return self::create([
            'slug' => $slug,
            'is_preview_mode' => true,
            'hero_title' => 'EU Code Week Grants for Grassroots',
            'hero_subtitle' => 'Round 2 project highlights from grassroots coding initiatives across Europe.',
            'hero_image' => '/images/contact-us.png',
            'meta_title' => 'Grassroots Grants – Round 2 – EU Code Week',
            'meta_description' => 'Discover EU Code Week Round 2 grassroots grant projects, impact, and funded initiatives across Europe.',
            'round_title' => 'Round 2 of Grants',
        ]);
    }

    /**
     * @deprecated Use forSlug() — kept for callers that expect the Round 1 page.
     */
    public static function config(): self
    {
        return self::forSlug(self::SLUG_ROUND_1);
    }

    public function previewSignedUrl(int $days = 14): string
    {
        $route = $this->slug === self::SLUG_ROUND_2
            ? 'grassroots-grants.round-2.preview'
            : 'grassroots-grants.preview';

        return URL::temporarySignedRoute(
            $route,
            now()->addDays($days),
        );
    }

    public function publicRouteName(): string
    {
        return $this->slug === self::SLUG_ROUND_2
            ? 'grassroots-grants.round-2'
            : 'grassroots-grants';
    }
}
