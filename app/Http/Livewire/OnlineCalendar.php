<?php

namespace App\Http\Livewire;

use App\Country;
use App\Event;
use App\Helpers\EventHelper;
use App\Queries\CountriesQuery;
use App\Queries\OnlineEventsQuery;
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

    public $listeners = ['eventsUpdated' => 'render'];




    public function mount()
    {
        $this->selectedLanguage = strtolower(App::getLocale());
        $this->selectedYear= Carbon::now()->year;
        $this->selectedMonth = Carbon::now()->month;
        $this->selectedDate = $this->selectedMonth . "/" . $this->selectedYear;

    }

    public function render()
    {

        $parts = explode("/",$this->selectedDate);

        $this->events = Event::where([
            'activity_type' => 'open-online',
            'status' => 'APPROVED',
            'highlighted_status' => 'FEATURED'
        ])
            ->whereYear('start_date',$parts[1])
            ->whereMonth('start_date',$parts[0])
            ->where('start_date', '>=', Carbon::now())
            ->orderBy('start_date')
            ->get();

//        $byMonths = $this->events->groupBy(function($val) {
//            return Carbon::parse($val->start_date)->format('M');
//        });

//        $byMonths = Event::selectRaw('year(start_date) year, monthname(start_date) month, count(*) data')
//            ->where([
//                'activity_type' => 'open-online',
//                'status' => 'APPROVED',
//                'highlighted_status' => 'FEATURED'
//            ])
//            ->where('start_date', '>=', Carbon::now())
//            ->groupBy('year', 'month')
//            ->orderBy('year', 'desc')
//            ->get();
//
//        dd($byMonths);


        $this->events->map(function ($event) {
            $event->title = str_limit($event->title, 50);
            $event->start_date = Carbon::parse($event->start_date)->toDateString();
        });

        if ($this->selectedLanguage !== "") {
            $this->filteredEvents = $this->events->filter(function ($event) {
                return $event->language == $this->selectedLanguage;
            });

            if ($this->filteredEvents->isEmpty()){
                $this->filteredEvents = $this->events;
            }
        } else {
            $this->filteredEvents = $this->events;
        }

        Log::info($this->selectedDate);




        $countries = CountriesQuery::withOnlineEvents('FEATURED');

        $countryNames = $this->getCountryNamesFromEvents($this->events);

        $languages = $this->events->groupBy('language')->keys()->all();


        return view('livewire.online-calendar', [
            'countries' => $countries,
            'countryNames' => $countryNames,
            'languages' => $languages,
            'filteredEvents' => $this->filteredEvents->paginate(50)
        ]);

    }

    /**
     * @param $events
     * @return mixed
     */
    private function getCountryNamesFromEvents($events)
    {
        $country_codes = $events->groupBy('country_iso')->keys()->all();

        $countriesObjects = Country::whereIn("iso", $country_codes)->get();
        $countryNames = $countriesObjects->mapWithKeys(function ($item) {
            return [$item['iso'] => __("countries." . $item['name'])];
        });
        return $countryNames;
    }

}
