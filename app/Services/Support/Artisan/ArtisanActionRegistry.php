<?php

namespace App\Services\Support\Artisan;

/**
 * Allowlist of artisan commands the support AI may run on the server, with
 * per-argument validation. The AI can only select from these; anything else
 * must go through the guarded raw-command fallback (ArtisanCommandRunner).
 */
class ArtisanActionRegistry
{
    /**
     * @return array<string, array{
     *   description: string,
     *   is_write: bool,
     *   supports_dry_run: bool,
     *   arguments: array<string, array{type: string, required: bool}>,
     *   options: array<string, array{type: string}>
     * }>
     */
    public function all(): array
    {
        return [
            'support:user-audit' => [
                'description' => 'Audit a user by email (read-only).',
                'is_write' => false,
                'supports_dry_run' => false,
                'arguments' => ['email' => ['type' => 'email', 'required' => true]],
                'options' => ['--json' => ['type' => 'flag']],
            ],
            'support:event-audit' => [
                'description' => 'Audit an event by identifier/code (read-only).',
                'is_write' => false,
                'supports_dry_run' => false,
                'arguments' => ['identifier' => ['type' => 'token', 'required' => true]],
                'options' => ['--json' => ['type' => 'flag']],
            ],
            'support:certificate-kpi-report' => [
                'description' => 'Certificate KPI counts for a date window (Organiser, Excellence, Super Organiser).',
                'is_write' => false,
                'supports_dry_run' => false,
                'arguments' => [
                    'start' => ['type' => 'date', 'required' => true],
                    'end' => ['type' => 'date', 'required' => true],
                ],
                'options' => ['--json' => ['type' => 'flag']],
            ],
            'support:user-restore' => [
                'description' => 'Restore a soft-deleted user.',
                'is_write' => true,
                'supports_dry_run' => true,
                'arguments' => ['email' => ['type' => 'email', 'required' => true]],
                'options' => ['--json' => ['type' => 'flag']],
            ],
            'support:user-update-profile' => [
                'description' => 'Update a user first/last name.',
                'is_write' => true,
                'supports_dry_run' => true,
                'arguments' => ['email' => ['type' => 'email', 'required' => true]],
                'options' => [
                    '--firstname' => ['type' => 'name'],
                    '--lastname' => ['type' => 'name'],
                    '--json' => ['type' => 'flag'],
                ],
            ],
            'support:event-participation-code-update' => [
                'description' => 'Change Code Week 4 All participation code on scoped events.',
                'is_write' => true,
                'supports_dry_run' => true,
                'arguments' => [
                    'old_code' => ['type' => 'participation_code', 'required' => true],
                    'new_code' => ['type' => 'participation_code', 'required' => true],
                ],
                'options' => [
                    '--year' => ['type' => 'year'],
                    '--month' => ['type' => 'month'],
                    '--json' => ['type' => 'flag'],
                ],
            ],
        ];
    }

    public function has(string $command): bool
    {
        return array_key_exists($command, $this->all());
    }

    /**
     * @return array<string, mixed>|null
     */
    public function get(string $command): ?array
    {
        return $this->all()[$command] ?? null;
    }

    public function isWrite(string $command): bool
    {
        return (bool) ($this->get($command)['is_write'] ?? false);
    }

    public function supportsDryRun(string $command): bool
    {
        return (bool) ($this->get($command)['supports_dry_run'] ?? false);
    }

    /**
     * Validate a value against a named arg/option type.
     */
    public function validateValue(string $type, mixed $value): bool
    {
        if ($type === 'flag') {
            return true;
        }
        if (!is_string($value) || trim($value) === '') {
            return false;
        }

        return match ($type) {
            'email' => filter_var(trim($value), FILTER_VALIDATE_EMAIL) !== false,
            'date' => (bool) preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($value))
                || (bool) preg_match('/^\d{1,2}[.\/\-]\d{1,2}[.\/\-]\d{4}$/', trim($value)),
            // Event codes / identifiers: letters, digits, dot, dash, underscore.
            'token' => (bool) preg_match('/^[A-Za-z0-9._-]{1,64}$/', trim($value)),
            'participation_code' => (bool) preg_match('/^cw\d{2}-[A-Za-z0-9]+$/', trim($value)),
            'year' => (bool) preg_match('/^(20\d{2}|2100)$/', trim($value)),
            'month' => (bool) preg_match('/^([1-9]|1[0-2])$/', trim($value)),
            // Names: no shell metacharacters or control chars.
            'name' => (bool) preg_match('/^[^\x00-\x1f;|&$`<>\\\\"\']{1,80}$/u', trim($value)),
            default => false,
        };
    }
}
