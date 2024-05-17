<?php

namespace App\Livewire;

use App\Event;
use App\Http\Transformers\EventTransformer;
use Livewire\Component;

class ReportActivity extends Component
{
    public $event;
    public function mount(Event $event): void
    {
        $this->event = $event;
    }
    public function render()
    {
        return view('livewire.report-activity');
    }
}
