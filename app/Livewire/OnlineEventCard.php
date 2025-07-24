<?php

namespace App\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class OnlineEventCard extends Component
{
    use AuthorizesRequests;

    public $event;

    public $countryName;

    public $baseLanguage;

    public $loop;

    public function mount($event, $countryName, $loop)
    {
        $this->event = $event;
        $this->countryName = $countryName;
        $this->baseLanguage = App::getLocale();
        $this->loop = $loop;
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

    public function setLanguage($language)
    {
        $this->authorize('promote', $this->event);
        Log::info('Setting language to: '.$language);
        $this->event->language = strtolower($language);

        return $this->event->save();
    }

    public function clearLanguage()
    {
        $this->authorize('promote', $this->event);
        Log::info('Clearing Language');
        $this->event->language = null;

        return $this->event->save();
    }
}
