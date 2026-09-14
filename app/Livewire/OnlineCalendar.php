<?php

namespace App\Livewire;

use App\Country;
use App\Event;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class OnlineCalendar extends Component
{
    use WithPagination;

    public $selectedLanguage = '';

    public $selectedYear;

    public $selectedMonth;

    public $selectedDate;

    public $months = [];

    public function mount()
    {
        $this->selectedYear = Carbon::now()->year;
        $this->selectedMonth = Carbon::now()->month;
        $this->selectedDate = $this->selectedMonth.'/'.$this->selectedYear;
        // Default to all languages so the list is not silently reduced/restored by locale.
        $this->selectedLanguage = '';

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

    public function updatedSelectedDate(): void
    {
        $this->resetPage();
    }

    public function updatedSelectedLanguage(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $parts = explode('/', (string) $this->selectedDate);
        $this->selectedMonth = (int) ($parts[0] ?: $this->selectedMonth);
        $this->selectedYear = (int) ($parts[1] ?? $this->selectedYear);

        $events = $this->baseQuery()
            ->whereMonth('start_date', $this->selectedMonth)
            ->whereYear('start_date', $this->selectedYear)
            ->orderBy('start_date')
            ->get();

        $events->each(function ($event) {
            $event->title = str_limit($event->title, 50);
            $event->start_date = Carbon::parse($event->start_date);
        });

        if ($this->selectedLanguage !== '' && $this->selectedLanguage !== null) {
            $filteredEvents = $events->filter(function ($event) {
                return $this->eventMatchesLanguage($event, (string) $this->selectedLanguage);
            })->values();
        } else {
            $filteredEvents = $events;
        }

        $languages = $this->baseQuery()
            ->get(['language'])
            ->flatMap(function ($event) {
                return $event->languages ?? [];
            })
            ->filter(function ($language) {
                return ! empty($language);
            })
            ->unique()
            ->sort()
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
            'countryNames' => $this->getCountryNamesFromEvents($events),
            'languages' => $languages,
            'filteredEvents' => $filteredEvents->paginate(50),
        ]);
    }

    private function baseQuery()
    {
        return Event::where([
            'activity_type' => 'open-online',
            'status' => 'APPROVED',
        ])
            ->where('start_date', '>=', Carbon::now()->firstOfMonth())
            ->where('end_date', '>=', Carbon::now());
    }

    private function eventMatchesLanguage($event, string $selectedLanguage): bool
    {
        $languages = $event->languages ?? [];

        if (! is_array($languages)) {
            return strtolower((string) $languages) === strtolower($selectedLanguage);
        }

        $normalized = array_map(static function ($language) {
            return strtolower((string) $language);
        }, $languages);

        return in_array(strtolower($selectedLanguage), $normalized, true);
    }

    private function getCountryNamesFromEvents($events)
    {
        $country_codes = $events
            ->groupBy('country_iso')
            ->keys()
            ->all();

        $countriesObjects = Country::whereIn('iso', $country_codes)->get();

        return $countriesObjects->mapWithKeys(function ($item) {
            return [$item['iso'] => __('countries.'.$item['name'])];
        });
    }
}
