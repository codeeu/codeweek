<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use stdClass;


class AddressAutocomplete extends Component
{
    public string $streetAddress = '';
    public string $city = '';
    public string $state = '';
    public string $zip = '';
    public string $country = '';
    public array $searchResults = [];

    public function addressSelected(){
        Log::info("Address selected");
    }
    // Magic method that is fired when `streetAddress` is updated
    public function updatedStreetAddress()
    {
        if ($this->streetAddress != '') {
            // An array of SearchResults
            $this->searchResults = [];

            $searchResult1 = new stdClass();
            $searchResult1->uniqueKey = "A";
            $searchResult1->fullAddress = "AAAAAA";

            $searchResult2 = new stdClass();
            $searchResult2->uniqueKey = "B";
            $searchResult2->fullAddress = "BBB";

            $searchResult3 = new stdClass();
            $searchResult3->uniqueKey = "C";
            $searchResult3->fullAddress = "CCAACCAA";

            $this->searchResults[] = $searchResult1;
            $this->searchResults[] = $searchResult2;
            $this->searchResults[] = $searchResult3;
        } else {
            $this->searchResults = [];
        }
    }

    public function render()
    {
        return view('livewire.address-autocomplete');
    }
}