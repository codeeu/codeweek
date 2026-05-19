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
     * @return array{email: ?string, firstname: ?string, lastname: ?string}
     */
    public function parse(string $text): array
    {
        $normalized = Str::of($text)->replace("\r\n", "\n")->toString();

        $email = $this->extractFirstEmail($normalized);
        $firstname = $this->extractLabelledValue($normalized, [
            'requested first name',
            'new first name',
            'first name',
            'firstname',
        ]);
        $lastname = $this->extractLabelledValue($normalized, [
            'requested last name',
            'new last name',
            'last name',
            'lastname',
        ]);

        return [
            'email' => $email,
            'firstname' => $this->sanitizeName($firstname),
            'lastname' => $this->sanitizeName($lastname),
        ];
    }

    private function extractFirstEmail(string $text): ?string
    {
        preg_match_all('/[a-z0-9._%+\\-]+@[a-z0-9.\\-]+\\.[a-z]{2,}/i', $text, $m);
        $emails = array_map(fn ($e) => Str::lower(trim($e)), $m[0] ?? []);

        return $emails[0] ?? null;
    }

    /**
     * @param list<string> $labels
     */
    private function extractLabelledValue(string $text, array $labels): ?string
    {
        foreach ($labels as $label) {
            $pattern = '/'.preg_quote($label, '/').'\s*[\*:]?\s*(.+?)(?:\n|$)/iu';
            if (preg_match($pattern, $text, $m)) {
                $value = trim($m[1]);
                if ($value !== '') {
                    return $value;
                }
            }
        }

        return null;
    }

    private function sanitizeName(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim(preg_replace('/\s+/', ' ', $value) ?? '');
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
