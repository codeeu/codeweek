<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\GlobalSearchFiltersEnum;
use App\Services\GlobalSearchService;

class GlobalSearchFilterComponent extends Component
{
    public $selectedFilter = GlobalSearchFiltersEnum::ALL->value;
    public $searchQuery = '';
    
    protected $globalSearchService;

    protected $queryString = [
        'selectedFilter' => ['except' => GlobalSearchFiltersEnum::ALL->value],
        'searchQuery' => ['except' => ''],
    ];

    public function __construct()
    {
        $this->globalSearchService = new GlobalSearchService();
    }

    public function selectFilter($filter)
    {
        if (!GlobalSearchFiltersEnum::tryFrom($filter)) {
            return;
        }

        $this->selectedFilter = $filter;
        $this->dispatch('filterChanged', filter: $filter);
    }

    public function search()
    {
        $this->dispatch('searchQueryChanged', term: $this->searchQuery);
    }

    public function render()
    {
        /*return view('livewire.global-filter-component', [
            'filters' => GlobalSearchFiltersEnum::values(),
        ]);*/
        return view('livewire.global-filter-component', [
            'filters' => collect(GlobalSearchFiltersEnum::cases())->map(fn($filter) => [
                'key' => $filter->value,        //Enum value (e.g.,'year')
                'label' => $filter->label(),    //Translated text (e.g.,'Année')
            ]),
        ]);
    }
}