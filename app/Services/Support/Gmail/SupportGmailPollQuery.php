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
        $approvalPrefix = trim((string) config('support_gmail.approval_subject_prefix', '[CW-SUPPORT'));
        $baseQuery = trim((string) config('support_gmail.query', 'newer_than:90d'));

        if ($prefix !== '' && !self::queryContainsSubjectFilter($baseQuery)) {
            // Ingest new tickets (codeweek-support) and APPROVE replies (Re: [CW-SUPPORT #…]).
            $subjectFilters = ['subject:'.self::quoteGmailSearchTerm($prefix)];
            if ($approvalPrefix !== '' && !self::sameSearchTerm($prefix, $approvalPrefix)) {
                $approvalSubject = 'subject:'.self::quoteGmailSearchTerm($approvalPrefix);
                $notify = trim((string) config('support_gmail.notify_email'));
                if ($notify !== '') {
                    // Exclude our own dry-run / completion emails from the approval poll.
                    $approvalSubject .= ' -from:'.self::quoteGmailFromAddress($notify);
                }
                $subjectFilters[] = $approvalSubject;
            }
            $parts[] = count($subjectFilters) === 1
                ? $subjectFilters[0]
                : '('.implode(' OR ', $subjectFilters).')';
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
        if (preg_match('/[\s"\'\[\]#]/', $term)) {
            return '"'.str_replace('"', '', $term).'"';
        }

        return $term;
    }

    private static function sameSearchTerm(string $a, string $b): bool
    {
        return strcasecmp(trim($a), trim($b)) === 0;
    }

    private static function quoteGmailFromAddress(string $email): string
    {
        return self::quoteGmailSearchTerm(trim($email));
    }
}
