<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Enums\GlobalSearchFiltersEnum;
use Illuminate\Support\Facades\Http;

class GlobalSearchService
{
    /**
     * Perform search based on filter string.
     *
     * @param string $filterKey
     * @param string|null $query
     * @return array
     */
    public function search(string $filterKey, ?string $query = null): array
    {
        $filter = GlobalSearchFiltersEnum::tryFrom($filterKey);

        if (!$filter) {
            Log::warning("Invalid filter key: $filterKey");
            return [];
        }

        if ($filter->value === 'All') {
            return $this->searchAll($query);
        }

        $meta = $filter->meta();

        // Handle 'model' type search
        if ($meta['type_search'] === 'model') {
            return $this->searchModel(
                $meta['model'],
                $meta['search_fields'],
                $meta['map_fields'],
                $query,
                $filterKey
            );
        }

        if ($meta['type_search'] === 'function') {
            return $this->{$meta['function']}(
                $meta['params'],
                $filterKey,
                $meta['map_fields'],
                $query
            );
        }

        if ($meta['type_search'] === 'blog') {
            return $this->searchBlog($query);
        }

        // Add more cases for other type_search in the future
        Log::warning("Unsupported type_search: {$meta['type_search']}");
        return [];
    }

    /**
     * Search in a model based on fields and query.
     *
     * @param string $modelClass
     * @param array $fields
     * @param array $mapFields
     * @param string|null $query
     * @param ?string $filterKey
     * @return array
     */
    protected function searchModel(
        string $modelClass,
        array $fields,
        array $mapFields,
        ?string $query,
        ?string $filterKey = null
    ): array {
        if (!class_exists($modelClass)) {
            Log::error("Model class does not exist: $modelClass");
            return [];
        }

        // Perform the search
        $results = $modelClass::query();

        if ($filterKey == GlobalSearchFiltersEnum::OTHERS->value) {
            $results = $results->whereIn('category', ['General', 'Others']);
        } else {
            // Special case with StaticPage
            if ($modelClass == "App\StaticPage" && $filterKey != null) {
                $results = $results->where('unique_identifier', str_slug($filterKey))
                    ->orWhere('category', $filterKey);
            }
        }

        $results = $results->when($query, function ($queryBuilder) use ($fields, $query) {
            $queryBuilder->where(function ($q) use ($fields, $query) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', "%$query%");
                }
            });
        })
            ->get();

        // Format the results
        return $results->map(function ($item) use ($mapFields) {
            $mappedResult = [];
            foreach ($mapFields as $key => $mapping) {
                if (preg_match('/^{(.+)}$/', $mapping, $matches)) {
                    $field = $matches[1];
                    $mappedResult[$key] = isset($item->{$field}) ? $this->formatString($item->{$field}) : '';
                } else {
                    $mappedResult[$key] = $mapping;
                }
            }
            return $mappedResult;
        })->toArray();
    }

    /**
     * Search resources dynamically based on section with mapping fields.
     *
     * @param array $params
     * @param string $filterKey
     * @param array $mapFields
     * @param string|null $query
     * 
     * @return array
     */
    protected function searchResources(
        array $params,
        string $filterKey,
        array $mapFields,
        ?string $query = null
    ): array {
        $section = $params['section'] ?? null;

        if (!$section) {
            Log::error("Missing 'section' in params for searchResources.");
            return [];
        }

        $levels = \App\ResourceLevel::where($section, '=', true)->orderBy('position')->get();
        $types = \App\ResourceType::where($section, '=', true)->orderBy('position')->get();
        $languages = \App\ResourceLanguage::where($section, '=', true)->orderBy('position')->get();
        $programmingLanguages = \App\ResourceProgrammingLanguage::where($section, '=', true)->orderBy('position')->get();
        $categories = \App\ResourceCategory::where($section, '=', true)->orderBy('position')->get();
        $subjects = \App\ResourceSubject::where($section, '=', true)->orderBy('position')->get();

        $resources = collect()
            ->merge($levels)
            ->merge($types)
            ->merge($languages)
            ->merge($programmingLanguages)
            ->merge($categories)
            ->merge($subjects);

        if ($query) {
            $resources = $resources->filter(function ($item) use ($query) {
                return stripos($item->name ?? '', $query) !== false ||
                    stripos($item->description ?? '', $query) !== false;
            });
        }

        return $resources->map(function ($item) use ($mapFields) {
            $mappedResult = [];
            foreach ($mapFields as $key => $mapping) {
                if (preg_match('/^{(.+)}$/', $mapping, $matches)) {
                    $field = $matches[1];
                    $mappedResult[$key] = isset($item->{$field}) ? $this->formatString($item->{$field}) : '';
                } else {
                    $mappedResult[$key] = $mapping;
                }
            }
            return $mappedResult;
        })->toArray();
    }

    /**
     * Perform search for 'All' filter.
     *
     * @param string|null $query
     * @return array
     */
    protected function searchAll(?string $query): array
    {
        $results = collect();

        foreach (\App\Enums\GlobalSearchFiltersEnum::cases() as $filter) {
            if ($filter->value === 'All') {
                continue;
            }

            $meta = $filter->meta();

            if ($meta['type_search'] === 'model') {
                $modelResults = $this->searchModel($meta['model'], $meta['search_fields'], $meta['map_fields'], $query);
                $results = $results->merge($modelResults)->unique('path');
            }

            if ($meta['type_search'] === 'function') {
                $functionResults = $this->{$meta['function']}(
                    $meta['params'],
                    $filter->value,
                    $meta['map_fields'],
                    $query
                );
                $results = $results->merge($functionResults);
            }

            if ($meta['type_search'] === 'blog') {
                $blogResults = $this->searchBlog($query);
                $results = $results->merge($blogResults);
            }
        }

        return $results->toArray();
    }

    /**
     * Search data Blog Wordpress.
     *
     * @param string|null $query
     * 
     * @return array
     */
    protected function searchBlog(?string $query): array
    {
        $endpoint = config('codeweek.blog_url') . '/wp-json/wp/v2/posts';

        $url = $query ? "{$endpoint}?search=" . urlencode($query) : $endpoint;

        try {
            $response = Http::get($url);

            if (!$response->successful()) {
                Log::error("Failed to fetch data from API: $url");
                return [];
            }

            $data = $response->json();

            return collect($data)->map(function ($item) {
                $result = [
                    'name' => data_get($item, 'title.rendered', ''),
                    'category' => 'Blog',
                    'description' => $this->formatString(data_get($item, 'excerpt.rendered', '')),
                    'thumbnail' => '',
                    'path' => data_get($item, 'link', ''),
                    'link_type' => 'external',
                    'language' => 'en',
                ];

                $mediaLinks = data_get($item, '_links.wp:featuredmedia', []);
                if (!empty($mediaLinks) && isset($mediaLinks[0]['href'])) {
                    $mediaUrl = $mediaLinks[0]['href'];

                    try {
                        $mediaResponse = Http::get($mediaUrl);
                        if ($mediaResponse->successful()) {
                            $mediaData = $mediaResponse->json();
                            $result['thumbnail'] = data_get($mediaData, 'source_url', '');
                        }
                    } catch (\Exception $e) {
                        Log::error("Failed to fetch media data: {$e->getMessage()}");
                    }
                }

                return $result;
            })->toArray();
        } catch (\Exception $e) {
            Log::error("Error fetching API data: {$e->getMessage()}");
            return [];
        }
    }

    private function formatString(string $str, $limit = 400) {
        return mb_substr(strip_tags($str), 0, $limit);
    }
}
