<?php

namespace Tests\Unit\Support;

use App\Services\Support\SupportRoleRequestParser;
use Tests\TestCase;

final class SupportRoleRequestParserTest extends TestCase
{
    public function test_parses_pasted_table_of_leading_teachers(): void
    {
        $text = implode("\n", [
            "Italy\tAntonio Delli Carpini\tdevant.mee@gmail.com\tadd \tleading teachers\t19-Jun-26",
            "Italy\tmaria chirico\tmariachirico40@gmail.com\tadd \tleading teachers\t19-Jun-26",
            "France\tNathalie BRAUN\tNathalie.Braun1@ac-nancy-metz.fr\tadd \tleading teachers\t23-Jun-26",
        ]);

        $parsed = (new SupportRoleRequestParser())->parse($text);

        $this->assertSame('add', $parsed['operation']);
        $this->assertSame('leading teachers', $parsed['role']);
        $this->assertSame([
            'devant.mee@gmail.com',
            'mariachirico40@gmail.com',
            'nathalie.braun1@ac-nancy-metz.fr',
        ], $parsed['emails']);
    }

    public function test_parses_labelled_request(): void
    {
        $text = <<<'TEXT'
        Add role: leading teacher

        Emails:
        a@example.com
        b@example.com
        TEXT;

        $parsed = (new SupportRoleRequestParser())->parse($text);

        $this->assertSame('add', $parsed['operation']);
        $this->assertSame('leading teacher', $parsed['role']);
        $this->assertSame(['a@example.com', 'b@example.com'], $parsed['emails']);
    }

    public function test_returns_null_role_when_no_role_present(): void
    {
        $parsed = (new SupportRoleRequestParser())->parse("Please help a@example.com log in.");

        $this->assertNull($parsed['role']);
    }

    public function test_deduplicates_emails(): void
    {
        $text = "add role: leading teacher\nx@example.com\nX@Example.com\n";

        $parsed = (new SupportRoleRequestParser())->parse($text);

        $this->assertSame(['x@example.com'], $parsed['emails']);
    }
}
