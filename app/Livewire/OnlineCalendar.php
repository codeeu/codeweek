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

            $query->whereMonth('start_date', $this->selectedMonth)
                ->whereYear('start_date', $this->selectedYear);
        }

        $events = $query->get();

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
                return $this->normalizedLanguagesForEvent($event);
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
        return Event::where([
            'activity_type' => 'open-online',
            'status' => 'APPROVED',
        ])
            ->where('start_date', '>=', Carbon::now()->firstOfMonth())
            ->where('end_date', '>=', Carbon::now());
    }

    private function eventMatchesLanguage($event, string $selectedLanguage): bool
    {
        $selected = $this->normalizeLanguageCode($selectedLanguage);

        if ($selected === null) {
            return false;
        }

        return in_array($selected, $this->normalizedLanguagesForEvent($event), true);
    }

    private function normalizedLanguagesForEvent($event): array
    {
        $raw = $event->languages ?? $event->language ?? [];

        if (is_string($raw)) {
            $trimmed = trim($raw);
            if ($trimmed === '') {
                return [];
            }

            if (str_starts_with($trimmed, '[')) {
                $decoded = json_decode($trimmed, true);
                $raw = is_array($decoded) ? $decoded : preg_split('/\s*,\s*/', $trimmed);
            } else {
                $raw = preg_split('/\s*,\s*/', $trimmed);
            }
        }

        if (! is_array($raw)) {
            $raw = [$raw];
        }

        return collect($raw)
            ->map(fn ($language) => $this->normalizeLanguageCode(is_string($language) ? $language : null))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }

    private function normalizeLanguageCode(?string $code): ?string
    {
        if ($code === null) {
            return null;
        }

        $code = strtolower(trim($code));
        $code = trim($code, "\"'[] ");

        if ($code === '') {
            return null;
        }

        $aliases = [
            'eng' => 'en',
            'deu' => 'de',
            'ger' => 'de',
            'fra' => 'fr',
            'fre' => 'fr',
            'spa' => 'es',
            'ita' => 'it',
            'nld' => 'nl',
            'dut' => 'nl',
            'pol' => 'pl',
            'tur' => 'tr',
            'ell' => 'el',
            'gre' => 'el',
        ];

        $code = $aliases[$code] ?? $code;

        if (! trans()->has('base.languages.'.$code)) {
            return null;
        }

        return $code;
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
