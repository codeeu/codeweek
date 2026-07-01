<?php

namespace Tests\Unit\Support;

use App\Services\Support\SupportEmailChangeRequestParser;
use Tests\TestCase;

final class SupportEmailChangeRequestParserTest extends TestCase
{
    public function test_parses_labelled_email_change_request(): void
    {
        $text = <<<'TEXT'
        Please change the email address for this CodeWeek account.

        Account email (current): anu.kahri@opetus.espoo.fi
        New email: anu.kahri@gmail.com

        The name should stay the same.
        TEXT;

        $parsed = (new SupportEmailChangeRequestParser())->parse($text);

        $this->assertSame('anu.kahri@opetus.espoo.fi', $parsed['from_email']);
        $this->assertSame('anu.kahri@gmail.com', $parsed['to_email']);
    }
}
