<?php

namespace App\Services\BulkUserChanges;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

final class BulkUserChangesPlanner
{
    public function __construct(
        private readonly BulkUserChangesCountryResolver $countries,
    ) {
    }

    /**
     * @param  list<array<string, mixed>>  $rows
     */
    public function plan(array $rows): BulkUserChangesResult
    {
        $result = new BulkUserChangesResult;

        foreach ($rows as $row) {
            $result->addRow($this->planRow($row, dryRun: true));
        }

        return $result;
    }

    /**
     * @param  list<array<string, mixed>>  $rows
     */
    public function apply(array $rows): BulkUserChangesResult
    {
        $result = new BulkUserChangesResult;

        foreach ($rows as $row) {
            $result->addRow($this->planRow($row, dryRun: false));
        }

        return $result;
    }

    /**
     * @param  array<string, mixed>  $row
     * @return array<string, mixed>
     */
    private function planRow(array $row, bool $dryRun): array
    {
        $base = [
            'row_number' => (int) ($row['row_number'] ?? 0),
            'country' => $row['country'] ?? null,
            'full_name' => $row['full_name'] ?? null,
            'email' => $row['email'] ?? null,
            'action' => $row['action'] ?? null,
            'role' => $row['role'] ?? null,
            'operation' => $row['operation'] ?? null,
            'planned_changes' => [],
            'messages' => [],
        ];

        $operation = (string) ($row['operation'] ?? '');

        if ($operation === '' || $operation === 'manual_review') {
            return $base + [
                'bucket' => 'skipped_manual_review',
                'status' => 'skipped',
                'message' => 'Needs manual review (unrecognised or unsupported action).',
            ];
        }

        $email = (string) ($row['email'] ?? '');
        if ($email === '') {
            return $base + [
                'bucket' => 'skipped_no_email',
                'status' => 'skipped',
                'message' => 'No email address on this row.',
            ];
        }

        $targetCountryIso = $this->countries->resolveIso($row['country'] ?? null);
        if (($row['country'] ?? null) && $targetCountryIso === null) {
            return $base + [
                'bucket' => 'skipped_unknown_country',
                'status' => 'skipped',
                'message' => 'Could not match country "'.($row['country'] ?? '').'" to a CodeWeek country.',
            ];
        }

        $matches = $this->findUsersByEmail($email);
        if ($matches->isEmpty()) {
            return $base + [
                'bucket' => 'skipped_user_not_found',
                'status' => 'skipped',
                'message' => 'No CodeWeek account found for '.$email.' (users are never created automatically).',
            ];
        }

        if ($matches->count() > 1) {
            return $base + [
                'bucket' => 'skipped_ambiguous',
                'status' => 'skipped',
                'message' => 'Multiple accounts match '.$email.' — needs manual review.',
                'matched_user_ids' => $matches->pluck('id')->map(fn ($id) => (int) $id)->values()->all(),
            ];
        }

        /** @var User $user */
        $user = $matches->first();
        $base['user_id'] = (int) $user->id;
        $changes = [];

        if ($targetCountryIso !== null && (string) $user->country_iso !== (string) $targetCountryIso) {
            $changes[] = [
                'type' => 'country_update',
                'from' => $user->country_iso,
                'to' => $targetCountryIso,
            ];
        }

        if ($operation === 'role_add') {
            $role = $this->resolveRole((string) ($row['role_name'] ?? ''));
            if ($role === null) {
                return $base + [
                    'bucket' => 'skipped_unknown_role',
                    'status' => 'skipped',
                    'message' => 'Unknown role "'.($row['role_name'] ?? '').'".',
                ];
            }

            if ($user->hasRole($role->name)) {
                return $this->finalizeRow($base, $changes, 'skipped_already_has_role', 'skipped', 'Already has role "'.$role->name.'".', $dryRun, $user);
            }

            $changes[] = ['type' => 'role_add', 'role' => $role->name];

            return $this->finalizeRow($base, $changes, $dryRun ? 'would_apply' : 'applied', $dryRun ? 'planned' : 'applied', $this->describeChanges($changes, $dryRun), $dryRun, $user);
        }

        if ($operation === 'role_remove') {
            $role = $this->resolveRole((string) ($row['role_name'] ?? ''));
            if ($role === null) {
                return $base + [
                    'bucket' => 'skipped_unknown_role',
                    'status' => 'skipped',
                    'message' => 'Unknown role "'.($row['role_name'] ?? '').'".',
                ];
            }

            if (! $user->hasRole($role->name)) {
                return $this->finalizeRow($base, $changes, 'skipped_no_role', 'skipped', 'Does not have role "'.$role->name.'".', $dryRun, $user);
            }

            $changes[] = ['type' => 'role_remove', 'role' => $role->name];

            return $this->finalizeRow($base, $changes, $dryRun ? 'would_apply' : 'applied', $dryRun ? 'planned' : 'applied', $this->describeChanges($changes, $dryRun), $dryRun, $user);
        }

        if ($operation === 'email_update') {
            $newEmail = (string) ($row['new_email'] ?? '');
            if ($newEmail === '') {
                return $base + [
                    'bucket' => 'skipped_manual_review',
                    'status' => 'skipped',
                    'message' => 'Email change requested but no new email could be parsed.',
                ];
            }

            if (strcasecmp((string) $user->email, $newEmail) === 0) {
                return $this->finalizeRow($base, $changes, 'skipped_no_change', 'skipped', 'Account already uses '.$newEmail.'.', $dryRun, $user);
            }

            if ($this->emailInUseByAnotherUser($newEmail, (int) $user->id)) {
                return $base + [
                    'bucket' => 'skipped_email_in_use',
                    'status' => 'skipped',
                    'message' => 'New email '.$newEmail.' is already used by another account.',
                ];
            }

            $changes[] = [
                'type' => 'email_update',
                'from' => $user->email,
                'to' => $newEmail,
                'update_display' => strcasecmp((string) ($user->email_display ?? ''), $email) === 0,
            ];

            return $this->finalizeRow($base, $changes, $dryRun ? 'would_apply' : 'applied', $dryRun ? 'planned' : 'applied', $this->describeChanges($changes, $dryRun), $dryRun, $user);
        }

        return $base + [
            'bucket' => 'skipped_manual_review',
            'status' => 'skipped',
            'message' => 'Unsupported operation.',
        ];
    }

