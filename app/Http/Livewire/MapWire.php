<?php

namespace App\Http\Livewire;

use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class MapWire extends Component
{

    use WithPagination;

    private $events;
    public $years;
    public $selectedYear;
    protected $queryString = ['search','selectedYear'];
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

    public function mount(){
        $current_year = Carbon::now()->year;
        $this->selectedYear = $current_year;

        $this->years = array();
        for ($year = $current_year; $year >= 2014; $year--) {
            $this->years[] = $year;
        }
    }

    public function render()
    {

        $this->events = Event::
        where(function($query){
            $query->where('title','like',"%{$this->search}%")
                ->orWhere('description','like',"%{$this->search}%");
        })
            ->whereYear('start_date', '=', $this->selectedYear)
            ->orderBy('start_date')
            ->paginate(30);

//        dd($this->events);

        return view('livewire.map-wire', [
            'events' => $this->event

        ]);
    }
}
