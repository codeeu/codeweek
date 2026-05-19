<?php

namespace App\Services\Support\Gmail;

/**
 * Builds the Gmail search query for support:gmail:poll.
 * Prefer subject prefix over inbox labels so operators do not touch the mailbox.
 */
final class SupportGmailPollQuery
{
    public static function resolve(): string
    {
        $parts = [];

        $prefix = trim((string) config('support_gmail.subject_prefix', ''));
        $baseQuery = trim((string) config('support_gmail.query', 'newer_than:90d'));

        if ($prefix !== '' && !self::queryContainsSubjectFilter($baseQuery)) {
            $parts[] = 'subject:'.self::quoteGmailSearchTerm($prefix);
        }

        if ($baseQuery !== '') {
            $parts[] = $baseQuery;
        }

        if ($parts === []) {
            return 'newer_than:90d';
        }

        return implode(' ', $parts);
    }

    private static function queryContainsSubjectFilter(string $query): bool
    {
        return (bool) preg_match('/\bsubject:/i', $query);
    }

    private static function quoteGmailSearchTerm(string $term): string
    {
        if (preg_match('/[\s"\']/', $term)) {
            return '"'.str_replace('"', '', $term).'"';
        }

        return $term;
    }
}
