<?php

namespace App\Services\Support;

/**
 * Extract a certificate KPI date window from support ticket text.
 */
final class CertificateKpiRequestParser
{
    private const DATE_PATTERN = '\d{1,2}[.\/\-]\d{1,2}[.\/\-]\d{4}|\d{4}-\d{2}-\d{2}';

    /**
     * @return array{start: ?string, end: ?string, looks_like_kpi_request: bool}
     */
    public function parse(string $text): array
    {
        $normalized = str_replace("\r\n", "\n", $text);
        $lower = mb_strtolower($normalized);

        $looksLikeKpi = $this->looksLikeKpiRequest($lower);
        [$start, $end] = $this->extractDateRange($normalized);

        return [
            'start' => $start,
            'end' => $end,
            'looks_like_kpi_request' => $looksLikeKpi,
        ];
    }

    private function looksLikeKpiRequest(string $lower): bool
    {
        if (!str_contains($lower, 'certificate') && !str_contains($lower, 'cert')) {
            return false;
        }

        return str_contains($lower, 'kpi')
            || str_contains($lower, 'dashboard')
            || str_contains($lower, 'database')
            || str_contains($lower, 'statistics')
            || str_contains($lower, 'stats')
            || str_contains($lower, 'provide the information')
            || str_contains($lower, 'between')
            || str_contains($lower, 'super organiser')
            || str_contains($lower, 'excellence');
    }

    /**
     * @return array{0: ?string, 1: ?string}
     */
    private function extractDateRange(string $text): array
    {
        $patterns = [
            '/between\s+('.self::DATE_PATTERN.')\s+(?:and|to)\s+('.self::DATE_PATTERN.')/iu',
            '/from\s+('.self::DATE_PATTERN.')\s+(?:to|until|-)\s+('.self::DATE_PATTERN.')/iu',
            '/('.self::DATE_PATTERN.')\s*(?:to|–|—|-)\s*('.self::DATE_PATTERN.')/u',
            '/data\s+between\s+('.self::DATE_PATTERN.')\s+(?:and|to)\s+('.self::DATE_PATTERN.')/iu',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $m)) {
                return [trim($m[1]), trim($m[2])];
            }
        }

        return [null, null];
    }
}
