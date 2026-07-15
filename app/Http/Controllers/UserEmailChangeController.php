<?php

namespace App\Http\Controllers;

use App\Services\UserEmailChangeService;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserEmailChangeController extends Controller
{
    public function __construct(
        private readonly UserEmailChangeService $emailChangeService,
    ) {
    }

    public function request(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'new_email' => 'required|email|max:255',
            'current_password' => $this->emailChangeService->requiresPassword($user)
                ? 'required|string|max:72'
                : 'nullable|string|max:72',
        ]);

        $this->emailChangeService->requestChange(
            $user,
            $validated['new_email'],
            $validated['current_password'] ?? null,
        );

        return back()->with(
            'email_change_status',
            'We sent a confirmation link to '.$user->fresh()->pending_email.'. Click it to finish updating your login email.',
        );
    }

    public function confirm(Request $request, User $user, string $token): RedirectResponse
    {
        try {
            $updatedUser = $this->emailChangeService->confirmChange((int) $user->id, $token);
        } catch (ValidationException $exception) {
            return redirect()
                ->route('login')
                ->withErrors($exception->errors());
        }

        if (Auth::check() && Auth::id() === $updatedUser->id) {
            return redirect()
                ->route('profile')
                ->with('flash', 'Your login email has been updated to '.$updatedUser->email.'.');
        }

        return redirect()
            ->route('login')
            ->with('flash', 'Your login email has been updated. Please sign in with '.$updatedUser->email.'.');
    }

    public function cancel(Request $request): RedirectResponse
    {
        $this->emailChangeService->cancelPending($request->user());

        return back()->with('email_change_status', 'Your pending email change has been cancelled.');
    }

    public function resend(Request $request): RedirectResponse
    {
        $user = $request->user();
        $this->emailChangeService->resendConfirmation($user);

        return back()->with(
            'email_change_status',
            'We sent another confirmation link to '.$user->fresh()->pending_email.'. Check that inbox (and spam folder).',
        );
    }
}
