<?php

namespace App\Http\Livewire;

use App\Event;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class MapWire extends Component
{

    use WithPagination;

    private $events;
    protected $queryString = ['search'];
    public $search;
    private $whereClause = [
        'activity_type' => 'open-online',
        'status' => 'APPROVED',
        'highlighted_status' => 'FEATURED'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {

        $this->events = Event::
        where(function($query){
            $query->where('title','like',"%{$this->search}%")
                ->orWhere('description','like',"%{$this->search}%");
        })
//        where($this->whereClause)
            ->orderBy('start_date')
            ->paginate(30);

        return view('livewire.map-wire', [
            'events' => $this->events
        ]);
    }
}
