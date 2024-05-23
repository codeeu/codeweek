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
    public $selectedTypes;
    public $searchInput;

    public function mount($section = 'learn') {
        $this->section = $section;
        $this->types = \App\ResourceType::where($this->section, '=', true)->orderBy('position')->get();
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
            ->when($this->selectedTypes, function ($query) {
                $plucked = array_values($this->selectedTypes);
                Log::info($plucked);

                $query
                    ->leftJoin('resource_item_resource_type', 'resource_items.id', '=', 'resource_item_resource_type.resource_item_id')
                    ->whereIn('resource_item_resource_type.resource_type_id', $plucked)
                    ->groupBy('resource_items.id');

            })
            ->whereActive(true)
            ->orderBy('weight', 'desc')
            ->orderBy('name', 'asc')
            ->distinct()
            ->paginate(30);

        Log::info('loading data');
        $items->load(['types', 'levels', 'programmingLanguages', 'subjects', 'categories', 'languages']);

        return $items;
    }


}
