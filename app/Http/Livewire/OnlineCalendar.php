<?php

namespace App\Http\Livewire;

use App\Country;
use App\Event;
use App\Helpers\EventHelper;
use App\Queries\CountriesQuery;
use App\Queries\OnlineEventsQuery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class OnlineCalendar extends Component
{
    use WithPagination;

    public $events;
    private $filteredEvents;
    public $selectedLanguage;

    public $listeners = ['eventsUpdated' => 'render'];




    public function mount()
    {
        $this->selectedLanguage = "";
    }

    public function render()
    {
        $this->events = Event::where([
            'activity_type' => 'open-online',
            'status' => 'APPROVED',
            'highlighted_status' => 'FEATURED'
        ])
            ->where('start_date', '>=', Carbon::now())
            ->orderBy('start_date')
            ->get();


        $this->events->map(function ($event) {
            $event->title = str_limit($event->title, 50);
            $event->start_date = Carbon::parse($event->start_date)->toDateString();
        });

        if ($this->selectedLanguage !== "") {
            $this->filteredEvents = $this->events->filter(function ($event) {
                return $event->language == $this->selectedLanguage;
            });
        } else {
            $this->filteredEvents = $this->events;
        }


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
