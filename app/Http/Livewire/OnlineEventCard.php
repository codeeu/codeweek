<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class OnlineEventCard extends Component
{

    use AuthorizesRequests;

    public $event;
    public $countryName;


    public function mount($event, $countryName)
    {
        $this->event = $event;
        $this->countryName = $countryName;

    }

    public function render()
    {
        return view('livewire.online-event-card');
    }


    public function promote()
    {
        $this->authorize('promote', $this->event);
        Log::info('going to promote');
        return $this->event->promote();
    }

    public function feature()
    {
        $this->authorize('feature', $this->event);
        Log::info('going to feature');
        return $this->event->feature();
    }

}
