<?php

namespace App\Services\Support;

use App\Event;
use App\Excellence;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * KPI counts for Code Week certificates in a date window.
 *
 * - organiser: activity organiser certificates (reported events with certificate_url)
 * - excellence: Certificate of Excellence rows
 * - super_organiser: Super Organiser certificate rows
 */
final class CertificateKpiReportService
{
    /**
     * @return array<string, mixed>
     */
    public function report(string $startInput, string $endInput): array
    {
        $start = $this->normalizeBoundary($startInput, false);
        $end = $this->normalizeBoundary($endInput, true);

        if ($start->greaterThan($end)) {
            throw new \InvalidArgumentException('start_date_after_end_date');
        }

        $organiser = $this->countOrganiserCertificates($start, $end);
        $excellence = $this->countExcellenceCertificates($start, $end);
        $superOrganiser = $this->countSuperOrganiserCertificates($start, $end);

        return [
            'window' => [
                'start' => $start->toDateTimeString(),
                'end' => $end->toDateTimeString(),
                'start_input' => trim($startInput),
                'end_input' => trim($endInput),
            ],
            'counts' => [
                'organiser' => $organiser,
                'excellence' => $excellence,
                'super_organiser' => $superOrganiser,
                'total' => $organiser + $excellence + $superOrganiser,
            ],
            'monthly' => [
                'organiser' => $this->monthlyOrganiser($start, $end),
                'excellence' => $this->monthlyExcellence($start, $end),
                'super_organiser' => $this->monthlySuperOrganiser($start, $end),
            ],
            'labels' => [
                'organiser' => 'Organiser (reported activity certificates)',
                'excellence' => 'Excellence',
                'super_organiser' => 'Super Organiser',
            ],
        ];
    }

    public function normalizeBoundary(string $input, bool $endOfDay): Carbon
    {
        $value = trim($input);
        if ($value === '') {
            throw new \InvalidArgumentException('empty_date');
        }

        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            $date = Carbon::createFromFormat('Y-m-d', $value);

            return $endOfDay ? $date->endOfDay() : $date->startOfDay();
        }

        if (preg_match('/^(\d{1,2})[.\/\-](\d{1,2})[.\/\-](\d{4})$/', $value, $m)) {
            $date = Carbon::createFromFormat('Y-m-d', sprintf('%04d-%02d-%02d', (int) $m[3], (int) $m[2], (int) $m[1]));

            return $endOfDay ? $date->endOfDay() : $date->startOfDay();
        }

        throw new \InvalidArgumentException('invalid_date_format');
    }

    private function countOrganiserCertificates(Carbon $start, Carbon $end): int
    {
        return Event::query()
            ->where('status', 'APPROVED')
            ->whereNotNull('reported_at')
            ->whereNotNull('certificate_url')
            ->whereBetween('reported_at', [$start, $end])
            ->count();
    }

    private function countExcellenceCertificates(Carbon $start, Carbon $end): int
    {
        return Excellence::query()
            ->where('type', 'Excellence')
            ->whereNotNull('certificate_url')
            ->whereBetween('created_at', [$start, $end])
            ->count();
    }

    private function countSuperOrganiserCertificates(Carbon $start, Carbon $end): int
    {
        return Excellence::query()
            ->where('type', 'SuperOrganiser')
            ->whereNotNull('certificate_url')
            ->whereBetween('created_at', [$start, $end])
            ->count();
    }

    /**
     * @return array<string, int>
     */
    private function monthlyOrganiser(Carbon $start, Carbon $end): array
    {
        return $this->monthlyCounts(
            Event::query()
                ->where('status', 'APPROVED')
                ->whereNotNull('reported_at')
                ->whereNotNull('certificate_url')
                ->whereBetween('reported_at', [$start, $end]),
            'reported_at'
        );
    }

    /**
     * @return array<string, int>
     */
    private function monthlyExcellence(Carbon $start, Carbon $end): array
    {
        return $this->monthlyCounts(
            Excellence::query()
                ->where('type', 'Excellence')
                ->whereNotNull('certificate_url')
                ->whereBetween('created_at', [$start, $end]),
            'created_at'
        );
    }

    /**
     * @return array<string, int>
     */
    private function monthlySuperOrganiser(Carbon $start, Carbon $end): array
    {
        return $this->monthlyCounts(
            Excellence::query()
                ->where('type', 'SuperOrganiser')
                ->whereNotNull('certificate_url')
                ->whereBetween('created_at', [$start, $end]),
            'created_at'
        );
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder<\Illuminate\Database\Eloquent\Model>  $query
     * @return array<string, int>
     */
    private function monthlyCounts($query, string $column): array
    {
        $driver = DB::connection()->getDriverName();
        $expr = $driver === 'sqlite'
            ? "strftime('%Y-%m', {$column})"
            : "DATE_FORMAT({$column}, '%Y-%m')";

        $rows = (clone $query)
            ->selectRaw("{$expr} as yyyymm, COUNT(*) as cnt")
            ->groupBy('yyyymm')
            ->orderBy('yyyymm')
            ->get();

        $out = [];
        foreach ($rows as $row) {
            if (!empty($row->yyyymm)) {
                $out[(string) $row->yyyymm] = (int) $row->cnt;
            }
        }

        return $out;
    }
}
