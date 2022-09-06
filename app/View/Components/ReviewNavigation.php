<?php

namespace App\View\Components;

use App\Event;
use App\Helpers\EventHelper;
use Illuminate\View\Component;

class ReviewNavigation extends Component
{
    public $events;
    public $pendingEventsCount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pendingEventsCount = auth()->user()->getEventsToReviewCount();
        $this->nextPendingEvent =
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
