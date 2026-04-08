<?php

namespace App\Services\Support;

use App\Event;
use App\User;
use Illuminate\Support\Str;

class EventAuditService
{
    public function audit(string $identifier): array
    {
        $tool = 'event_audit';
        $input = ['identifier' => $identifier];

        $context = $this->resolveContext($identifier);
        if (!$context['ok']) {
            return SupportJson::fail($tool, $input, $context['errors']);
        }

        $userId = $context['user_id'];
        $events = Event::query()->where('creator_id', $userId);

        $countsByStatus = $events
            ->clone()
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->orderBy('status')
            ->get()
            ->map(fn ($row) => ['status' => $row->status, 'count' => (int) $row->count])
            ->values()
            ->all();

        $distinctUserEmails = $events
            ->clone()
            ->whereNotNull('user_email')
            ->distinct()
            ->pluck('user_email')
            ->map(fn ($e) => Str::lower(trim((string) $e)))
            ->unique()
            ->values()
            ->all();

        $user = User::withTrashed()->find($userId);
        $primaryEmail = $user?->email ? Str::lower(trim($user->email)) : null;

        $mismatch = null;
        if ($primaryEmail !== null && count($distinctUserEmails) > 0) {
            $mismatch = !in_array($primaryEmail, $distinctUserEmails, true);
        }

        return SupportJson::ok($tool, $input, [
            'resolved_user' => $context['resolved_user'],
            'counts_by_status' => $countsByStatus,
            'distinct_event_user_emails' => $distinctUserEmails,
            'creator_vs_user_email_mismatch_suspected' => $mismatch,
        ]);
    }

    private function resolveContext(string $identifier): array
    {
        $trimmed = trim($identifier);

        if (ctype_digit($trimmed)) {
            $user = User::withTrashed()->find((int) $trimmed);
            if (!$user) {
                return ['ok' => false, 'errors' => ['user_not_found_by_id']];
            }

            return [
                'ok' => true,
                'user_id' => $user->id,
                'resolved_user' => ['id' => $user->id, 'email' => $user->email, 'email_display' => $user->email_display],
            ];
        }

        $email = Str::lower($trimmed);
        $matches = User::withTrashed()
            ->whereRaw('LOWER(email) = ?', [$email])
            ->orWhereRaw('LOWER(email_display) = ?', [$email])
            ->get();

        if ($matches->isEmpty()) {
            return ['ok' => false, 'errors' => ['user_not_found_by_email']];
        }

        if ($matches->count() !== 1) {
            return ['ok' => false, 'errors' => ['ambiguous_user_match']];
        }

        $user = $matches->first();

        return [
            'ok' => true,
            'user_id' => $user->id,
            'resolved_user' => ['id' => $user->id, 'email' => $user->email, 'email_display' => $user->email_display],
        ];
    }
}

