<?php

namespace App\Services\Support;

/**
 * Extract Code Week 4 All participation code swap requests from support email text.
 */
final class EventParticipationCodeRequestParser
{
    private const CODE_PATTERN = 'cw\d{2}-[A-Za-z0-9]+';

    /** @var array<string, int> */
    private const MONTHS = [
        'january' => 1, 'february' => 2, 'march' => 3, 'april' => 4,
        'may' => 5, 'june' => 6, 'july' => 7, 'august' => 8,
        'september' => 9, 'october' => 10, 'november' => 11, 'december' => 12,
    ];

    /**
     * @return array{
     *   looks_like_code_change_request: bool,
     *   old_code: ?string,
     *   new_code: ?string,
     *   year: ?int,
     *   month: ?int,
     * }
     */
    public function parse(string $text): array
    {
        $normalized = str_replace("\r\n", "\n", $text);
        $lower = mb_strtolower($normalized);

        [$oldCode, $newCode] = $this->extractCodePair($normalized);
        [$year, $month] = $this->extractPeriod($lower);

        $looksLike = $this->looksLikeCodeChangeRequest($lower, $oldCode, $newCode);

        return [
            'looks_like_code_change_request' => $looksLike,
            'old_code' => $oldCode,
            'new_code' => $newCode,
            'year' => $year,
            'month' => $month,
        ];
    }

    private function looksLikeCodeChangeRequest(string $lower, ?string $oldCode, ?string $newCode): bool
    {
        if ($oldCode === null || $newCode === null) {
            return false;
        }

        return str_contains($lower, 'code week')
            || str_contains($lower, 'codeweek')
            || str_contains($lower, 'participation code')
            || str_contains($lower, 'change the code')
            || str_contains($lower, 'change code')
            || str_contains($lower, 'replace')
            || str_contains($lower, 'with the one')
            || (str_contains($lower, 'code') && str_contains($lower, 'activit'));
    }

    /**
     * @return array{0: ?string, 1: ?string}
     */
    private function extractCodePair(string $text): array
    {
        $patterns = [
            '/change\s+(?:the\s+)?code\s+('.self::CODE_PATTERN.')\s+with\s+(?:the\s+one\s+)?('.self::CODE_PATTERN.')/iu',
            '/change\s+(?:the\s+)?code\s+('.self::CODE_PATTERN.')\s+to\s+('.self::CODE_PATTERN.')/iu',
            '/replace\s+('.self::CODE_PATTERN.')\s+with\s+('.self::CODE_PATTERN.')/iu',
            '/('.self::CODE_PATTERN.')\s+(?:with|to)\s+(?:the\s+one\s+)?('.self::CODE_PATTERN.')/iu',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $m)) {
                return [$m[1], $m[2]];
            }
        }

        if (preg_match_all('/'.self::CODE_PATTERN.'/i', $text, $all) && count($all[0]) >= 2) {
            return [$all[0][0], $all[0][1]];
        }

        return [null, null];
    }

    /**
     * @return array{0: ?int, 1: ?int}
     */
    private function extractPeriod(string $lower): array
    {
        foreach (self::MONTHS as $name => $number) {
            if (preg_match('/\b'.preg_quote($name, '/').'\s+(\d{4})\b/', $lower, $m)) {
                return [(int) $m[1], $number];
            }
            if (preg_match('/\b(\d{4})\s+'.preg_quote($name, '/').'\b/', $lower, $m)) {
                return [(int) $m[1], $number];
            }
        }

        if (preg_match('/\b(?:registered|created)\s+in\s+(\d{4})\b/', $lower, $m)) {
            return [(int) $m[1], null];
        }

        return [null, null];
    }
}
