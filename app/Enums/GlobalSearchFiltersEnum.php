<?php

namespace App\Enums;

use App\Blog;
use App\Event;
use App\StaticPage;
use App\Podcast;
use App\ResourceItem;

enum GlobalSearchFiltersEnum: string
{
    case ALL = 'All';
    case PODCASTS = 'Podcasts';
    case HACKATHONS = 'Hackathons';
    case ONLINE_COURSES = 'Online Courses';
    case TRAINING = 'Training';
    case CHALLENGES = 'Challenges';
    case LEARN = 'Learn';
    case TEACH = 'Teach';
    case PRESENTATIONS_AND_TOOLKITS = 'Presentations and Toolkits';
    case ACTIVITIES = 'Activities';
    case BLOGS = 'Blogs';
    case OTHERS = 'Others';

    public function label(): string
    {
        // Dynamically retrieve the translated label based on the current language
        return match ($this) {
            self::ALL => __('search.search_categories.all'),
            self::PODCASTS => __('search.search_categories.podcasts'),
            self::HACKATHONS => __('search.search_categories.hackathons'),
            self::ONLINE_COURSES => __('search.search_categories.online_courses'),
            self::TRAINING => __('search.search_categories.training'),
            self::CHALLENGES => __('search.search_categories.challenges'),
            self::LEARN => __('search.search_categories.learn'),
            self::TEACH => __('search.search_categories.teach'),
            self::PRESENTATIONS_AND_TOOLKITS => __('search.search_categories.presentations_and_toolkits'),
            self::ACTIVITIES => __('search.search_categories.activities'),
            self::BLOGS => __('search.search_categories.blogs'),
            self::OTHERS => __('search.search_categories.others'),
        };
    }

    /**
     * Get additional information for each filter.
     */
    public function meta(): array
    {
        return match ($this) {
            self::ALL => [
                'model' => null,
            ],
            self::PODCASTS => [
                'model' => Podcast::class,
                'map_fields' => [
                    'name' => '{title}',
                    'category' => 'Podcast',
                    'description' => '{description}',
                    'thumbnail' => '{url_image}',
                    'path' => '{url}',
                    'link_type' => 'internal',
                    'language' => 'en',
                ]
            ],
            self::HACKATHONS,
            self::ONLINE_COURSES,
            self::TRAINING,
            self::CHALLENGES,
            self::PRESENTATIONS_AND_TOOLKITS,
            self::OTHERS => [
                'model' => StaticPage::class,
                'map_fields' => [
                    'name' => '{name}',
                    'category' => '{category}',
                    'description' => '{description}',
                    'thumbnail' => '{thumbnail}',
                    'path' => '{path}',
                    'link_type' => '{link_type}',
                    'language' => '{language}',
                ]
            ],
            self::LEARN => [
                'model' => ResourceItem::class,
                'map_fields' => [
                    'name' => '{name}',
                    'category' => 'Learn',
                    'description' => '{description}',
                    'thumbnail' => '{thumbnail}',
                    'path' => '{source}',
                    'link_type' => 'external',
                    'language' => 'en',
                ]
            ],
            self::TEACH => [
                'model' => ResourceItem::class,
                'map_fields' => [
                    'name' => '{name}',
                    'category' => 'Teach',
                    'description' => '{description}',
                    'thumbnail' => '{thumbnail}',
                    'path' => '{source}',
                    'link_type' => 'external',
                    'language' => 'en',
                ]
            ],
            self::BLOGS => [
                'model' => Blog::class,
                'map_fields' => [
                    'name' => '{name}',
                    'category' => 'Blog',
                    'description' => '{description}',
                    'thumbnail' => '{thumbnail}',
                    'path' => '{path}',
                    'link_type' => 'external',
                    'language' => 'en',
                ]
            ],
            self::ACTIVITIES => [
                'model' => Event::class,
                'map_fields' => [
                    'name' => '{title}',
                    'category' => 'Activities',
                    'description' => '{description}',
                    'thumbnail' => '{picture_path}',
                    'path' => '{url}',
                    'link_type' => 'internal',
                    'language' => 'en',
                ]
            ],
        };
    }

    /**
     * Get a list of all enum values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get a list of all filter keys.
     */
    public static function keys(): array
    {
        return array_map(fn($case) => $case->name, self::cases());
    }
}
