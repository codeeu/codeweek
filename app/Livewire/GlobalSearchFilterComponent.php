<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\GlobalSearchFiltersEnum;
use App\Services\GlobalSearchService;

class GlobalSearchFilterComponent extends Component
{
    public $selectedFilter = GlobalSearchFiltersEnum::ALL->value;
    
    protected $globalSearchService;

    protected $queryString = [
        'selectedFilter' => ['except' => GlobalSearchFiltersEnum::ALL->value],
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

    public function render()
    {
        return view('livewire.filter-component', [
            'filters' => GlobalSearchFiltersEnum::values(),
        ]);
    }
}