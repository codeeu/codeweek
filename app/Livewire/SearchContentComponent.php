<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\GlobalSearchService;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

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

    protected $listeners = ['filterChanged', 'searchQueryChanged'];

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

    public function searchQueryChanged($term)
    {
        $this->searchQuery = $term;
        $this->resetPage();
    }

    public function getPaginatedResults(): LengthAwarePaginator
    {
        $searchService = app(GlobalSearchService::class);
        $results = $searchService->search($this->selectedFilter, $this->searchQuery);
        $results = collect($results);

        Log::info("Total results before pagination: " . $results->count());

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $items = $results->slice(($currentPage - 1) * $this->perPage, $this->perPage)->values();

        Log::info("Showing page $currentPage with " . count($items) . " records");

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
