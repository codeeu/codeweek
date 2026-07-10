<?php

namespace Tests\Unit\Support;

use App\Services\Support\CertificateKpiRequestParser;
use Tests\TestCase;

final class CertificateKpiRequestParserTest extends TestCase
{
    private CertificateKpiRequestParser $parser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->parser = new CertificateKpiRequestParser();
    }

    public function test_parses_between_dates_from_semester_style_email(): void
    {
        $text = <<<'TEXT'
As we are wrapping up the semester, we would like to update our database and KPI dashboard.
May I ask you to provide the information for the Code Week certificates? I need the data between 17.03.2026 to 07.07.2026.
Organiser
Excellence
Super Organiser
TEXT;

        $parsed = $this->parser->parse($text);

        $this->assertTrue($parsed['looks_like_kpi_request']);
        $this->assertSame('17.03.2026', $parsed['start']);
        $this->assertSame('07.07.2026', $parsed['end']);
    }

    public function test_ignores_non_kpi_certificate_requests(): void
    {
        $parsed = $this->parser->parse('I did not receive my participation certificate for my event.');

        $this->assertFalse($parsed['looks_like_kpi_request']);
        $this->assertNull($parsed['start']);
        $this->assertNull($parsed['end']);
    }
}
