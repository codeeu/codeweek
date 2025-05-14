<?php

namespace App\Livewire;

use App\Country;
use App\Event;
use App\Queries\CountriesQuery;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class OnlineCalendar extends Component
{
    use WithPagination;

    public $events;

    private $filteredEvents;

    public $selectedLanguage;

    public $selectedYear;

    public $selectedMonth;

    public $selectedDate;

    public $months;

    public $listeners = ['eventsUpdated' => 'render'];

    private $whereClause = [
        'activity_type' => 'open-online',
        'status' => 'APPROVED',
        'highlighted_status' => 'FEATURED',
    ];

    public function mount()
    {
        $this->selectedLanguage = strtolower(App::getLocale());
        $this->selectedYear = Carbon::now()->year;
        $this->selectedMonth = Carbon::now()->month;

        $byMonths = Event::selectRaw(
            'year(start_date) year, month(start_date) month, monthname(start_date) monthname, count(*) data'
        )
            ->where($this->whereClause)
//            ->where('start_date', '>=', Carbon::now())
            ->where('start_date', '>=', \Carbon\Carbon::now()->firstOfMonth())
            ->groupBy('year', 'month','monthname')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $this->months = [];

        foreach ($byMonths as $result) {
            $this->months[$result->month.'/'.$result->year] =
                $result->monthname.' '.$result->year;
        }

        //Go back to start of array to get the first item
        reset($this->months);
        $parts = explode('/', key($this->months));
        if ($parts[0] !== $this->selectedMonth) {
            $this->selectedMonth = $parts[0];
        }

        $this->selectedDate = $this->selectedMonth.'/'.$this->selectedYear;
    }

    public function render()
    {
        $parts = explode('/', $this->selectedDate);
        $this->selectedMonth = $parts[0];
        $this->selectedYear = $parts[1];

        $this->events = Event::where($this->whereClause)
            ->whereMonth('start_date', $this->selectedMonth)
            ->whereYear('start_date', $this->selectedYear)
            ->where('start_date', '>=', \Carbon\Carbon::now()->firstOfMonth())
//            ->where('start_date', '>=', Carbon::now())
            ->orderBy('start_date')
            ->get();

        $this->events->map(function ($event) {
            $event->title = str_limit($event->title, 50);
            $event->start_date = Carbon::parse($event->start_date);
        });

        if ($this->selectedLanguage !== '') {
            $this->filteredEvents = $this->events->filter(function ($event) {
                return $event->language == $this->selectedLanguage;
            });

            if ($this->filteredEvents->isEmpty()) {
                $this->filteredEvents = $this->events;
            }
        } else {
            $this->filteredEvents = $this->events;
        }

        //Log::info($this->selectedDate);

        $countries = CountriesQuery::withOnlineEvents('FEATURED');

        $countryNames = $this->getCountryNamesFromEvents($this->events);

        $languages = $this->events
            ->groupBy('language')
            ->keys()
            ->all();

        return view('livewire.online-calendar', [
            'countries' => $countries,
            'countryNames' => $countryNames,
            'languages' => $languages,
            'filteredEvents' => $this->filteredEvents->paginate(50),
        ]);
    }

    /**
     * @return mixed
     */
    private function getCountryNamesFromEvents($events)
    {
        $country_codes = $events
            ->groupBy('country_iso')
            ->keys()
            ->all();

        $countriesObjects = Country::whereIn('iso', $country_codes)->get();
        $countryNames = $countriesObjects->mapWithKeys(function ($item) {
            return [$item['iso'] => __('countries.'.$item['name'])];
        });

        return $countryNames;
    }
}