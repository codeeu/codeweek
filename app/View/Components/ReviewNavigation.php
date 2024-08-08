<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReviewNavigation extends Component
{
    public $event;

    public $events;

    public $pendingEventsCount;

    public $nextPendingEvent;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
        $this->pendingEventsCount = auth()->user()->getEventsToReviewCount();
        $this->nextPendingEvent = auth()->user()->getNextPendingEvent($event);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.review-navigation');
    }
}
