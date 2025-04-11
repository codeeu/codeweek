<?php

namespace App\Filters;

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
     *
     * @param  string $selectedSection
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function selectedSection($selectedSection)
    {


        //if (is_null($selectedSection)) return;

        if ($selectedSection === "learn") {
            return $this->builder->where('learn', '=', true);
        }

        if ($selectedSection === "teach") {
            return $this->builder->where('teach', '=', true);
        }

    }

    /**
     * Filter the query by name
     *
     * @param  string $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function searchInput($searchInput)
    {
        if (is_null($searchInput)) return;

        $result = $this->builder->where(function ($q) use ($searchInput) { // $term is the search term on the query string
            $q->where('name', 'like', '%' . $searchInput . '%')
                ->orWhere('description', 'like', '%' . $searchInput . '%');
    });

        return $result;
    }

    /**
     * Filter the query by selectedLevels
     *
     * @param  array $selectedLevels
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function selectedLevels($selectedLevels)
    {
        if (sizeof($selectedLevels) == 0) return;
        $plucked = collect($selectedLevels)->pluck("id");

        return $this->builder
            ->leftJoin('resource_item_resource_level', 'resource_items.id', "=", "resource_item_resource_level.resource_item_id")
            ->whereIn('resource_item_resource_level.resource_level_id', $plucked)
            ->groupBy(['resource_items.id','resource_item_resource_level.resource_level_id']);

    }

    /**
     * Filter the query by selectedTypes
     *
     * @param array $selectedTypes
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function selectedTypes($selectedTypes)
    {
        if (sizeof($selectedTypes) == 0) return;
        $plucked = collect($selectedTypes)->pluck("id");

        return $this->builder
            ->leftJoin('resource_item_resource_type', 'resource_items.id', "=", "resource_item_resource_type.resource_item_id")
            ->whereIn('resource_item_resource_type.resource_type_id', $plucked)
            ->groupBy(['resource_items.id','resource_item_resource_type.resource_type_id']);

    }

    /**
     * Filter the query by selectedSubjects
     *
     * @param array $selectedSubjects
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function selectedSubjects($selectedSubjects)
    {
        if (sizeof($selectedSubjects) == 0) return;
        $plucked = collect($selectedSubjects)->pluck("id");

        return $this->builder
            ->leftJoin('resource_item_resource_subject', 'resource_items.id', "=", "resource_item_resource_subject.resource_item_id")
            ->whereIn('resource_item_resource_subject.resource_subject_id', $plucked)
            ->groupBy(['resource_items.id','resource_item_resource_subject.resource_subject_id']);


    }

    /**
     * Filter the query by selectedCategories
     *
     * @param array $selectedCategories
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function selectedCategories($selectedCategories)
    {
        if (sizeof($selectedCategories) == 0) return;
        $plucked = collect($selectedCategories)->pluck("id");

        return $this->builder
            ->leftJoin('resource_category_resource_item', 'resource_items.id', "=", "resource_category_resource_item.resource_item_id")
            ->whereIn('resource_category_resource_item.resource_category_id', $plucked)
            ->groupBy(['resource_items.id','resource_category_resource_item.resource_category_id']);

    }


    /**
     * Filter the query by selectedLanguages
     *
     * @param array $selectedLanguages
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function selectedLanguages($selectedLanguages)
    {

        if (sizeof($selectedLanguages) == 0) return;
        $plucked = collect($selectedLanguages)->pluck("id");


        return $this->builder
            ->leftJoin('resource_item_resource_language', 'resource_items.id', "=", "resource_item_resource_language.resource_item_id")
            ->whereIn('resource_item_resource_language.resource_language_id', $plucked)
            ->groupBy(['resource_items.id','resource_item_resource_language.resource_language_id']);


    }

    /**
     * Filter the query by selectedProgrammingLanguages
     *
     * @param array $selectedProgrammingLanguages
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function selectedProgrammingLanguages($selectedProgrammingLanguages)
    {
        if (sizeof($selectedProgrammingLanguages) == 0) return;
        $plucked = collect($selectedProgrammingLanguages)->pluck("id");

        return $this->builder
            ->leftJoin('res_pl_pivot', 'resource_items.id', "=", "res_pl_pivot.resource_item_id")
            ->whereIn('res_pl_pivot.resource_programming_language_id', $plucked)
            ->groupBy(['resource_items.id','res_pl_pivot.resource_programming_language_id']);


    }


}