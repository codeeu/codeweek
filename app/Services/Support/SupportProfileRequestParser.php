<?php

namespace App\Services\Support;

use Illuminate\Support\Str;

/**
 * Extract profile-update fields from support ticket text (email body).
 */
final class SupportProfileRequestParser
{
    /** @var list<string> */
    private const PLACEHOLDER_NAMES = [
        'first name',
        'last name',
        'your details',
        'display email',
        'leading teacher tag',
        'twitter (optional)',
        'your website',
        'n/a',
        '-',
    ];

    /**
     * @return array{
     *   email: ?string,
     *   firstname: ?string,
     *   lastname: ?string,
     *   current_firstname: ?string,
     *   current_lastname: ?string,
     * }
     */
    public function parse(string $text): array
    {
        $normalized = Str::of($text)->replace("\r\n", "\n")->toString();

        return [
            'email' => $this->extractFirstEmail($normalized),
            'firstname' => $this->sanitizeName($this->extractRequestedName($normalized, 'first')),
            'lastname' => $this->sanitizeName($this->extractRequestedName($normalized, 'last')),
            'current_firstname' => $this->sanitizeName($this->extractCurrentName($normalized, 'first')),
            'current_lastname' => $this->sanitizeName($this->extractCurrentName($normalized, 'last')),
        ];
    }

    private function extractFirstEmail(string $text): ?string
    {
        preg_match_all('/[a-z0-9._%+\\-]+@[a-z0-9.\\-]+\\.[a-z]{2,}/i', $text, $m);
        $emails = array_map(fn ($e) => Str::lower(trim($e)), $m[0] ?? []);

        return $emails[0] ?? null;
    }

    private function extractRequestedName(string $text, string $which): ?string
    {
        return $this->extractPrefixedName($text, $which, ['requested', 'new']);
    }

    private function extractCurrentName(string $text, string $which): ?string
    {
        return $this->extractPrefixedName($text, $which, ['current']);
    }

    /**
     * @param list<string> $prefixes
     */
    private function extractPrefixedName(string $text, string $which, array $prefixes): ?string
    {
        $field = $which === 'first' ? 'first\\s*name' : 'last\\s*name';

        foreach ($prefixes as $prefix) {
            $pattern = '/(?:^|\n)\s*'.preg_quote($prefix, '/').'\s+'.$field.'\s*[:*]?\s*([^\n\r]+)/iu';
            if (preg_match($pattern, $text, $m)) {
                return $this->cleanCapturedName($m[1]);
            }
        }

        return null;
    }

    private function cleanCapturedName(string $value): string
    {
        $value = trim(preg_replace('/\s+/', ' ', $value) ?? '');

        if (preg_match('/^(.+?)(?:\s+the email\b|\s+email address\b)/iu', $value, $m)) {
            $value = trim($m[1]);
        }

        if (str_contains($value, "\n")) {
            $value = trim(explode("\n", $value)[0]);
        }

        return $value;
    }

    private function sanitizeName(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim($value);
        if ($value === '') {
            return null;
        }

        if (in_array(Str::lower($value), self::PLACEHOLDER_NAMES, true)) {
            return null;
        }

        if (mb_strlen($value) > 255) {
            $value = mb_substr($value, 0, 255);
        }

        return $value;
    }
}
