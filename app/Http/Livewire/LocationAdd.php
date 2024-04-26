<?php

namespace App\Http\Livewire;

use App\Country;
use Livewire\Component;

class LocationAdd extends Component
{
    public $countries;

    public $selectedCountry;

    public function mount()
    {
        $this->countries = Country::whereIn('iso', [
            'AL', 'AT', 'BE', 'BA', 'BG',
            'HR', 'CY', 'CZ', 'DK', 'EE',
            'FI', 'FR', 'DE', 'GR', 'HU',
            'IN', 'IE', 'IL', 'IT', 'XK',
            'LV', 'LT', 'LU', 'MT', 'ME',
            'NL', 'MK', 'NO', 'PL', 'PT',
            'RO', 'RS', 'SK', 'SI', 'ES',
            'SE', 'TN', 'GB',
        ])->orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.location-add');
    }
}
