<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\GlobalSearchService;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchContentComponent extends Component
{
    use WithPagination;

    public $searchQuery = '';
    public $selectedFilter = 'All';
    public $perPage = 10;

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

    public function getPaginatedResults(): LengthAwarePaginator
    {
        $searchService = app(GlobalSearchService::class);
        $results = $searchService->search($this->selectedFilter, $this->searchQuery);
        $results = collect($results);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $items = $results->slice(($currentPage - 1) * $this->perPage, $this->perPage)->values();

        return new LengthAwarePaginator(
            $items,
            $results->count(),
            $this->perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    public function render()
    {
        $paginatedResults = $this->getPaginatedResults();

        return view('livewire.search-content-component', [
            'results' => $paginatedResults,
        ]);
    }
}
