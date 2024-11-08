<?php

namespace App\Livewire;

use Livewire\Component;


class PartnerFilterComponent extends Component
{
    public $selectedFilter = 'Partners'; // Default filter

    // This function will be triggered when a filter is selected
    public function selectFilter($filter)
    {
        $this->selectedFilter = $filter; // Update the filter
        $this->dispatch('filterChanged', filter: $filter); // Dispatch an event in Livewire v3
    }

    public function render()
    {
        return view('livewire.partner-filter-component', [
            'filters' => ['Partners', 'Council Presidency', 'EU Code Week Supporters'] // Available filters
        ]);
    }
}