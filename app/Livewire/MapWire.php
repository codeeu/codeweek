<?php

namespace App\Livewire;

use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class MapWire extends Component
{
    use WithPagination;

    private $events;

    public $years;

    public $selectedYear;

    public $readyToLoad = false;

    protected $queryString = ['search', 'selectedYear'];

    public $search;

    private $whereClause = [
        'activity_type' => 'open-online',
        'status' => 'APPROVED',
        'highlighted_status' => 'FEATURED',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {

        $current_year = Carbon::now()->year;
        $this->selectedYear = $current_year;
        $this->years = [];
        for ($year = $current_year; $year >= 2014; $year--) {
            $this->years[] = $year;
        }

    }

    public function render()
    {

        $events = Event::where(function ($query) {
            $query->where('title', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        })
            ->whereYear('start_date', '=', $this->selectedYear)
            ->orderBy('start_date');

        $markers = Cache::remember(
            'map_markers_' . $this->selectedYear . '_' . md5((string) $this->search),
            300,
            function () {
                $grouped = [];

                Event::select('id', 'geoposition', 'country_iso')
                    ->where('status', 'APPROVED')
                    ->whereNotNull('geoposition')
                    ->where('geoposition', '!=', '')
                    ->whereYear('start_date', '=', $this->selectedYear)
                    ->when($this->search, function ($query) {
                        $query->where(function ($query) {
                            $query->where('title', 'like', "%{$this->search}%")
                                ->orWhere('description', 'like', "%{$this->search}%");
                        });
                    })
                    ->cursor()
                    ->each(function ($event) use (&$grouped) {
                        $grouped[$event->country_iso ?: 'unknown'][] = [
                            'id' => $event->id,
                            'geoposition' => $event->geoposition,
                            'country' => $event->country_iso,
                        ];
                    });

                return collect($grouped);
            }
        );

        $this->dispatch('markersUpdated', $markers);

        $this->events = $events;

        return view('livewire.map-wire', [
            'events' => $this->events->paginate(30),
            'markers' => $markers,
        ]);
    }

    protected function getData()
    {

        Log::info('START - Get All Data for the Map');

        $this->dispatch('markersLoaded');

        Log::info('END - Get All Data for the Map');

    }
}
