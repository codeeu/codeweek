<?php

namespace App\Livewire;

use App\Event;
use App\Http\Transformers\EventTransformer;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ActivityMap extends Component
{
    public $activities;
    protected $eventTransformer;

    public function mount(EventTransformer $eventTransformer)
    {

        // Load activities when the component is mounted
        $activities = Event::where('id', '>', 601000)
            ->where('status', 'APPROVED')
            ->orderBy('start_date')
            ->get();

        $this->eventTransformer = $eventTransformer;
        $activities = $this->eventTransformer->transformCollection($activities);

        $this->activities = $activities->groupBy('country');
    }

    public function load($year){
        $this->dispatch('load-data', year:$year);
    }
    public function render()
    {
        return view('livewire.activity-map');
    }
}
