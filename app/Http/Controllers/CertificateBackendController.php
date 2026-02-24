<?php

namespace App\Http\Controllers;

/**
 * Certificate Backend: Excellence & Super Organiser cert generation and sending.
 *
 * Final considerations (addressed):
 * - Error handling: LaTeX input is escaped (CertificateExcellence::tex_escape), generation/send
 *   failures are caught and stored in certificate_generation_error / certificate_sent_error;
 *   the Errors page and table show them; manual and batch flows handle exceptions gracefully.
 * - Queue: Bulk generate and send use Laravel queues (GenerateCertificateBatchJob, SendCertificateBatchJob)
 *   so the web request is not blocked; run php artisan queue:work on the server.
 * - Testing: Use seeded Excellences or manual "Generate/Regenerate" per row to validate
 *   LaTeX templates and S3 upload; EventFactory is for participation events, not this backend.
 */
use App\Excellence;
use App\Jobs\GenerateCertificateBatchJob;
use App\Jobs\SendCertificateBatchJob;
use App\Mail\NotifySuperOrganiser;
use App\Mail\NotifyWinner;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class CertificateBackendController extends Controller
{
    public const EDITION_DEFAULT = 2025;

    /** In local, send immediately so you see success/failure (e.g. in mail log or Mailtrap). In production, queue. */
    private function sendCertificateMail(string $email, $mailable): void
    {
        if (app()->environment('local')) {
            Mail::to($email)->send($mailable);
        } else {
            Mail::to($email)->queue($mailable);
        }
    }

    private function mailSentMessage(): string
    {
        return app()->environment('local')
            ? 'Email sent. (Check storage/logs or your mail catcher.)'
            : 'Email queued. It will be sent when the queue worker runs.';
    }

    public const TYPES = [
        'excellence' => 'Excellence',
        'super-organiser' => 'SuperOrganiser',
    ];

    public function index(Request $request): View
    {
        $edition = (int) $request->get('edition', self::EDITION_DEFAULT);
        $typeSlug = $request->get('type', 'excellence');
        $type = self::TYPES[$typeSlug] ?? 'Excellence';

        return view('certificate-backend.index', [
            'edition' => $edition,
            'typeSlug' => $typeSlug,
            'type' => $type,
        ]);
    }

    public function listRecipients(Request $request): JsonResponse
    {
        $edition = (int) $request->get('edition', self::EDITION_DEFAULT);
        $typeSlug = $request->get('type', 'excellence');
        $type = self::TYPES[$typeSlug] ?? 'Excellence';
        $search = $request->get('search', '');

        $query = Excellence::query()
            ->where('edition', $edition)
            ->where('type', $type)
            ->with('user')
            ->orderBy('id');

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name_for_certificate', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($uq) use ($search) {
                        $uq->where('email', 'like', '%' . $search . '%')
                            ->orWhere('firstname', 'like', '%' . $search . '%')
                            ->orWhere('lastname', 'like', '%' . $search . '%');
                    });
            });
        }

        $perPage = (int) $request->get('per_page', 50);
        $paginator = $query->paginate(min($perPage, 200));

        $items = $paginator->getCollection()->map(function (Excellence $e) {
            $user = $e->user;
            return [
                'id' => $e->id,
                'user_id' => $e->user_id,
                'name' => $e->name_for_certificate ?? ($user ? trim($user->firstname . ' ' . $user->lastname) : ''),
                'email' => $user?->email ?? '',
                'certificate_url' => $e->certificate_url,
                'certificate_generated' => ! empty($e->certificate_url),
                'notified_at' => $e->notified_at,
                'certificate_sent' => ! empty($e->notified_at),
                'certificate_generation_error' => $e->certificate_generation_error,
                'certificate_sent_error' => $e->certificate_sent_error,
            ];
        });

        return response()->json([
            'data' => $items,
            'current_page' => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
            'per_page' => $paginator->perPage(),
            'total' => $paginator->total(),
        ]);
    }

    public function status(Request $request): JsonResponse
    {
        try {
            $edition = (int) $request->get('edition', self::EDITION_DEFAULT);
            $typeSlug = $request->get('type', 'excellence');
            $type = self::TYPES[$typeSlug] ?? 'Excellence';

            $runningKey = sprintf(GenerateCertificateBatchJob::CACHE_KEY_RUNNING, $edition, $type);
            $runningValue = Cache::get($runningKey);
            $generationRunning = false;
            if ($runningValue !== null) {
                $startedAt = is_numeric($runningValue) ? (int) $runningValue : null;
                $staleSeconds = 7200;
                if ($startedAt && (time() - $startedAt) < $staleSeconds) {
                    $generationRunning = true;
                } else {
                    Cache::forget($runningKey);
                }
            }

            $sendRunningKey = sprintf(SendCertificateBatchJob::CACHE_KEY_SEND_RUNNING, $edition, $type);
            $sendRunningValue = Cache::get($sendRunningKey);
            $sendRunning = false;
            if ($sendRunningValue !== null && is_numeric($sendRunningValue) && (time() - (int) $sendRunningValue) < 7200) {
                $sendRunning = true;
            } else {
                if ($sendRunningValue !== null) {
                    Cache::forget($sendRunningKey);
                }
            }

            $hasGenErrorCol = Schema::hasColumn('excellences', 'certificate_generation_error');
            $hasSentErrorCol = Schema::hasColumn('excellences', 'certificate_sent_error');

            $q = fn () => Excellence::query()->where('edition', $edition)->where('type', $type);
            $stats = [
                'total' => $q()->count(),
                'generated' => $q()->whereNotNull('certificate_url')->count(),
                'sent' => $q()->whereNotNull('notified_at')->count(),
                'generation_failed' => $hasGenErrorCol ? $q()->whereNotNull('certificate_generation_error')->count() : 0,
                'send_failed' => $hasSentErrorCol ? $q()->whereNotNull('certificate_sent_error')->count() : 0,
                'generation_running' => $generationRunning,
                'send_running' => $sendRunning,
            ];

            return response()->json($stats);
        } catch (\Throwable $e) {
            Log::error('CertificateBackendController::status failed: ' . $e->getMessage(), ['exception' => $e]);
            $message = config('app.debug') ? $e->getMessage() : 'Server error. Run: php artisan migrate';
            return response()->json([
                'total' => 0,
                'generated' => 0,
                'sent' => 0,
                'generation_failed' => 0,
                'send_failed' => 0,
                'generation_running' => false,
                'send_running' => false,
                'message' => $message,
            ], 500);
        }
    }

    public function startGeneration(Request $request): JsonResponse
    {
        $edition = (int) $request->get('edition', self::EDITION_DEFAULT);
        $typeSlug = $request->get('type', 'excellence');
        $type = self::TYPES[$typeSlug] ?? 'Excellence';

        $runningKey = sprintf(GenerateCertificateBatchJob::CACHE_KEY_RUNNING, $edition, $type);
        $cancelledKey = sprintf(GenerateCertificateBatchJob::CACHE_KEY_CANCELLED, $edition, $type);

        $runningValue = Cache::get($runningKey);
        if ($runningValue !== null) {
            $startedAt = is_numeric($runningValue) ? (int) $runningValue : null;
            if ($startedAt && (time() - $startedAt) < GenerateCertificateBatchJob::RUNNING_STALE_SECONDS) {
                return response()->json(['ok' => false, 'message' => 'Generation already in progress.']);
            }
            Cache::forget($runningKey);
        }

        Cache::forget($cancelledKey);
        Cache::put($runningKey, time(), GenerateCertificateBatchJob::CACHE_TTL_SECONDS);

        GenerateCertificateBatchJob::dispatch($edition, $type, 0);

        return response()->json(['ok' => true, 'message' => 'Generation started.']);
    }

    public function cancelGeneration(Request $request): JsonResponse
    {
        $edition = (int) $request->get('edition', self::EDITION_DEFAULT);
        $typeSlug = $request->get('type', 'excellence');
        $type = self::TYPES[$typeSlug] ?? 'Excellence';

        $cancelledKey = sprintf(GenerateCertificateBatchJob::CACHE_KEY_CANCELLED, $edition, $type);
        Cache::put($cancelledKey, true, GenerateCertificateBatchJob::CACHE_TTL_SECONDS);

        return response()->json(['ok' => true, 'message' => 'Cancellation requested. Current batch will finish, then generation will stop.']);
    }

    public function startSend(Request $request): JsonResponse
    {
        $edition = (int) $request->get('edition', self::EDITION_DEFAULT);
        $typeSlug = $request->get('type', 'excellence');
        $type = self::TYPES[$typeSlug] ?? 'Excellence';

        $pending = Excellence::query()
            ->where('edition', $edition)
            ->where('type', $type)
            ->where(function ($q) {
                $q->whereNull('notified_at')->orWhereNotNull('certificate_sent_error');
            })
            ->limit(1)
            ->exists();

        if (! $pending) {
            return response()->json(['ok' => false, 'message' => 'No pending recipients to send.']);
        }

        SendCertificateBatchJob::dispatch($edition, $type, 0);

        return response()->json(['ok' => true, 'message' => 'Sending started in batches of ' . SendCertificateBatchJob::BATCH_SIZE . '.']);
    }

    /**
     * Regenerate the certificate PDF for one recipient (by excellence id).
     * Works for both "never generated" and "regenerate existing".
     */
    public function regenerateOne(Request $request, int $id): JsonResponse
    {
        $excellence = Excellence::with('user')->findOrFail($id);
        $user = $excellence->user;
        if (! $user) {
            return response()->json(['ok' => false, 'message' => 'User missing.']);
        }

        $edition = $excellence->edition;
        $type = $excellence->type;
        $certType = $type === 'SuperOrganiser' ? 'super-organiser' : 'excellence';
        $name = $excellence->name_for_certificate ?? trim($user->firstname . ' ' . $user->lastname) ?: 'Unknown';
        $numberOfActivities = $type === 'SuperOrganiser' ? $user->activities($edition) : 0;

        try {
            $cert = new \App\CertificateExcellence(
                $edition,
                $name,
                $certType,
                $numberOfActivities,
                $user->id,
                $user->email
            );
            $url = $cert->generate();
            $excellence->update([
                'certificate_url' => $url,
                'certificate_generation_error' => null,
            ]);
            return response()->json([
                'ok' => true,
                'message' => 'Certificate generated.',
                'certificate_url' => $url,
            ]);
        } catch (\Throwable $e) {
            $excellence->update(['certificate_generation_error' => $e->getMessage()]);
            return response()->json(['ok' => false, 'message' => 'Generation failed: ' . $e->getMessage()], 500);
        }
    }

    public function resendOne(Request $request, int $id): JsonResponse
    {
        $excellence = Excellence::with('user')->findOrFail($id);
        $user = $excellence->user;

        if (! $user || ! $user->email) {
            return response()->json(['ok' => false, 'message' => 'User or email missing.']);
        }

        if (! $excellence->certificate_url) {
            return response()->json(['ok' => false, 'message' => 'Certificate not generated yet. Generate first.']);
        }

        try {
            if ($excellence->type === 'SuperOrganiser') {
                $this->sendCertificateMail($user->email, new NotifySuperOrganiser($user, $excellence->edition, $excellence->certificate_url));
            } else {
                $this->sendCertificateMail($user->email, new NotifyWinner($user, $excellence->edition, $excellence->certificate_url));
            }
            $excellence->update([
                'notified_at' => Carbon::now(),
                'certificate_sent_error' => null,
            ]);
            return response()->json(['ok' => true, 'message' => $this->mailSentMessage()]);
        } catch (\Throwable $e) {
            $excellence->update(['certificate_sent_error' => $e->getMessage()]);
            return response()->json(['ok' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function resendAllFailed(Request $request): JsonResponse
    {
        $edition = (int) $request->get('edition', self::EDITION_DEFAULT);
        $typeSlug = $request->get('type', 'excellence');
        $type = self::TYPES[$typeSlug] ?? 'Excellence';

        $count = Excellence::query()
            ->where('edition', $edition)
            ->where('type', $type)
            ->where(function ($q) {
                $q->whereNull('notified_at')->orWhereNotNull('certificate_sent_error');
            })
            ->count();

        if ($count === 0) {
            return response()->json(['ok' => false, 'message' => 'No failed or unsent recipients.']);
        }

        SendCertificateBatchJob::dispatch($edition, $type, 0);

        return response()->json(['ok' => true, 'message' => "Sending queued for {$count} recipient(s)."]);
    }

    public function errorsList(Request $request)
    {
        $edition = (int) $request->get('edition', self::EDITION_DEFAULT);
        $typeSlug = $request->get('type', 'excellence');
        $type = self::TYPES[$typeSlug] ?? 'Excellence';

        $rows = Excellence::query()
            ->where('edition', $edition)
            ->where('type', $type)
            ->where(function ($q) {
                $q->whereNotNull('certificate_generation_error')->orWhereNotNull('certificate_sent_error');
            })
            ->with('user')
            ->orderBy('id')
            ->get();

        if ($request->wantsJson()) {
            $items = $rows->map(fn (Excellence $e) => [
                'id' => $e->id,
                'name' => $e->name_for_certificate ?? ($e->user ? trim($e->user->firstname . ' ' . $e->user->lastname) : ''),
                'email' => $e->user?->email ?? '',
                'certificate_generation_error' => $e->certificate_generation_error,
                'certificate_sent_error' => $e->certificate_sent_error,
            ]);
            return response()->json(['data' => $items]);
        }

        return view('certificate-backend.errors', [
            'edition' => $edition,
            'typeSlug' => $typeSlug,
            'type' => $type,
            'rows' => $rows,
        ]);
    }

    /**
     * Manual: generate and/or send for one user by email.
     * generate_only=true: only generate certificate (do not send).
     * send_only=true: only send email (certificate must already exist).
     * Otherwise: generate if needed, then send.
     */
    public function manualCreateSend(Request $request): JsonResponse
    {
        $edition = (int) $request->get('edition', self::EDITION_DEFAULT);
        $typeSlug = $request->get('type', 'excellence');
        $type = self::TYPES[$typeSlug] ?? 'Excellence';
        $certType = $type === 'SuperOrganiser' ? 'super-organiser' : 'excellence';
        $generateOnly = $request->boolean('generate_only');
        $sendOnly = $request->boolean('send_only');

        $excellenceId = $request->get('excellence_id');
        $userEmail = $request->get('user_email');

        if ($excellenceId) {
            $excellence = Excellence::with('user')->find($excellenceId);
            if (! $excellence) {
                return response()->json(['ok' => false, 'message' => 'Excellence record not found.']);
            }
        } elseif ($userEmail) {
            $user = \App\User::where('email', $userEmail)->first();
            if (! $user) {
                return response()->json(['ok' => false, 'message' => 'User not found with that email.']);
            }
            $excellence = Excellence::firstOrCreate(
                ['user_id' => $user->id, 'edition' => $edition, 'type' => $type],
                ['name_for_certificate' => trim($user->firstname . ' ' . $user->lastname)]
            );
            $excellence->load('user');
        } else {
            return response()->json(['ok' => false, 'message' => 'Provide excellence_id or user_email.']);
        }

        $user = $excellence->user;
        if (! $user) {
            return response()->json(['ok' => false, 'message' => 'User missing for this record.']);
        }

        $name = $excellence->name_for_certificate ?? trim($user->firstname . ' ' . $user->lastname);
        $numberOfActivities = $type === 'SuperOrganiser' ? $user->activities($edition) : 0;

        // Manual "generate only" should always regenerate, even if a URL already exists.
        // For combined flow, only generate when certificate is missing.
        $shouldGenerate = ! $sendOnly && ($generateOnly || ! $excellence->certificate_url);
        if ($shouldGenerate) {
            try {
                $cert = new \App\CertificateExcellence(
                    $edition,
                    $name,
                    $certType,
                    $numberOfActivities,
                    $user->id,
                    $user->email
                );
                $url = $cert->generate();
                $excellence->update(['certificate_url' => $url, 'certificate_generation_error' => null]);
            } catch (\Throwable $e) {
                $excellence->update(['certificate_generation_error' => $e->getMessage()]);

                return response()->json(['ok' => false, 'message' => 'Generation failed: ' . $e->getMessage()], 500);
            }
        }

        if ($generateOnly) {
            return response()->json([
                'ok' => true,
                'message' => 'Certificate generated.',
                'certificate_url' => $excellence->certificate_url,
            ]);
        }

        try {
            if ($type === 'SuperOrganiser') {
                $this->sendCertificateMail($user->email, new NotifySuperOrganiser($user, $edition, $excellence->certificate_url));
            } else {
                $this->sendCertificateMail($user->email, new NotifyWinner($user, $edition, $excellence->certificate_url));
            }
            $excellence->update(['notified_at' => Carbon::now(), 'certificate_sent_error' => null]);

            return response()->json([
                'ok' => true,
                'message' => $this->mailSentMessage(),
                'certificate_url' => $excellence->certificate_url,
            ]);
        } catch (\Throwable $e) {
            $excellence->update(['certificate_sent_error' => $e->getMessage()]);

            return response()->json(['ok' => false, 'message' => 'Send failed: ' . $e->getMessage()], 500);
        }
    }
}
