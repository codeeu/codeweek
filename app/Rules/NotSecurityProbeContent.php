<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Rejects activity title/description markers used by authorized security probes
 * so test submissions do not land in ambassador moderation queues.
 */
class NotSecurityProbeContent implements ValidationRule
{
    public const TITLE_PREFIXES = [
        'CW Probe',
        'CW SSRF',
        'CW Restore',
        'CW Defaults',
        'CW Isolate',
        'CW Path',
        'CW PT',
        'CW S3',
        'CW Pic',
        'CW Cert',
        'CW TeX',
        'CW Event',
        'CW Combine',
        'CW Final',
        'CW Report',
        'CW pending probe',
        'CW marker test',
        'CW Probe Create',
    ];

    public const DESCRIPTION_NEEDLES = [
        'authorized security testing',
        'cwmark benign',
        'benign baseline description for tester probe',
        'ssrf probe',
        'pathtraversal',
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value === null || $value === '') {
            return;
        }

        if (self::matches((string) $value)) {
            $fail('This activity looks like a security/test probe and cannot be submitted.');
        }
    }

    public static function matches(string $value): bool
    {
        $normalized = trim($value);
        $lower = strtolower($normalized);

        foreach (self::TITLE_PREFIXES as $prefix) {
            if (str_starts_with($lower, strtolower($prefix))) {
                return true;
            }
        }

        foreach (self::DESCRIPTION_NEEDLES as $needle) {
            if (str_contains($lower, $needle)) {
                return true;
            }
        }

        return false;
    }
}
