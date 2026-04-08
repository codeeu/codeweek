<?php

namespace App\Services\Support;

use App\Event;
use App\User;
use Illuminate\Support\Str;

class UserAuditService
{
    public function audit(string $email): array
    {
        $normalized = trim(Str::lower($email));

        $matches = User::withTrashed()
            ->whereRaw('LOWER(email) = ?', [$normalized])
            ->orWhereRaw('LOWER(email_display) = ?', [$normalized])
            ->get();

        $users = $matches->map(function (User $user) {
            $roles = $user->roles->pluck('name')->values()->all();

            $eventsTotal = Event::query()->where('creator_id', $user->id)->count();
            $eventsApproved = Event::query()->where('creator_id', $user->id)->where('status', 'APPROVED')->count();
            $certificatesCount = Event::query()
                ->where('creator_id', $user->id)
                ->whereNotNull('certificate_url')
                ->count();

            return [
                'id' => $user->id,
                'email' => $user->email,
                'email_display' => $user->email_display,
                'deleted_at' => optional($user->deleted_at)->toISOString(),
                'is_deleted' => $user->deleted_at !== null,
                'roles' => $roles,
                'counts' => [
                    'events_total' => $eventsTotal,
                    'events_approved' => $eventsApproved,
                    'certificates_on_events' => $certificatesCount,
                ],
            ];
        })->values()->all();

        $duplicateRisk = count($users) > 1 ? 'high' : (count($users) === 1 ? 'low' : 'none');

        $recommendedNextAction = match (true) {
            count($users) === 0 => 'no_user_found',
            count($users) > 1 => 'investigate_duplicate_account',
            $users[0]['is_deleted'] === true => 'consider_restore',
            default => 'investigate_issue',
        };

        return [
            'normalized_email' => $normalized,
            'matched_users' => $users,
            'duplicate_risk' => $duplicateRisk,
            'recommended_next_action' => $recommendedNextAction,
        ];
    }
}

