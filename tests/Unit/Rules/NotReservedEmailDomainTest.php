<?php

namespace Tests\Unit\Rules;

use App\Rules\NotReservedEmailDomain;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class NotReservedEmailDomainTest extends TestCase
{
    #[Test]
    #[DataProvider('reservedEmails')]
    public function it_rejects_reserved_test_domains(string $email): void
    {
        $this->assertTrue(NotReservedEmailDomain::matches($email));

        $failed = false;
        (new NotReservedEmailDomain)->validate('email', $email, function () use (&$failed): void {
            $failed = true;
        });

        $this->assertTrue($failed);
    }

    #[Test]
    #[DataProvider('allowedEmails')]
    public function it_allows_normal_email_domains(string $email): void
    {
        $this->assertFalse(NotReservedEmailDomain::matches($email));

        $failed = false;
        (new NotReservedEmailDomain)->validate('email', $email, function () use (&$failed): void {
            $failed = true;
        });

        $this->assertFalse($failed);
    }

    public static function reservedEmails(): array
    {
        return [
            ['cwtester@example.invalid'],
            ['tester.massassign@codeweek-test.invalid'],
            ['probe@cwprobe.invalid'],
            ['user@something.test'],
            ['user@foo.example'],
            ['user@localhost'],
            ['cwprobe.intake154639@gmail.com'],
            ['CWPROBE@school.be'],
        ];
    }

    public static function allowedEmails(): array
    {
        return [
            ['teacher@school.be'],
            ['organiser@codeweek.eu'],
            ['person@example.com'],
            ['person@gmail.com'],
            ['notcwprobe@gmail.com'],
        ];
    }
}
