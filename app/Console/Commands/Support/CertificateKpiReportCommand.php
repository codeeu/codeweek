<?php

namespace App\Console\Commands\Support;

use App\Services\Support\CertificateKpiReportService;
use App\Services\Support\SupportJson;
use Illuminate\Console\Command;

class CertificateKpiReportCommand extends Command
{
    protected $signature = 'support:certificate-kpi-report
                            {start : Start date (YYYY-MM-DD or DD.MM.YYYY)}
                            {end : End date (YYYY-MM-DD or DD.MM.YYYY)}
                            {--json}';

    protected $description = 'Support tool: certificate KPI counts for Organiser, Excellence, and Super Organiser';

    public function handle(CertificateKpiReportService $service): int
    {
        $start = (string) $this->argument('start');
        $end = (string) $this->argument('end');
        $input = ['start' => $start, 'end' => $end];

        try {
            $result = $service->report($start, $end);
            $payload = SupportJson::ok('certificate_kpi_report', $input, $result);
        } catch (\InvalidArgumentException $e) {
            $payload = SupportJson::fail('certificate_kpi_report', $input, $e->getMessage());
        } catch (\Throwable $e) {
            $payload = SupportJson::fail('certificate_kpi_report', $input, $e->getMessage());
        }

        $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));

        return $payload['ok'] ? self::SUCCESS : self::FAILURE;
    }
}
