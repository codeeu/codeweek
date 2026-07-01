<?php

namespace App\Services\Support;

use Illuminate\Support\Str;

/**
 * Extract an email-change request (from → to) from support ticket text.
 */
final class SupportEmailChangeRequestParser
{
    /**
     * @return array{from_email: ?string, to_email: ?string}
     */
    public function parse(string $text): array
    {
        $normalized = Str::of($text)->replace("\r\n", "\n")->toString();

        $from = $this->extractLabeledEmail($normalized, ['current', 'account', 'old', 'from']);
        $to = $this->extractLabeledEmail($normalized, ['new', 'to', 'updated']);

        if ($from === null) {
            $from = $this->extractLabeledEmail($normalized, ['email']);
            if ($to !== null && $from === $to) {
                $from = null;
            }
        }

        $emails = $this->extractAllEmails($normalized);
        if ($from === null && $to === null && count($emails) >= 2) {
            $from = $emails[0];
            $to = $emails[1];
        } elseif ($from === null && $to !== null) {
            $from = $this->firstEmailOtherThan($emails, $to);
        } elseif ($to === null && $from !== null) {
            $to = $this->firstEmailOtherThan($emails, $from);
        }

        return [
            'from_email' => $from,
            'to_email' => $to,
        ];
    }

    /**
     * @param list<string> $prefixes
     */
    private function extractLabeledEmail(string $text, array $prefixes): ?string
    {
        foreach ($prefixes as $prefix) {
            $pattern = '/(?:^|\n)\s*(?:'.preg_quote($prefix, '/').'\s+)?email(?:\s+address)?\s*(?:\(current\)|\(new\))?\s*[:*]\s*([^\n\r]+)/iu';
            if (preg_match($pattern, $text, $m)) {
                return $this->firstEmailInString($m[1]);
            }
        }

        return null;
    }

    private function firstEmailInString(string $value): ?string
    {
        preg_match('/[a-z0-9._%+\\-]+@[a-z0-9.\\-]+\\.[a-z]{2,}/i', $value, $m);

        return isset($m[0]) ? Str::lower(trim($m[0])) : null;
    }

    /**
     * @return list<string>
     */
    private function extractAllEmails(string $text): array
    {
        preg_match_all('/[a-z0-9._%+\\-]+@[a-z0-9.\\-]+\\.[a-z]{2,}/i', $text, $m);
        $emails = array_map(fn ($e) => Str::lower(trim($e)), $m[0] ?? []);

        return array_values(array_unique($emails));
    }

    /**
     * @param list<string> $emails
     */
    private function firstEmailOtherThan(array $emails, string $other): ?string
    {
        $other = Str::lower(trim($other));
        foreach ($emails as $email) {
            if ($email !== $other) {
                return $email;
            }
        }

        return null;
    }
}
