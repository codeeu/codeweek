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
        $text = "Email: u@example.com\nCurrent last name: Last Name\nRequested first name: Jane";

        $parsed = (new SupportProfileRequestParser())->parse($text);

        $this->assertSame('Jane', $parsed['firstname']);
        $this->assertNull($parsed['lastname']);
    }

    public function test_parses_current_and_requested_names(): void
    {
        $text = <<<'TEXT'
        Current first name: Bernard
        Current last name: Hanna
        Requested first name: Bernard
        Requested last name: Hannaa
        TEXT;

        $parsed = (new SupportProfileRequestParser())->parse($text);

        $this->assertSame('Bernard', $parsed['current_firstname']);
        $this->assertSame('Hanna', $parsed['current_lastname']);
        $this->assertSame('Hannaa', $parsed['lastname']);
    }

    public function test_parses_hanna_to_hannaa_request_without_bleeding_lines(): void
    {
        $text = <<<'TEXT'
        Email: bernard@matrixinternet.ie

        Current first name: Bernard
        Current last name: Hanna

        Requested first name: Bernard
        Requested last name: Hannaa

        The email address must stay the same.
        TEXT;

        $parsed = (new SupportProfileRequestParser())->parse($text);

        $this->assertSame('bernard@matrixinternet.ie', $parsed['email']);
        $this->assertSame('Bernard', $parsed['firstname']);
        $this->assertSame('Hannaa', $parsed['lastname']);
    }

    public function test_strips_trailing_the_email_phrase_on_same_line(): void
    {
        $text = "Email: u@example.com\nRequested last name: Hannaa The email address must stay the same.";

        $parsed = (new SupportProfileRequestParser())->parse($text);

        $this->assertSame('Hannaa', $parsed['lastname']);
    }
}
