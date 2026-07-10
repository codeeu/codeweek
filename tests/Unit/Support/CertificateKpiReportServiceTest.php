<?php

namespace Tests\Unit\Support;

use App\Event;
use App\Excellence;
use App\Services\Support\CertificateKpiReportService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class CertificateKpiReportServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_counts_certificates_in_date_window(): void
    {
        $user = User::factory()->create();

        Event::factory()->create([
            'status' => 'APPROVED',
            'creator_id' => $user->id,
            'reported_at' => '2026-04-01 10:00:00',
            'certificate_url' => 'https://example.test/organiser.pdf',
        ]);

        Event::factory()->create([
            'status' => 'APPROVED',
            'creator_id' => $user->id,
            'reported_at' => '2026-01-01 10:00:00',
            'certificate_url' => 'https://example.test/old.pdf',
        ]);

        Excellence::factory()->create([
            'user_id' => $user->id,
            'type' => 'Excellence',
            'certificate_url' => 'https://example.test/excellence.pdf',
            'created_at' => '2026-05-10 12:00:00',
        ]);

        Excellence::factory()->create([
            'user_id' => $user->id,
            'type' => 'SuperOrganiser',
            'certificate_url' => 'https://example.test/super.pdf',
            'created_at' => '2026-06-15 12:00:00',
        ]);

        $report = app(CertificateKpiReportService::class)->report('17.03.2026', '07.07.2026');

        $this->assertSame(1, $report['counts']['organiser']);
        $this->assertSame(1, $report['counts']['excellence']);
        $this->assertSame(1, $report['counts']['super_organiser']);
        $this->assertSame(3, $report['counts']['total']);
    }
}
