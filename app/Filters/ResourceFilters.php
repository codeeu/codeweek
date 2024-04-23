<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ResourceFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['selectedSection', 'searchInput', 'selectedLevels', 'selectedTypes', 'selectedSubjects', 'selectedCategories', 'selectedLanguages', 'selectedProgrammingLanguages'];

    /**
     * Filter the query by section (teach or learn)
     */
    protected function selectedSection(string $selectedSection): Builder
    {

        //if (is_null($selectedSection)) return;

        if ($selectedSection === 'learn') {
            return $this->builder->where('learn', '=', true);
        }

        if ($selectedSection === 'teach') {
            return $this->builder->where('teach', '=', true);
        }

    }

    /**
     * Filter the query by name
     *
     * @param  string  $name
     */
    protected function searchInput($searchInput): Builder
    {
        if (is_null($searchInput)) {
            return $this->builder;
        }

        $result = $this->builder->where(function ($q) use ($searchInput) { // $term is the search term on the query string
            $q->where('name', 'like', '%'.$searchInput.'%')
                ->orWhere('description', 'like', '%'.$searchInput.'%');
        });

        return $result;
    }

    /**
     * Filter the query by selectedLevels
     */
    protected function selectedLevels(string $selectedLevels): Builder
    {
        if (count($selectedLevels) == 0) {
            return $this->builder;
        }
        $plucked = collect($selectedLevels)->pluck('id');

        return $this->builder
            ->leftJoin('resource_item_resource_level', 'resource_items.id', '=', 'resource_item_resource_level.resource_item_id')
            ->whereIn('resource_item_resource_level.resource_level_id', $plucked)
            ->groupBy('resource_items.id');

    }

    /**
     * Filter the query by selectedTypes
     */
    protected function selectedTypes(string $selectedTypes): Builder
    {
        if (count($selectedTypes) == 0) {
            return $this->builder;
        }
        $plucked = collect($selectedTypes)->pluck('id');

        return $this->builder
            ->leftJoin('resource_item_resource_type', 'resource_items.id', '=', 'resource_item_resource_type.resource_item_id')
            ->whereIn('resource_item_resource_type.resource_type_id', $plucked)
            ->groupBy('resource_items.id');

    }

    /**
     * Filter the query by selectedSubjects
     */
    protected function selectedSubjects(string $selectedSubjects): Builder
    {
        if (count($selectedSubjects) == 0) {
            return $this->builder;
        }
        $plucked = collect($selectedSubjects)->pluck('id');

        return $this->builder
            ->leftJoin('resource_item_resource_subject', 'resource_items.id', '=', 'resource_item_resource_subject.resource_item_id')
            ->whereIn('resource_item_resource_subject.resource_subject_id', $plucked)
            ->groupBy('resource_items.id');

    }

    /**
     * Filter the query by selectedCategories
     */
    protected function selectedCategories(string $selectedCategories): Builder
    {
        if (count($selectedCategories) == 0) {
            return $this->builder;
        }
        $plucked = collect($selectedCategories)->pluck('id');

        return $this->builder
            ->leftJoin('resource_category_resource_item', 'resource_items.id', '=', 'resource_category_resource_item.resource_item_id')
            ->whereIn('resource_category_resource_item.resource_category_id', $plucked)
            ->groupBy('resource_items.id');

    }

    /**
     * Filter the query by selectedLanguages
     */
    protected function selectedLanguages(string $selectedLanguages): Builder
    {

        if (count($selectedLanguages) == 0) {
            return $this->builder;
        }
        $plucked = collect($selectedLanguages)->pluck('id');

        return $this->builder
            ->leftJoin('resource_item_resource_language', 'resource_items.id', '=', 'resource_item_resource_language.resource_item_id')
            ->whereIn('resource_item_resource_language.resource_language_id', $plucked)
            ->groupBy('resource_items.id');

    }

    /**
     * Filter the query by selectedProgrammingLanguages
     */
    protected function selectedProgrammingLanguages(string $selectedProgrammingLanguages): Builder
    {
        if (count($selectedProgrammingLanguages) == 0) {
            return $this->builder;
        }
        $plucked = collect($selectedProgrammingLanguages)->pluck('id');

        return $this->builder
            ->leftJoin('res_pl_pivot', 'resource_items.id', '=', 'res_pl_pivot.resource_item_id')
            ->whereIn('res_pl_pivot.resource_programming_language_id', $plucked)
            ->groupBy('resource_items.id');

    }
}
