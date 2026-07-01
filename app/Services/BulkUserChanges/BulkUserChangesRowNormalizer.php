<?php

namespace App\Services\BulkUserChanges;

use Illuminate\Support\Str;

final class BulkUserChangesRowNormalizer
{
    /**
     * @param  array<string, mixed>  $raw
     * @return array{
     *   country: ?string,
     *   full_name: ?string,
     *   email: ?string,
     *   action: ?string,
     *   role: ?string,
     *   comments: ?string,
     *   operation: ?string,
     *   role_name: ?string,
     *   new_email: ?string,
     * }
     */
    public function normalize(array $raw): array
    {
        $country = $this->stringOrNull($raw['country'] ?? null);
        $fullName = $this->stringOrNull($raw['full_name'] ?? null);
        $email = $this->normalizeEmail($raw['email'] ?? null);
        $action = $this->normalizeToken($raw['action'] ?? null);
        $role = $this->stringOrNull($raw['role'] ?? null);
        $comments = $this->stringOrNull($raw['comments'] ?? null);

        $operation = null;
        $roleName = null;
        $newEmail = null;

        if ($email === null && $action === null) {
            return [
                'country' => $country,
                'full_name' => $fullName,
                'email' => $email,
                'action' => $action,
                'role' => $role,
                'comments' => $comments,
                'operation' => null,
                'role_name' => null,
                'new_email' => null,
            ];
        }

        if ($this->looksLikeEmailChange($action, $role)) {
            $operation = 'email_update';
            $newEmail = $this->extractEmailFromText((string) $role) ?? $this->extractEmailFromText((string) $comments);
        } elseif (in_array($action, ['add', 'grant', 'assign'], true)) {
            $operation = 'role_add';
            $roleName = $this->normalizeRoleName($role);
        } elseif (in_array($action, ['delete', 'remove', 'revoke'], true)) {
            $operation = 'role_remove';
            $roleName = $this->normalizeRoleName($role);
        } elseif ($action === 'change') {
            $operation = 'manual_review';
        } elseif ($action !== null && $action !== '') {
            $operation = 'manual_review';
        }

        if ($operation === 'role_add' || $operation === 'role_remove') {
            if ($roleName === null || $roleName === '') {
                $operation = 'manual_review';
            }
        }

        if ($operation === 'email_update' && ($newEmail === null || $email === null)) {
            $operation = 'manual_review';
        }

        if ($operation === 'role_remove' && ($roleName === null || $roleName === '') && $email !== null) {
            $operation = 'manual_review';
        }

        return [
            'country' => $country,
            'full_name' => $fullName,
            'email' => $email,
            'action' => $action,
            'role' => $role,
            'comments' => $comments,
            'operation' => $operation,
            'role_name' => $roleName,
            'new_email' => $newEmail,
        ];
    }

    private function looksLikeEmailChange(?string $action, ?string $role): bool
    {
        $haystack = mb_strtolower(trim((string) $action.' '.(string) $role));

        return str_contains($haystack, 'email change')
            || str_contains($haystack, 'e-mail update')
            || str_contains($haystack, 'email update')
            || str_contains($haystack, 'new email:');
    }

    private function normalizeRoleName(?string $role): ?string
    {
        if ($role === null) {
            return null;
        }

        $role = Str::of($role)->lower()->trim()->toString();
        if ($role === '') {
            return null;
        }

        if (str_contains($role, 'new email:')) {
            return null;
        }

        $role = preg_replace('/\b(role|roles)\b/', '', $role) ?? $role;
        $role = trim(preg_replace('/\s+/', ' ', $role) ?? '');

        return match (true) {
            str_contains($role, 'leading teacher') => 'leading teacher',
            str_contains($role, 'ambassador') => 'ambassador',
            str_contains($role, 'edu coordinator') => 'edu coordinator',
            default => $role,
        };
    }

    private function extractEmailFromText(string $text): ?string
    {
        if (preg_match('/[a-z0-9._%+\\-]+@[a-z0-9.\\-]+\\.[a-z]{2,}/i', $text, $m)) {
            return $this->normalizeEmail($m[0]);
        }

        return null;
    }

    private function normalizeEmail(mixed $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        $value = strtolower(trim($value, " \t\n\r\0\x0B;"));
        if ($value === '' || ! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return null;
        }

        return $value;
    }

    private function normalizeToken(mixed $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        $value = strtolower(trim($value));
        if ($value === '') {
            return null;
        }

        if (str_starts_with($value, 'add')) {
            return 'add';
        }

        return $value;
    }

    private function stringOrNull(mixed $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        $value = trim($value);

        return $value === '' ? null : $value;
    }
}
