<?php

namespace App\Livewire;

use App\Country;
use App\Event;
use App\Queries\CountriesQuery;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
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
    ];

    public function mount()
    {
        $this->selectedLanguage = strtolower(App::getLocale());
        $this->selectedYear = Carbon::now()->year;
        $this->selectedMonth = Carbon::now()->month;
        $this->selectedDate = $this->selectedMonth.'/'.$this->selectedYear;

        $this->months = $this->baseQuery()
            ->orderBy('start_date')
            ->get(['start_date'])
            ->groupBy(function ($event) {
                $date = Carbon::parse($event->start_date);

                return $date->month.'/'.$date->year;
            })
            ->map(function ($group, $id) {
                $date = Carbon::parse($group->first()->start_date);

                return [
                    'id' => $id,
                    'name' => $date->format('F').' '.$date->year,
                ];
            })
            ->values()
            ->toArray();

        if (! empty($this->months)) {
            $parts = explode('/', $this->months[0]['id']);
            $this->selectedMonth = (int) $parts[0];
            $this->selectedYear = (int) ($parts[1] ?? $this->selectedYear);
            $this->selectedDate = $this->selectedMonth.'/'.$this->selectedYear;
        }
    }

    public function render()
    {
        $parts = explode('/', (string) $this->selectedDate);
        $this->selectedMonth = (int) ($parts[0] ?: $this->selectedMonth);
        $this->selectedYear = (int) ($parts[1] ?? $this->selectedYear);

        $this->events = $this->baseQuery()
            ->whereMonth('start_date', $this->selectedMonth)
            ->whereYear('start_date', $this->selectedYear)
            ->orderBy('start_date')
            ->get();

        $this->events->map(function ($event) {
            $event->title = str_limit($event->title, 50);
            $event->start_date = Carbon::parse($event->start_date);
        });

        if ($this->selectedLanguage !== '') {
            $this->filteredEvents = $this->events->filter(function ($event) {
                return $this->eventMatchesLanguage($event, $this->selectedLanguage);
            });

            if ($this->filteredEvents->isEmpty()) {
                $this->filteredEvents = $this->events;
            }
        } else {
            $this->filteredEvents = $this->events;
        }

        $countries = CountriesQuery::withOnlineEvents('NONE');

        $countryNames = $this->getCountryNamesFromEvents($this->events);

        $languages = $this->events
            ->flatMap(function ($event) {
                return $event->languages ?? [];
            })
            ->filter(function ($language) {
                return ! empty($language);
            })
            ->unique()
            ->values()
            ->map(function ($language) {
                return [
                    'id' => $language,
                    'name' => __("base.languages.{$language}"),
                ];
            })
            ->prepend([
                'id' => '',
                'name' => 'All Languages',
            ])
            ->toArray();

        return view('livewire.online-calendar', [
            'countries' => $countries,
            'countryNames' => $countryNames,
            'languages' => $languages,
            'filteredEvents' => $this->filteredEvents->paginate(50),
        ]);
    }

    private function baseQuery()
    {
        return Event::where($this->whereClause)
            ->where('start_date', '>=', Carbon::now()->firstOfMonth())
            ->where('end_date', '>=', Carbon::now());
    }

    private function eventMatchesLanguage($event, string $selectedLanguage): bool
    {
        $languages = $event->languages ?? [];

        if (! is_array($languages)) {
            return $languages == $selectedLanguage;
        }

        return in_array($selectedLanguage, $languages, true)
            || in_array(strtolower($selectedLanguage), array_map('strtolower', $languages), true);
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
