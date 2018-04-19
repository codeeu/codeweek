<?php

namespace App\Http\Controllers;

use App\Event;
use App\Filters\EventFilters;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(EventFilters $filters)
    {

        $events = $this->getEvents($filters);

        return view('event.search', compact(['events']));
    }

    protected function getEvents(EventFilters $filters)
    {

        $events = Event::where('status','not like','REJECTED')->filter($filters);

        return $events->paginate(10);
    }
}
