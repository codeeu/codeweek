<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\GlobalSearchService;
use Livewire\WithPagination;

class SearchContentComponent extends Component
{
    use WithPagination;

    public $searchQuery = '';
    public $selectedFilter = 'All';

    protected $queryString = [
        'searchQuery' => ['except' => ''],
        'selectedFilter' => ['except' => 'All'],
    ];

    protected $listeners = ['filterChanged'];

    public function updatedSearchQuery()
    {
        $this->resetPage();
    }

    public function updatedSelectedFilter()
    {
        $this->resetPage();
    }

    public function filterChanged($filter)
    {
        $this->selectedFilter = $filter;
        $this->resetPage();
    }

    public function render()
    {
        $searchService = app(GlobalSearchService::class);
        $results = $searchService->search($this->selectedFilter, $this->searchQuery);

        return view('livewire.search-content-component', [
            'results' => $results,
        ]);
    }
}
