<?php

namespace Tests\Unit\Rules;

use App\Rules\NotSecurityProbeContent;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class NotSecurityProbeContentTest extends TestCase
{
    #[Test]
    #[DataProvider('probeValues')]
    public function it_rejects_probe_markers(string $value): void
    {
        $this->assertTrue(NotSecurityProbeContent::matches($value));

        $failed = false;
        (new NotSecurityProbeContent)->validate('title', $value, function () use (&$failed): void {
            $failed = true;
        });

        $this->assertTrue($failed);
    }

    #[Test]
    #[DataProvider('allowedValues')]
    public function it_allows_normal_activity_copy(string $value): void
    {
        $this->assertFalse(NotSecurityProbeContent::matches($value));

        $failed = false;
        (new NotSecurityProbeContent)->validate('title', $value, function () use (&$failed): void {
            $failed = true;
        });

        $this->assertFalse($failed);
    }

    public static function probeValues(): array
    {
        return [
            ['CW Probe SrcRef SSRF'],
            ['CW SSRF Restored 1795087516'],
            ['CW Restore 1795087848'],
            ['CW Defaults Check'],
            ['CW Isolate PicPath'],
            ['PATCH test for SSRF probe - authorized security testing.'],
        ];
    }

    public static function allowedValues(): array
    {
        return [
            ['Belgium coding club for kids'],
            ['Learn Scratch at school'],
            ['Community workshop in Brussels'],
        ];
    }
}
