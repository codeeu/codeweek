<?php

namespace App\Http\Controllers;

use App\Event;
use App\Filters\EventFilters;
use Illuminate\Http\Request;

class SearchController extends Controller
{
//    public function search(){
//        $events = Event::latest();
//
//        if($country = request('country')){
//            var_dump($country);
//            $events->where('country',$country);
//        }
//
//        $events = $events->paginate(10);
//
//        return view('event.search', compact('events'));
//    }



    public function search(EventFilters $filters)
    {

        $events = $this->getEvents($filters);

        return view('event.search', compact(['events']));
    }

    protected function getEvents(EventFilters $filters)
    {
        $events = Event::filter($filters);

        return $events->paginate(10);
    }
}
