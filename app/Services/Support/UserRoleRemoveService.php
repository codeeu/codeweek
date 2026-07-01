<?php

namespace App\Services\Support;

use App\Models\Support\SupportCase;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

/**
 * Remove a role from one or more users (batch), with dry-run preview and email-approval gating.
 */
class UserRoleRemoveService
{
    public function __construct(
        private readonly SupportRoleRequestResolver $resolver,
    ) {
    }

    public function removeFromCase(SupportCase $case, bool $dryRun, bool $viaEmailApproval = false): array
    {
        $resolved = $this->resolver->resolve($case);

        return $this->removeRole(
            case: $case,
            roleName: $resolved['role'],
            emails: $resolved['emails'],
            dryRun: $dryRun,
            viaEmailApproval: $viaEmailApproval,
            operation: $resolved['operation'],
        );
    }

    /**
     * @param  list<string>  $emails
     */
    public function removeRole(
        SupportCase $case,
        ?string $roleName,
        array $emails,
        bool $dryRun,
        bool $viaEmailApproval = false,
        string $operation = 'remove',
    ): array {
        $tool = 'user_role_remove';
        $input = [
            'operation' => $operation,
            'role' => $roleName,
            'emails' => $emails,
            'dry_run' => $dryRun,
        ];

        if ($operation !== 'remove') {
            return SupportJson::fail($tool, $input, 'only_remove_operation_supported');
        }

        if ($roleName === null || trim($roleName) === '') {
            return SupportJson::fail($tool, $input, 'no_role_specified');
        }

        $role = $this->resolveRole($roleName);
        if ($role === null) {
            return SupportJson::fail($tool, $input, 'role_not_found:'.$roleName);
        }

        if (! $this->roleIsAllowed($role->name)) {
            return SupportJson::fail($tool, $input, 'role_not_allowed:'.$role->name);
        }

        $emails = $this->normalizeEmails($emails);
        if ($emails === []) {
            return SupportJson::fail($tool, $input, 'no_target_emails');
        }

        if (! $dryRun && config('support_gmail.dry_run') && ! $viaEmailApproval) {
            return SupportJson::fail($tool, $input, 'dry_run_mode_requires_email_approval');
        }

        $items = [];
        $counts = ['removed' => 0, 'would_remove' => 0, 'does_not_have_role' => 0, 'user_not_found' => 0, 'ambiguous' => 0];

        foreach ($emails as $email) {
            $item = $this->processEmail($case, $role, $email, $dryRun);
            $items[] = $item;
            $counts[$item['status']] = ($counts[$item['status']] ?? 0) + 1;
        }

        $warnings = [];
        if ($this->roleLooksPrivileged($role->name)) {
            $warnings[] = 'privileged_role_removed:'.$role->name;
        }

        return SupportJson::ok($tool, $input, [
            'operation' => 'remove',
            'role' => $role->name,
            'dry_run' => $dryRun,
            'summary' => $counts,
            'items' => $items,
        ], $warnings);
    }

    /**
     * @return array{email: string, status: string, user_id: ?int, matched_user_ids: list<int>}
     */
    private function processEmail(SupportCase $case, Role $role, string $email, bool $dryRun): array
    {
        $matches = User::query()
            ->whereRaw('LOWER(email) = ?', [$email])
            ->orWhereRaw('LOWER(email_display) = ?', [$email])
            ->get();

        if ($matches->isEmpty()) {
            return ['email' => $email, 'status' => 'user_not_found', 'user_id' => null, 'matched_user_ids' => []];
        }

        if ($matches->count() > 1) {
            return [
                'email' => $email,
                'status' => 'ambiguous',
                'user_id' => null,
                'matched_user_ids' => $matches->pluck('id')->map(fn ($id) => (int) $id)->values()->all(),
            ];
        }

        /** @var User $user */
        $user = $matches->first();

        if (! $user->hasRole($role->name)) {
            return ['email' => $email, 'status' => 'does_not_have_role', 'user_id' => (int) $user->id, 'matched_user_ids' => [(int) $user->id]];
        }

        if ($dryRun) {
            return ['email' => $email, 'status' => 'would_remove', 'user_id' => (int) $user->id, 'matched_user_ids' => [(int) $user->id]];
        }

        DB::transaction(fn () => $user->removeRole($role->name));

        return ['email' => $email, 'status' => 'removed', 'user_id' => (int) $user->id, 'matched_user_ids' => [(int) $user->id]];
    }

    private function resolveRole(string $roleName): ?Role
    {
        $guard = (string) config('auth.defaults.guard', 'web');
        $needle = $this->normalizeRoleName($roleName);

        $roles = Role::query()->get();

        $exact = $roles->first(fn (Role $r) => $this->normalizeRoleName($r->name) === $needle && $r->guard_name === $guard)
            ?? $roles->first(fn (Role $r) => $this->normalizeRoleName($r->name) === $needle);
        if ($exact !== null) {
            return $exact;
        }

        $singular = $this->singularizeRoleName($needle);
        $bySingular = $roles->first(fn (Role $r) => $this->singularizeRoleName($this->normalizeRoleName($r->name)) === $singular && $r->guard_name === $guard)
            ?? $roles->first(fn (Role $r) => $this->singularizeRoleName($this->normalizeRoleName($r->name)) === $singular);

        return $bySingular;
    }

    private function roleIsAllowed(string $roleName): bool
    {
        $allowed = config('support_gmail.role_add_allowed_roles', []);
        $allowed = is_array($allowed) ? array_filter(array_map('trim', $allowed)) : [];

        if ($allowed === []) {
            return true;
        }

        $needle = $this->normalizeRoleName($roleName);
        foreach ($allowed as $candidate) {
            if ($this->normalizeRoleName((string) $candidate) === $needle) {
                return true;
            }
        }

        return false;
    }

    private function roleLooksPrivileged(string $roleName): bool
    {
        return (bool) preg_match('/\b(admin|administrator|super|owner|root|staff)\b/i', $roleName);
    }

    private function normalizeRoleName(string $roleName): string
    {
        return Str::of($roleName)->lower()->replaceMatches('/\s+/', ' ')->trim()->toString();
    }

    private function singularizeRoleName(string $roleName): string
    {
        $words = explode(' ', $roleName);
        $last = array_pop($words);
        if ($last !== null) {
            $words[] = Str::singular($last);
        }

        return implode(' ', $words);
    }

    /**
     * @param  list<string>  $emails
     * @return list<string>
     */
    private function normalizeEmails(array $emails): array
    {
        $out = [];
        foreach ($emails as $email) {
            $normalized = SupportEmailAddress::normalize((string) $email);
            if ($normalized !== null && $normalized !== '' && filter_var($normalized, FILTER_VALIDATE_EMAIL)) {
                $out[$normalized] = $normalized;
            }
        }

        return array_values($out);
    }
}
