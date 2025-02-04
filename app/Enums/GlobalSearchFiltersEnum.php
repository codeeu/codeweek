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
    // case ACTIVITIES = 'Activities';
    case BLOGS = 'Blogs';
    case OTHERS = 'Others';

    /**
     * Get additional information for each filter.
     */
    public function meta(): array
    {
        return match ($this) {
            self::ALL => [
                'type_search' => 'all',
                'model' => null,
                'search_fields' => [
                    'name',
                    'description',
                ],
            ],
            self::PODCASTS => [
                'type_search' => 'model',
                'model' => Podcast::class,
                'search_fields' => [
                    'name',
                    'description',
                ],
            ],
            self::HACKATHONS,
            self::ONLINE_COURSES,
            self::TRAINING,
            self::CHALLENGES,
            self::PRESENTATIONS_AND_TOOLKITS,
            self::OTHERS => [
                'type_search' => 'model',
                'model' => StaticPage::class,
                'search_fields' => [
                    'name',
                    'description',
                ],
            ],
            self::LEARN => [
                'type_search' => 'model',
                'model' => ResourceItem::class,
                'search_fields' => [
                    'name',
                    'description',
                ],
            ],
            self::TEACH => [
                'type_search' => 'model',
                'model' => ResourceItem::class,
                'search_fields' => [
                    'name',
                    'description',
                ],
            ],
            self::BLOGS => [
                'type_search' => 'model',
                'model' => Blog::class,
                'search_fields' => [
                    'name',
                    'description',
                ],
            ],
            // self::ACTIVITIES => [
            //     'type_search' => 'model',
            //     'model' => Event::class,
            //     'search_fields' => [
            //         'name',
            //         'description',
            //     ],
            // ],
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
