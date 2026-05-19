<?php

namespace App\Services\Support;

final class SupportEmailAddress
{
    public static function fromHeader(?string $header): ?string
    {
        if ($header === null || trim($header) === '') {
            return null;
        }

        if (preg_match('/<([^>]+)>/', $header, $matches)) {
            return self::normalize($matches[1]);
        }

        return self::normalize($header);
    }

    public static function normalize(string $email): ?string
    {
        $email = strtolower(trim($email));
        if ($email === '' || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            return null;
        }

        return $email;
    }

    public static function domain(?string $email): ?string
    {
        if ($email === null) {
            return null;
        }

        $at = strrpos($email, '@');
        if ($at === false) {
            return null;
        }

        return substr($email, $at + 1);
    }
}
