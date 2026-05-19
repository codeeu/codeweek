<?php

namespace App\Services\Support;

final class SupportSenderAllowlist
{
    /**
     * @return string[]
     */
    public function allowedDomains(): array
    {
        $domains = config('support_gmail.allowed_sender_domains', []);

        return array_values(array_filter(array_map(
            fn ($d) => strtolower(trim((string) $d)),
            is_array($domains) ? $domains : [],
        )));
    }

    /**
     * @return string[]
     */
    public function allowedEmails(): array
    {
        $emails = config('support_gmail.allowed_sender_emails', []);

        return array_values(array_filter(array_map(
            fn ($e) => SupportEmailAddress::normalize((string) $e),
            is_array($emails) ? $emails : [],
        )));
    }

    public function isAllowed(?string $fromHeader): bool
    {
        $email = SupportEmailAddress::fromHeader($fromHeader);
        if ($email === null) {
            return false;
        }

        if (in_array($email, $this->allowedEmails(), true)) {
            return true;
        }

        $domain = SupportEmailAddress::domain($email);
        if ($domain === null) {
            return false;
        }

        foreach ($this->allowedDomains() as $allowed) {
            if ($domain === $allowed || str_ends_with($domain, '.'.$allowed)) {
                return true;
            }
        }

        return false;
    }
}
