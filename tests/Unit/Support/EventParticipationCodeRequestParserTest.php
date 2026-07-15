<?php

namespace Tests\Unit\Support;

use App\Services\Support\EventParticipationCodeRequestParser;
use Tests\TestCase;

final class EventParticipationCodeRequestParserTest extends TestCase
{
    private EventParticipationCodeRequestParser $parser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->parser = new EventParticipationCodeRequestParser();
    }

    public function test_parses_rosa_montalbano_style_request(): void
    {
        $text = <<<'TEXT'
Hi,
I'd like to know if it is possible to change the code cw25-E6CDg with the one cw26-wNc6o for the activities registered in June 2026
Best regards,
Rosa Montalbano
TEXT;

        $parsed = $this->parser->parse($text);

        $this->assertTrue($parsed['looks_like_code_change_request']);
        $this->assertSame('cw25-E6CDg', $parsed['old_code']);
        $this->assertSame('cw26-wNc6o', $parsed['new_code']);
        $this->assertSame(2026, $parsed['year']);
        $this->assertSame(6, $parsed['month']);
    }
}
