<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Accepts absolute URLs, site-relative paths, or hash anchors (e.g. #key-one-pagers).
 * Laravel's built-in "url" rule rejects anchors and many relative paths used in CTAs.
 */
class FlexibleUrlOrAnchor implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value === null || $value === '') {
            return;
        }

        $value = trim((string) $value);

        if (preg_match('/^#([a-zA-Z0-9_-]+)$/', $value) === 1) {
            return;
        }

        // Site-relative path (single leading slash, not protocol-relative)
        if (str_starts_with($value, '/') && ! str_starts_with($value, '//')) {
            return;
        }

        if (filter_var($value, FILTER_VALIDATE_URL) !== false) {
            return;
        }

        $fail('Must be a valid URL, a path starting with /, or an anchor like #section-id.');
    }
}
