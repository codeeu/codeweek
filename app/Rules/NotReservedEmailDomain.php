<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Rejects emails on RFC 2606 / RFC 6761 reserved testing domains
 * (.invalid, .test, .example, .localhost) so probe accounts cannot
 * create pending activities that land in ambassador moderation queues.
 */
class NotReservedEmailDomain implements ValidationRule
{
    public const RESERVED_TLDS = [
        'invalid',
        'test',
        'example',
        'localhost',
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value === null || $value === '') {
            return;
        }

        $email = strtolower(trim((string) $value));
        $at = strrpos($email, '@');

        if ($at === false) {
            return;
        }

        $domain = substr($email, $at + 1);
        $labels = explode('.', $domain);
        $tld = end($labels);

        if ($tld !== false && in_array($tld, self::RESERVED_TLDS, true)) {
            $fail('Please enter a real email address. Test domains are not allowed.');
        }
    }

    public static function matches(string $email): bool
    {
        $email = strtolower(trim($email));
        $at = strrpos($email, '@');

        if ($at === false) {
            return false;
        }

        $domain = substr($email, $at + 1);
        $labels = explode('.', $domain);
        $tld = end($labels);

        return $tld !== false && in_array($tld, self::RESERVED_TLDS, true);
    }
}
