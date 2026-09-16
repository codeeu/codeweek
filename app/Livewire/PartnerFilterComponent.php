<?php

namespace App\Livewire;

use Livewire\Component;


class PartnerFilterComponent extends Component
{
    public $selectedFilter = 'Partners'; // Default filter

    // This function will be triggered when a filter is selected
    public function selectFilter($filter)
    {
        $this->selectedFilter = $filter;
        $this->dispatch('filterChanged', filter: $filter)
            ->to(PartnerContentComponent::class);
    }

    public function render()
    {
        return view('livewire.filter-component', [
            'filters' => ['Partners', 'Council Presidency', 'EU Code Week Supporters'] // Available filters
        ]);
    }
}