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

    public $selectedDate = 'all';

    public $months = [];

    public function mount()
    {
        $this->selectedYear = Carbon::now()->year;
        $this->selectedMonth = Carbon::now()->month;
        $this->selectedDate = 'all';
        $this->selectedLanguage = '';

        $this->months = $this->baseQuery()
            ->orderBy('start_date')
            ->get(['start_date'])
            ->groupBy(function ($event) {
                return $this->effectiveStart($event->start_date)->format('n/Y');
            })
            ->map(function ($group, $id) {
                [$month, $year] = explode('/', $id);

                return [
                    'id' => $id,
                    'name' => Carbon::createFromDate((int) $year, (int) $month, 1)->format('F Y'),
                ];
            })
            ->values()
            ->toArray();
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
        $query = $this->baseQuery()->orderBy('start_date');

        if ($this->selectedDate && $this->selectedDate !== 'all') {
            $parts = explode('/', (string) $this->selectedDate);
            $this->selectedMonth = (int) ($parts[0] ?: $this->selectedMonth);
            $this->selectedYear = (int) ($parts[1] ?? $this->selectedYear);

            $monthStart = Carbon::createFromDate($this->selectedYear, $this->selectedMonth, 1)->startOfMonth();

            $query->where(function ($monthQuery) use ($monthStart) {
                $monthQuery->whereBetween('start_date', [$monthStart, $monthStart->copy()->endOfMonth()]);

                if ($monthStart->isSameMonth(Carbon::now())) {
                    $monthQuery->orWhere('start_date', '<', $monthStart);
                }
            });
        }

        $events = $query->get()
            ->sortBy(function ($event) {
                return $this->effectiveStart($event->start_date)->getTimestamp();
            })
            ->values();

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
                return $event->display_languages;
            })
            ->unique()
            ->sort()
            ->values()
            ->map(function ($language) {
                return [
                    'id' => $language,
                    'name' => __('base.languages.'.$language),
                ];
            })
            ->prepend([
                'id' => '',
                'name' => 'All Languages',
            ])
            ->toArray();

        $totalUpcoming = $this->baseQuery()->count();
        $monthLabel = $this->selectedDate === 'all' || ! $this->selectedDate
            ? 'all upcoming months'
            : Carbon::createFromDate($this->selectedYear, $this->selectedMonth, 1)->format('F Y');

        return view('livewire.online-calendar', [
            'countryNames' => $this->getCountryNamesFromEvents($events),
            'languages' => $languages,
            'filteredEvents' => $filteredEvents->paginate(24),
            'totalUpcoming' => $totalUpcoming,
            'visibleCount' => $filteredEvents->count(),
            'monthLabel' => $monthLabel,
        ]);
    }

    private function baseQuery()
    {
        // Only the end date gates the list: an activity that began earlier but has not
        // finished is still open to participants.
        return Event::where([
            'activity_type' => 'open-online',
            'status' => 'APPROVED',
        ])->where('end_date', '>=', Carbon::now());
    }

    /**
     * Activities already under way are listed under the current month rather than the
     * month they originally started in, which may be long past.
     */
    private function effectiveStart($startDate): Carbon
    {
        $start = Carbon::parse($startDate);
        $currentMonth = Carbon::now()->firstOfMonth();

        return $start->lessThan($currentMonth) ? $currentMonth : $start;
    }

    private function eventMatchesLanguage($event, string $selectedLanguage): bool
    {
        $selected = Event::normalizeLanguageCode($selectedLanguage);

        if ($selected === null) {
            return false;
        }

        return in_array($selected, $event->display_languages, true);
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
