<?php

namespace App\Services;

use App\Event;
use App\Mail\PendingEmailChangeConfirmation;
use App\Mail\PendingEmailChangeNotification;
use App\Services\Support\SupportEmailAddress;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UserEmailChangeService
{
    public function requiresPassword(User $user): bool
    {
        return empty($user->provider);
    }

    /**
     * @return array{status: string}
     */
    public function requestChange(User $user, string $newEmail, ?string $password): array
    {
        $newEmail = SupportEmailAddress::normalize($newEmail);
        if ($newEmail === null) {
            throw ValidationException::withMessages([
                'new_email' => 'Please enter a valid email address.',
            ]);
        }

        $currentEmail = SupportEmailAddress::normalize((string) ($user->email ?? ''));
        if ($currentEmail !== null && $newEmail === $currentEmail) {
            throw ValidationException::withMessages([
                'new_email' => 'That is already your login email address.',
            ]);
        }

        if ($this->emailInUseByAnotherUser($newEmail, (int) $user->id)) {
            throw ValidationException::withMessages([
                'new_email' => 'That email address is already in use on another CodeWeek account.',
            ]);
        }

        if ($this->requiresPassword($user)) {
            if ($password === null || $password === '' || ! Hash::check($password, (string) $user->password)) {
                throw ValidationException::withMessages([
                    'current_password' => 'Your current password is incorrect.',
                ]);
            }
        }

        $user->pending_email = $newEmail;
        $token = $this->issuePendingToken($user);
        $this->dispatchConfirmationEmail($user, $newEmail, $token);
        $this->sendChangeNotification($user, $newEmail, $currentEmail);

        return ['status' => 'confirmation_sent'];
    }

    /**
     * @return array{status: string}
     */
    public function resendConfirmation(User $user): array
    {
        $pendingEmail = SupportEmailAddress::normalize((string) ($user->pending_email ?? ''));
        if ($pendingEmail === null || $user->pending_email_token === null) {
            throw ValidationException::withMessages([
                'pending_email' => 'There is no pending email change to confirm.',
            ]);
        }

        if ($this->emailInUseByAnotherUser($pendingEmail, (int) $user->id)) {
            $this->cancelPending($user);

            throw ValidationException::withMessages([
                'new_email' => 'That email address is already in use on another CodeWeek account.',
            ]);
        }

        $token = $this->issuePendingToken($user);
        $this->dispatchConfirmationEmail($user->fresh(), $pendingEmail, $token);

        return ['status' => 'confirmation_resent'];
    }

    private function issuePendingToken(User $user): string
    {
        $token = Str::random(64);
        $user->pending_email_token = hash('sha256', $token);
        $user->pending_email_requested_at = now();
        $user->save();

        return $token;
    }

    private function dispatchConfirmationEmail(User $user, string $newEmail, string $token): void
    {
        $confirmUrl = URL::temporarySignedRoute(
            'user.email-change.confirm',
            now()->addHours(48),
            ['user' => $user->id, 'token' => $token],
        );

        Mail::to($newEmail)->queue(new PendingEmailChangeConfirmation($user, $confirmUrl));
    }

    private function sendChangeNotification(User $user, string $newEmail, ?string $currentEmail): void
    {
        if ($currentEmail === null) {
            return;
        }

        Mail::to($currentEmail)->queue(new PendingEmailChangeNotification($user, $newEmail));
    }

    public function cancelPending(User $user): void
    {
        $user->pending_email = null;
        $user->pending_email_token = null;
        $user->pending_email_requested_at = null;
        $user->save();
    }

    /**
     * @throws ValidationException
     */
    public function confirmChange(int $userId, string $token): User
    {
        $user = User::findOrFail($userId);

        if ($user->pending_email === null || $user->pending_email_token === null) {
            throw ValidationException::withMessages([
                'token' => 'This email change request is no longer valid.',
            ]);
        }

        if (! hash_equals($user->pending_email_token, hash('sha256', $token))) {
            throw ValidationException::withMessages([
                'token' => 'This confirmation link is invalid.',
            ]);
        }

        $newEmail = SupportEmailAddress::normalize((string) $user->pending_email);
        if ($newEmail === null) {
            throw ValidationException::withMessages([
                'token' => 'This email change request is no longer valid.',
            ]);
        }

        if ($this->emailInUseByAnotherUser($newEmail, (int) $user->id)) {
            $this->cancelPending($user);

            throw ValidationException::withMessages([
                'new_email' => 'That email address is already in use on another CodeWeek account.',
            ]);
        }

        return DB::transaction(function () use ($user, $newEmail) {
            $oldEmail = SupportEmailAddress::normalize((string) ($user->email ?? ''));

            $this->applyEmailChange($user, $oldEmail, $newEmail);

            return $user->fresh();
        });
    }

    private function applyEmailChange(User $user, ?string $oldEmail, string $newEmail): void
    {
        $shouldUpdateDisplay = $oldEmail !== null
            && SupportEmailAddress::normalize((string) ($user->email_display ?? '')) === $oldEmail;

        $user->email = $newEmail;
        if ($shouldUpdateDisplay) {
            $user->email_display = $newEmail;
        }
        $user->email_verified_at = now();
        $user->pending_email = null;
        $user->pending_email_token = null;
        $user->pending_email_requested_at = null;
        $user->save();

        if ($oldEmail !== null) {
            Event::query()
                ->where('creator_id', $user->id)
                ->whereRaw('LOWER(user_email) = ?', [$oldEmail])
                ->update(['user_email' => $newEmail]);
        }
    }

    private function emailInUseByAnotherUser(string $email, int $exceptUserId): bool
    {
        return User::withTrashed()
            ->where('id', '<>', $exceptUserId)
            ->where(function ($query) use ($email) {
                $query->whereRaw('LOWER(email) = ?', [$email])
                    ->orWhereRaw('LOWER(email_display) = ?', [$email]);
            })
            ->exists();
    }
}
