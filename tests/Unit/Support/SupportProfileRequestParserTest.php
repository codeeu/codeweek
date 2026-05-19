<?php

namespace Tests\Unit\Support;

use App\Services\Support\SupportProfileRequestParser;
use Tests\TestCase;

final class SupportProfileRequestParserTest extends TestCase
{
    public function test_parses_labelled_profile_fields(): void
    {
        $text = <<<'TEXT'
        Email: bernard@matrixinternet.ie
        Current first name: Bernard Hanna
        Current last name: Last Name
        Requested first name: Bernard
        Requested last name: Hanna
        TEXT;

        $parsed = (new SupportProfileRequestParser())->parse($text);

        $this->assertSame('bernard@matrixinternet.ie', $parsed['email']);
        $this->assertSame('Bernard', $parsed['firstname']);
        $this->assertSame('Hanna', $parsed['lastname']);
    }

    public function test_rejects_placeholder_last_name(): void
    {
        $text = "Email: u@example.com\nLast name: Last Name\nFirst name: Jane";

        $parsed = (new SupportProfileRequestParser())->parse($text);

        $this->assertSame('Jane', $parsed['firstname']);
        $this->assertNull($parsed['lastname']);
    }
}