    /**
     * @param  list<array<string, mixed>>  $changes
     * @return array<string, mixed>
     */
    private function finalizeRow(array $base, array $changes, string $bucket, string $status, string $message, bool $dryRun, User $user): array
    {
        if ($changes !== [] && ! $dryRun) {
            $this->applyChanges($user, $changes);
        }

        return $base + [
            'bucket' => $bucket,
            'status' => $status,
            'message' => $message,
            'planned_changes' => $changes,
        ];
    }

    /**
     * @param  list<array<string, mixed>>  $changes
     */
    private function applyChanges(User $user, array $changes): void
    {
        DB::transaction(function () use ($user, $changes) {
            foreach ($changes as $change) {
                match ($change['type']) {
                    'country_update' => $user->update(['country_iso' => $change['to']]),
                    'role_add' => $user->assignRole((string) $change['role']),
                    'role_remove' => $user->removeRole((string) $change['role']),
                    'email_update' => $this->applyEmailUpdate($user, $change),
                    default => null,
                };
            }
        });
    }

    /**
     * @param  array<string, mixed>  $change
     */
    private function applyEmailUpdate(User $user, array $change): void
    {
        $user->email = (string) $change['to'];
        if (($change['update_display'] ?? false) === true) {
            $user->email_display = (string) $change['to'];
        }
        if (property_exists($user, 'email_verified_at')) {
            $user->email_verified_at = null;
        }
        $user->save();
    }

    /**
     * @param  list<array<string, mixed>>  $changes
     */
    private function describeChanges(array $changes, bool $dryRun): string
    {
        $prefix = $dryRun ? 'Will ' : '';
        $parts = [];

        foreach ($changes as $change) {
            $parts[] = match ($change['type']) {
                'country_update' => $prefix.'set country to '.$change['to'],
                'role_add' => $prefix.'add role "'.$change['role'].'"',
                'role_remove' => $prefix.'remove role "'.$change['role'].'"',
                'email_update' => $prefix.'change email '.$change['from'].' → '.$change['to'],
                default => $prefix.'update account',
            };
        }

        return implode('; ', $parts).'.';
    }

    /**
     * @return Collection<int, User>
     */
    private function findUsersByEmail(string $email): Collection
    {
        $normalized = strtolower(trim($email));

        return User::query()
            ->whereRaw('LOWER(email) = ?', [$normalized])
            ->orWhereRaw('LOWER(email_display) = ?', [$normalized])
            ->get();
    }

    private function emailInUseByAnotherUser(string $email, int $exceptUserId): bool
    {
        $normalized = strtolower(trim($email));

        return User::withTrashed()
            ->where('id', '<>', $exceptUserId)
            ->where(function ($q) use ($normalized) {
                $q->whereRaw('LOWER(email) = ?', [$normalized])
                    ->orWhereRaw('LOWER(email_display) = ?', [$normalized]);
            })
            ->exists();
    }

    private function resolveRole(string $roleName): ?Role
    {
        if ($roleName === '') {
            return null;
        }

        $guard = (string) config('auth.defaults.guard', 'web');
        $needle = Str::of($roleName)->lower()->replaceMatches('/\s+/', ' ')->trim()->toString();
        $roles = Role::query()->get();

        $exact = $roles->first(fn (Role $r) => Str::lower($r->name) === $needle && $r->guard_name === $guard)
            ?? $roles->first(fn (Role $r) => Str::lower($r->name) === $needle);

        if ($exact !== null) {
            return $exact;
        }

        $words = explode(' ', $needle);
        $last = array_pop($words);
        if ($last !== null) {
            $words[] = Str::singular($last);
        }
        $singular = implode(' ', $words);

        return $roles->first(fn (Role $r) => Str::lower($r->name) === $singular);
    }
}
