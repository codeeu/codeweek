<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Enums\GlobalSearchFiltersEnum;

class GlobalSearchService
{
    protected string $jsonFile = 'data.json';

    protected array $jsonData = [];

    public function __construct()
    {
        $this->initData();
    }

    private function initData()
    {
        if (count($this->jsonData) == 0 && Storage::disk('storage')->exists($this->jsonFile)) {
            $this->jsonData = json_decode(Storage::disk('storage')->get($this->jsonFile), true) ?? [];
        };
    }

    /**
     * Perform search based on filter string.
     *
     * @param string $filterKey
     * @param string|null $query
     * @return array
     */
    public function search(string $filterKey, ?string $query = null): array
    {
        $this->initData();

        $filter = GlobalSearchFiltersEnum::tryFrom($filterKey);

        if (!$filter) {
            Log::warning("Invalid filter key: $filterKey");
            return [];
        }

        if ($filter->value === 'All') {
            return $this->searchAll($query);
        }

        $meta = $filter->meta();
        return $this->searchFromJson(
            $meta['model'],
            $meta['search_fields'],
            $query,
            $filterKey
        );
    }

    /**
     * Search in JSON data based on fields and query.
     *
     * @param string $modelClass
     * @param array $fields
     * @param string|null $query
     * @param ?string $filterKey
     * @return array
     */
    protected function searchFromJson(
        string $modelClass,
        array $fields,
        ?string $query,
        ?string $filterKey = null
    ): array {
        $results = collect($this->jsonData)
            ->where('model', class_basename($modelClass));

        if ($filterKey == GlobalSearchFiltersEnum::OTHERS->value) {
            $results = $results->whereIn('category', ['General', 'Others']);
        } else if ($filterKey == GlobalSearchFiltersEnum::LEARN->value) {
            $results = $results->where('category', GlobalSearchFiltersEnum::LEARN->value);
        } else if ($filterKey == GlobalSearchFiltersEnum::TEACH->value) {
            $results = $results->where('category', GlobalSearchFiltersEnum::TEACH->value);
        } elseif ($modelClass == "App\StaticPage" && $filterKey !== null) {
            $results = $results->filter(function ($item) use ($filterKey) {
                return str_slug($item['unique_identifier']) === str_slug($filterKey)
                    || $item['category'] === $filterKey;
            });
        }

        if ($query) {
            $results = $results->filter(function ($item) use ($fields, $query) {
                foreach ($fields as $field) {
                    if (stripos($item[$field] ?? '', $query) !== false) {
                        return true;
                    }
                }
                return false;
            });
        }

        if ($filterKey === GlobalSearchFiltersEnum::PODCASTS->value) {
            $staticPodcast = collect($this->jsonData)->firstWhere('unique_identifier', 'podcasts');

            if ($staticPodcast && (!$query || stripos($staticPodcast['name'] . ' ' . $staticPodcast['description'], $query) !== false)) {
                $results->prepend($staticPodcast);
            }
        }

        return $results->map(function ($item) {
            return collect($item)->map(fn($value) => is_string($value) ? $this->formatString($value) : $value)->toArray();
        })->sortByDesc('created_at')->toArray();
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
            $modelResults = $this->searchFromJson(
                $meta['model'],
                $meta['search_fields'],
                $query
            );
            $results = $results->merge($modelResults)->unique('path');
        }

        return $results->toArray();
    }

    private function formatString(string $str, $limit = 400)
    {
        return mb_substr(strip_tags($str), 0, $limit);
    }
}
