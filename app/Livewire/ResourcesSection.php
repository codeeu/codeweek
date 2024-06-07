<?php

namespace App\Livewire;

use App\Filters\ResourceFilters;
use App\ResourceItem;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;
use Livewire\WithPagination;

class ResourcesSection extends Component
{
    use WithPagination;

    #[Url]
    public $section;

    public $types;
    public $levels;
    public $selectedTypes;
    public $selectedLevels;
    public $searchInput;
    public $languages;
    public $programmingLanguages;
    public $categories;
    public $subjects;
    /**
     * @var mixed|null
     */
    public $selectedProgrammingLanguages;
    public $selectedLanguages;
    public $selectedCategories;
    public $selectedSubjects;

    public function mount($section = 'learn') {
        $this->section = $section;
        $this->types = \App\ResourceType::where($this->section, '=', true)->orderBy('position')->get();
        $this->levels = \App\ResourceLevel::where($this->section, '=', true)->orderBy('position')->get();
        $this->languages = \App\ResourceLanguage::where($section, '=', true)->orderBy('position')->get();
        $this->programmingLanguages = \App\ResourceProgrammingLanguage::where($section, '=', true)->orderBy('position')->get();
        $this->categories = \App\ResourceCategory::where($section, '=', true)->orderBy('position')->get();
        $this->subjects = \App\ResourceSubject::where($section, '=', true)->orderBy('position')->get();
    }

    public function doSomething($property){
        Log::info('do something called');

    }
    public function render(ResourceFilters $filters)
    {

        return view('livewire.resources-section', [
            'items' => $this->getItems($filters),
            'types' => $this->types
        ]);
    }

    #[NoReturn]
    public function updated($property, $value)
    {
        Log::info($property);
        Log::info($value);
        Log::info($this->selectedTypes);
    }

    public function getItems(ResourceFilters $filters)
    {
        $items = ResourceItem::filter($filters)
            ->when($this->section, function ($query) {
                if ($this->section === 'learn') {
                    $query->where('learn', 1);
                } elseif ($this->section === 'teach') {
                    $query->where('teach', 1);
                }
            })
            ->when($this->searchInput, function ($query) {

                $query->where(function ($q) { // $term is the search term on the query string
                    $q->where('name', 'like', '%'.$this->searchInput.'%')
                        ->orWhere('description', 'like', '%'.$this->searchInput.'%');
                });

            })
            ->when($this->selectedTypes, function ($query) {
                $plucked = array_values($this->selectedTypes);


                $query
                    ->leftJoin('resource_item_resource_type', 'resource_items.id', '=', 'resource_item_resource_type.resource_item_id')
                    ->whereIn('resource_item_resource_type.resource_type_id', $plucked)
                    ->groupBy('resource_items.id');

            })
            ->when($this->selectedLevels, function ($query) {
                $plucked = array_values($this->selectedLevels);
                $query
                    ->leftJoin('resource_item_resource_level', 'resource_items.id', '=', 'resource_item_resource_level.resource_item_id')
                    ->whereIn('resource_item_resource_level.resource_level_id', $plucked)
                    ->groupBy('resource_items.id');

            })
            ->when($this->selectedSubjects, function ($query) {
                $plucked = array_values($this->selectedSubjects);

                $query
                    ->leftJoin('resource_item_resource_subject', 'resource_items.id', '=', 'resource_item_resource_subject.resource_item_id')
                    ->whereIn('resource_item_resource_subject.resource_subject_id', $plucked)
                    ->groupBy('resource_items.id');
            })
            ->when($this->selectedCategories, function ($query) {
                $plucked = array_values($this->selectedCategories);

                $query
                    ->leftJoin('resource_category_resource_item', 'resource_items.id', '=', 'resource_category_resource_item.resource_item_id')
                    ->whereIn('resource_category_resource_item.resource_category_id', $plucked)
                    ->groupBy('resource_items.id');
            })
            ->when($this->selectedLanguages, function ($query) {
                $plucked = array_values($this->selectedLanguages);

                $query
                    ->leftJoin('resource_item_resource_language', 'resource_items.id', '=', 'resource_item_resource_language.resource_item_id')
                    ->whereIn('resource_item_resource_language.resource_language_id', $plucked)
                    ->groupBy('resource_items.id');
            })
            ->when($this->selectedProgrammingLanguages, function ($query) {
                $plucked = array_values($this->selectedProgrammingLanguages);

                $query
                    ->leftJoin('res_pl_pivot', 'resource_items.id', '=', 'res_pl_pivot.resource_item_id')
                    ->whereIn('res_pl_pivot.resource_programming_language_id', $plucked)
                    ->groupBy('resource_items.id');
            })
            ->whereActive(true)
            //->orderBy('weight', 'desc')
            //->orderBy('name', 'asc')
            ->distinct()
            ->inRandomOrder()
            ->paginate(30);

        Log::info('loading data');
        $items->load(['types', 'levels', 'programmingLanguages', 'subjects', 'categories', 'languages']);

        return $items;
    }


}
