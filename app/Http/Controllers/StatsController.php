<?php

namespace App\Http\Controllers;


use App\Charts\StatsPerYearChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{


    public function getMetrics(Request $request)
    {
        $year = ($request->has('yearSelector')) ? $request->input('yearSelector') : 2018;
        $creatorsWithOneEvent = $this->creatorsWithAtLeastOneEvent($year);
        $totalParticipants = (int)$this->totalParticipants($year);
        $eventsNotReported = $this->eventsNotReported($year);
        $eventsFinished = $this->eventsFinished($year);
        $years = $this->getYearsArray();
        //dd($creatorsWithOneEvent);



        return view('stats',[
            'creatorsWithOneEvent' => $creatorsWithOneEvent,
            'totalParticipants' => $totalParticipants,
            'eventsNotReported' => $eventsNotReported,
            'eventsFinished' => $eventsFinished,
            'years' => $years,
            'selectedYear' => $year,
            'flag' => 0
        ]);
    }


    public function getEventsPerYear(Request $request)
    {
        $year = ($request->has('yearSelector')) ? $request->input('yearSelector') : 2018;
        $years = $this->getYearsArray();
        $total = 0;
        $eventsPerYear = $this->eventsPerYear($year, null);

        $groupedEvents = $this->groupSmallEvents($eventsPerYear, $total);
        $chart = $this->setPieChart(array_sort($groupedEvents), $year);


        return view('stats', ['years' => $years,
            'eventsPerYear' => $eventsPerYear,
            'selectedYear' => $year,
            'chart' => $chart,
            'total' => $total,
            'flag' => 1
        ]);
    }

    public function getEventsPerOrganiserType(Request $request)
    {
        $types = [
            'Libraries' => 'library'
            , 'Non profit organisations' => 'non profit'
            , 'Private Businesses' => 'private business'
            , 'Schools' => 'school'
        ];

        $now = Carbon::now('Europe/Brussels');
        $year = $now->year;
        $type = ($request->has('typeSelector')) ? $types[$request->input('typeSelector')] : $types['Schools'];
        $eventsPerYear = $this->eventsPerYear($year, $type);
        $total = 0;
        $groupedEvents = $this->groupSmallEvents($eventsPerYear, $total, sizeof($eventsPerYear));
        $chart = $this->setBarChart($groupedEvents, $year);



        return view('stats', ['types' => $types,
            'eventsPerYear' => $eventsPerYear,
            'selectedType' => array_search($type, $types),
            'chart' => $chart,
            'year' => $year,
            'flag' => 2
        ]);
    }


    private function eventsPerYear($year, $type)
    {
        $eventsPerYear = (!$type)
            ? DB::table('countries as c')
                ->selectRaw('c.name, count(c.iso) as events')
                ->join('events as e', 'c.iso', '=', 'e.country_iso')
                ->where('e.status', '=', 'APPROVED')
                ->whereYear('e.end_date', '=', $year)
                ->groupBy('c.name')
                ->orderBy('events', 'desc')
                ->pluck('events', 'c.name')
                ->toArray()
            : DB::table('countries as c')
                ->selectRaw('c.name, count(c.iso) as events')
                ->join('events as e', 'c.iso', '=', 'e.country_iso')
                ->where('e.status', '=', 'APPROVED')
                ->whereNotNull('e.organizer_type')
                ->where('e.organizer_type', '=', $type)
                ->whereYear('e.end_date', '>=', $year)
                ->groupBy('c.name')
                ->orderBy('events', 'desc')
                ->pluck('events', 'c.name')
                ->toArray();

        return $eventsPerYear;
    }


    private function creatorsWithAtLeastOneEvent($year)
    {
        $operator = ($year == 2018) ? '>=' : '=';
        $count = DB::table('events as e')
            ->select()
            ->where('e.status', '=', 'APPROVED')
            ->whereYear('e.end_date', $operator, $year)
            ->distinct()
            ->count('creator_id');
        return $count;

    }

    private function totalParticipants($year)
    {
        $operator = ($year == 2018) ? '>=' : '=';
        $count = DB::table('events as e')
            ->select()
            ->where('e.status', '=', 'APPROVED')
            ->whereYear('e.end_date', $operator, $year)
            ->where('id', '<>', 183480)
            ->sum('e.participants_count');
        return $count;

    }

    private function eventsFinished($year)
    {
        $operator = ($year == 2018) ? '>=' : '=';
        $count = DB::table('events as e')
            ->select()
            ->where('e.status', '=', 'APPROVED')
            ->whereYear('e.end_date', $operator, $year)
            ->where('e.end_date', '<=', Carbon::now('Europe/Brussels'))
            ->count();
        return $count;

    }

    private function eventsNotReported($year)
    {
        $operator = ($year == 2018) ? '>=' : '=';
        $count = DB::table('events as e')
            ->select()
            ->where('e.status', '=', 'APPROVED')
            ->whereYear('e.start_date', $operator, $year)
            ->whereYear('e.end_date', $operator, $year)
            ->where('e.end_date', '<', Carbon::now('Europe/Brussels'))
            ->whereNull('e.participants_count')
            ->count();
        return $count;

    }

    private function setPieChart($eventsPerYear, $year)
    {
        $colors = ['#08a0c4', '#5e9fb2', '#819da1', '#9b9b8f', '#b1997d', '#c3976b', '#d49559', '#e39244', '#f18f2d', '#ff8c00'];

        $chart = new StatsPerYearChart();
        $chart->displayAxes(false);
        $chart->height(500);
        $chart->dataset('Event distribution for CodeWeek ' . $year, 'pie', array_values($eventsPerYear))
            ->backgroundColor(array_reverse($colors));
        $chart->labels(array_keys($eventsPerYear));
        return $chart;
    }


    private function setBarChart($eventsPerYear, $year)
    {
        $colors = ['#DBDE00', '#DBDE00', '#E1B400', '#E1B400', '#E1B400', '#E1B400', '#E1B400',
            '#E1B400', '#E56F00', '#E16E03', '#DD6D06', '#D96D09', '#D56C0C', '#D16C10', '#CD6B13',
            '#CD6B13', '#C96A16', '#C56A19', '#C2691D', '#BE6920', '#BA6823', '#B66826', '#B2672A',
            '#AE662D', '#AA6630', '#A66533', '#A36537', '#9F643A', '#9B643D', '#976340', '#936243',
            '#955D42', '#536479', '#0E70B2', '#006EBF', '#004DBF'];

        $chart = new StatsPerYearChart();
        $chart->dataset('Event distribution for CodeWeek ' . $year, 'bar', array_values($eventsPerYear))
            ->backgroundColor(array_reverse($colors));
        $chart->labels(array_keys($eventsPerYear));
        return $chart;
    }

    private function getYearsArray()
    {
        $years = [];
        $now = Carbon::now(null);
        $diffYears = $now->year - 2013;

        for ($index = 0; $index < $diffYears; $index++) {
            array_push($years, 2014 + $index);
        }

        return $years;
    }

    private function groupSmallEvents( $eventsPerYear, &$total)
    {
        $groupedEvents = ['Others' => 0];
        $maxCountEvents = max(array_values($eventsPerYear));
        foreach ($eventsPerYear as $country => $events) {
            $total += $events;
            if ($events <= (round($maxCountEvents * 0.03))) {
                $groupedEvents['Others'] += $events;
                continue;
            }
            $groupedEvents[$country] = $events;
        }
        return $groupedEvents;
    }
}
