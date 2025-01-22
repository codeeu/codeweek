<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Enums\GlobalSearchFiltersEnum;
use App\ResourceItem;
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

        $resources = ResourceItem::where(strtolower($section), '=', true);

        if ($query && isset($params['search_fields']) && is_array($params['search_fields'])) {
            $resources = $resources->where(function ($queryBuilder) use ($params, $query) {
                foreach ($params['search_fields'] as $field) {
                    $queryBuilder->orWhere($field, 'like', '%' . $query . '%');
                }
            });
        }

        return $resources->get()->map(function ($item) use ($mapFields) {
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
        }

        return $results->toArray();
    }

    private function formatString(string $str, $limit = 400)
    {
        return mb_substr(strip_tags($str), 0, $limit);
    }
}
