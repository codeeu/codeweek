<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Enums\GlobalSearchFiltersEnum;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GlobalSearchService
{
    /**
     * Perform search based on filter string.
     *
     * @param string $filterKey
     * @param string|null $query
     * 
     * @return LengthAwarePaginator
     */
    public function search(string $filterKey, ?string $query = null): LengthAwarePaginator
    {
        $filter = GlobalSearchFiltersEnum::tryFrom($filterKey);

        if (!$filter) {
            Log::warning("Invalid filter key: $filterKey");
            return [];
        }

        $key = $filter;
        $keyword = $query;
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        if ($key === GlobalSearchFiltersEnum::ALL) {
            $staticPages = DB::table('static_pages')
                ->selectRaw("
                    'StaticPage' AS model,
                    id,
                    name, 
                    category, 
                    description, 
                    thumbnail,  
                    path, 
                    link_type, 
                    language, 
                    created_at,
                    unique_identifier,
                    NULL as image
                ")
                ->when($keyword, function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%")
                            ->orWhere('description', 'like', "%{$keyword}%")
                            ->orWhere('keywords', 'like', "%{$keyword}%");
                    });
                });

            $podcasts = DB::table('podcasts')
                ->selectRaw("
                    'Podcast' AS model,
                    id,
                    title AS name, 
                    'Podcast' AS category, 
                    description, 
                    image AS thumbnail, 
                    id AS path, 
                    'internal' AS link_type, 
                    'en' AS language,
                    created_at,
                    '' AS unique_identifier, 
                    image
                ")
                ->where('active', 1)
                ->when($keyword, function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('title', 'like', "%{$keyword}%")
                            ->orWhere('description', 'like', "%{$keyword}%");
                    });
                });

            $blogs = DB::table('blogs')
                ->selectRaw("
                    'Blog' AS model,
                    id,
                    name, 
                    'Blog' AS category, 
                    description, 
                    thumbnail, 
                    path, 
                    'external' AS link_type, 
                    'en' AS language, 
                    date AS created_at,
                    '' AS unique_identifier, 
                    NULL as image
                ")
                ->when($keyword, function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%")
                            ->orWhere('description', 'like', "%{$keyword}%");
                    });
                });

            $events = DB::table('events')
                ->selectRaw("
                    'Event' AS model,
                    id,
                    title AS name, 
                    'Activities' AS category, 
                    description, 
                    picture AS thumbnail, 
                    CASE
                        WHEN COALESCE(slug,'') <> '' 
                            THEN CONCAT('/view/', id, '/', slug)
                        WHEN COALESCE(event_url,'') <> '' 
                            THEN CASE 
                                    WHEN LEFT(event_url, 4) = 'http' THEN event_url 
                                    ELSE CONCAT('http://', event_url) 
                                END
                        ELSE '/events'
                    END AS path,
                    CASE
                        WHEN COALESCE(slug,'') <> '' THEN 'internal'
                        WHEN COALESCE(event_url,'') <> '' THEN 'external'
                        ELSE 'internal'
                    END AS link_type,
                    'en' AS language, 
                    created_at,
                    '' AS unique_identifier, 
                    NULL as image
                ")
                ->where('status', 'APPROVED')
                ->whereRaw("YEAR(end_date) IN (YEAR(CURDATE()), YEAR(CURDATE()) - 1)")
                ->when($keyword, function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('title', 'like', "%{$keyword}%")
                            ->orWhere('description', 'like', "%{$keyword}%");
                    });
                });

            $resourceLearn = DB::table('resource_items')
                ->selectRaw("
                    'ResourceItem' AS model,
                    id,
                    name, 
                    'Learn' AS category, 
                    description, 
                    thumbnail, 
                    source AS path, 
                    'external' AS link_type, 
                    'en' AS language, 
                    created_at,
                    '' AS unique_identifier, 
                    NULL as image
                ")
                ->where('active', 1)
                ->when($keyword, function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%")
                            ->orWhere('description', 'like', "%{$keyword}%");
                    });
                });

            $resourceTeach = DB::table('resource_items')
                ->selectRaw("
                    'ResourceItem' AS model,
                    id,
                    name, 
                    'Teach' AS category, 
                    description, 
                    thumbnail, 
                    source AS path, 
                    'external' AS link_type, 
                    'en' AS language, 
                    created_at,
                    '' AS unique_identifier, 
                    NULL as image
                ")
                ->where('active', 1)
                ->when($keyword, function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%")
                            ->orWhere('description', 'like', "%{$keyword}%");
                    });
                });

            $unionQuery = $staticPages
                ->unionAll($podcasts)
                ->unionAll($blogs)
                ->unionAll($events)
                ->unionAll($resourceLearn)
                ->unionAll($resourceTeach);
        } else {
            switch ($key) {
                case GlobalSearchFiltersEnum::PODCASTS:
                    $unionQuery = DB::table('podcasts')
                        ->selectRaw("
                            'Podcast' AS model,
                            id,
                            title AS name, 
                            'Podcast' AS category, 
                            description, 
                            image AS thumbnail, 
                            id AS path, 
                            'internal' AS link_type, 
                            'en' AS language,
                            created_at,
                            '' AS unique_identifier, 
                            image
                        ")
                        ->where('active', 1)
                        ->when($keyword, function ($query, $keyword) {
                            $query->where(function ($q) use ($keyword) {
                                $q->where('title', 'like', "%{$keyword}%")
                                    ->orWhere('description', 'like', "%{$keyword}%");
                            });
                        });

                    if ($keyword) {
                        $staticPodcast = DB::table('static_pages')
                            ->selectRaw("
                                'StaticPage' AS model,
                                id,
                                name, 
                                category, 
                                description, 
                                thumbnail,  
                                path, 
                                link_type, 
                                language, 
                                created_at,
                                unique_identifier,
                                NULL as image
                            ")
                            ->where('unique_identifier', 'podcasts')
                            ->where(function ($q) use ($keyword) {
                                $q->where('name', 'like', "%{$keyword}%")
                                    ->orWhere('description', 'like', "%{$keyword}%");
                            });
                    } else {
                        $staticPodcast = DB::table('static_pages')
                            ->selectRaw("
                                'StaticPage' AS model,
                                id,
                                name, 
                                category, 
                                description, 
                                thumbnail,  
                                path, 
                                link_type, 
                                language, 
                                created_at,
                                unique_identifier,
                                NULL as image
                            ")
                            ->where('unique_identifier', 'podcasts');
                    }
                    $unionQuery = $unionQuery->unionAll($staticPodcast);
                    break;
                case GlobalSearchFiltersEnum::BLOGS:
                    $unionQuery = DB::table('blogs')
                        ->selectRaw("
                            'Blog' AS model,
                            id,
                            name, 
                            'Blog' AS category, 
                            description, 
                            thumbnail, 
                            path, 
                            'external' AS link_type, 
                            'en' AS language, 
                            date AS created_at,
                            '' AS unique_identifier, 
                            NULL as image
                        ")
                        ->when($keyword, function ($query, $keyword) {
                            $query->where(function ($q) use ($keyword) {
                                $q->where('name', 'like', "%{$keyword}%")
                                    ->orWhere('description', 'like', "%{$keyword}%");
                            });
                        });
                    break;
                case GlobalSearchFiltersEnum::ACTIVITIES:
                    $unionQuery = DB::table('events')
                        ->selectRaw("
                            'Event' AS model,
                            id,
                            title AS name, 
                            'Activities' AS category, 
                            description, 
                            picture AS thumbnail, 
                            CASE
                                WHEN COALESCE(slug,'') <> '' 
                                    THEN CONCAT('/view/', id, '/', slug)
                                WHEN COALESCE(event_url,'') <> '' 
                                    THEN CASE 
                                            WHEN LEFT(event_url, 4) = 'http' THEN event_url 
                                            ELSE CONCAT('http://', event_url) 
                                        END
                                ELSE '/events'
                            END AS path,
                            CASE
                                WHEN COALESCE(slug,'') <> '' THEN 'internal'
                                WHEN COALESCE(event_url,'') <> '' THEN 'external'
                                ELSE 'internal'
                            END AS link_type,
                            'en' AS language, 
                            created_at,
                            '' AS unique_identifier, 
                            NULL as image
                        ")
                        ->where('status', 'APPROVED')
                        ->whereRaw("YEAR(end_date) IN (YEAR(CURDATE()), YEAR(CURDATE()) - 1)")
                        ->when($keyword, function ($query, $keyword) {
                            $query->where(function ($q) use ($keyword) {
                                $q->where('title', 'like', "%{$keyword}%")
                                    ->orWhere('description', 'like', "%{$keyword}%");
                            });
                        });
                    break;
                case GlobalSearchFiltersEnum::LEARN:
                    $unionQuery = DB::table('resource_items')
                        ->selectRaw("
                            'ResourceItem' AS model,
                            id,
                            name, 
                            'Learn' AS category, 
                            description, 
                            thumbnail, 
                            source AS path, 
                            'external' AS link_type, 
                            'en' AS language, 
                            created_at,
                            '' AS unique_identifier, 
                            NULL as image
                        ")
                        ->where('active', 1)
                        ->where('learn', true)
                        ->when($keyword, function ($query, $keyword) {
                            $query->where(function ($q) use ($keyword) {
                                $q->where('name', 'like', "%{$keyword}%")
                                    ->orWhere('description', 'like', "%{$keyword}%");
                            });
                        });
                    break;
                case GlobalSearchFiltersEnum::TEACH:
                    $unionQuery = DB::table('resource_items')
                        ->selectRaw("
                            'ResourceItem' AS model,
                            id,
                            name, 
                            'Teach' AS category, 
                            description, 
                            thumbnail, 
                            source AS path, 
                            'external' AS link_type, 
                            'en' AS language, 
                            created_at,
                            '' AS unique_identifier, 
                            NULL as image
                        ")
                        ->where('active', 1)
                        ->where('teach', true)
                        ->when($keyword, function ($query, $keyword) {
                            $query->where(function ($q) use ($keyword) {
                                $q->where('name', 'like', "%{$keyword}%")
                                    ->orWhere('description', 'like', "%{$keyword}%");
                            });
                        });
                    break;
                default:
                    $unionQuery = DB::table('static_pages')
                        ->selectRaw("
                            'StaticPage' AS model,
                            id,
                            name, 
                            category, 
                            description, 
                            thumbnail,  
                            path, 
                            link_type, 
                            language, 
                            created_at,
                            unique_identifier,
                            NULL as image
                        ")
                        ->when($keyword, function ($query, $keyword) {
                            $query->where(function ($q) use ($keyword) {
                                $q->where('name', 'like', "%{$keyword}%")
                                    ->orWhere('description', 'like', "%{$keyword}%")
                                    ->orWhere('keywords', 'like', "%{$keyword}%");
                            });
                        });
                    if ($key == GlobalSearchFiltersEnum::OTHERS) {
                        $unionQuery = $unionQuery->whereIn('category', ['General', 'Others']);
                    } else {
                        $unionQuery = $unionQuery->where('unique_identifier', str_slug($filterKey))
                            ->orWhere('category', $filterKey);
                    }
                    break;
            }
        }

        $finalQuery = DB::table(DB::raw("({$unionQuery->toSql()}) as combined"))
            ->mergeBindings($unionQuery)
            ->orderBy('created_at', 'desc');

        $total = $finalQuery->count();
        $results = $finalQuery->limit($perPage)
            ->offset(($currentPage - 1) * $perPage)
            ->get();

        $results = collect($results)->map(function ($item) {
            /** @var \stdClass $item */
            switch ($item->model) {
                case 'Podcast':
                    $item->path = route('podcast', ['podcast' => $item->id]);
                    $item->thumbnail = 'https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/art/' . $item->thumbnail;
                    break;
                case 'Event':
                    if ($item->thumbnail) {
                        if (!Str::startsWith($item->thumbnail, 'http')) {
                            $item->thumbnail = config('codeweek.aws_url') . $item->thumbnail;
                        }
                    } else {
                        $item->thumbnail = 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/event_default_picture.png';
                    }
                    break;
                case 'ResourceItem':
                    if (strncmp($item->thumbnail, 'http', 4) !== 0) {
                        $item->thumbnail = config('codeweek.resources_url') . $item->thumbnail;
                    }
                    break;
                default:
                    break;
            }

            $item->description = $this->formatString($item->description);
            $item->created_at = (new Carbon($item->created_at))->format('Y-m-d');

            return $item;
        });

        return new LengthAwarePaginator(
            $results,
            $total,
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    private function formatString(string $str, $limit = 400)
    {
        return mb_substr(strip_tags($str), 0, $limit);
    }
}
