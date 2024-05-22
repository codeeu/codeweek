<?php

namespace App\Livewire;

use Livewire\Component;

class CountrySelector extends Component
{
    public $code;
    public $countries;
    public $target;
    public $selected_country;

    public function mount($code, $countries, $target)
    {
        $this->code = $code;
        $this->countries = $countries;
        $this->target = $target;
        $this->selected_country = $code ?? '';
    }

    public function updatedSelectedCountry()
    {
        return redirect('/' . $this->target . '/' . $this->selected_country);
    }

    public function render()
    {
        return view('livewire.country-selector');
    }
}
