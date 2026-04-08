<?php

namespace App\Services\Support;

use App\Models\Support\SupportApproval;
use App\Models\Support\SupportCase;
use App\User;
use Illuminate\Support\Str;

class UserRestoreService
{
    public function __construct(
        private readonly ApprovalPolicyService $policy,
        private readonly VerificationService $verification,
    ) {
    }

    public function restore(SupportCase $case, string $email, bool $dryRun, ?float $confidence = null): array
    {
        $tool = 'user_restore';
        $input = ['email' => $email, 'dry_run' => $dryRun];
        $normalized = trim(Str::lower($email));

        $matches = User::withTrashed()
            ->whereRaw('LOWER(email) = ?', [$normalized])
            ->orWhereRaw('LOWER(email_display) = ?', [$normalized])
            ->get();

        if ($matches->isEmpty()) {
            return SupportJson::fail($tool, $input, 'no_matching_user_found');
        }

        if ($matches->count() !== 1) {
            return SupportJson::fail($tool, $input, 'ambiguous_user_match');
        }

        /** @var User $user */
        $user = $matches->first();

        if ($user->deleted_at === null) {
            return SupportJson::ok($tool, $input, [
                'dry_run' => $dryRun,
                'changes_planned' => [],
                'changes_applied' => [],
                'verification' => $this->verification->verifyUserRestored($user),
                'note' => 'user_already_active',
            ]);
        }

        $decision = $this->policy->decide(
            actionName: $tool,
            actionType: 'write',
            riskLevel: 'medium',
            context: [
                'ambiguity' => false,
                'privileged_roles_involved' => false,
                'dry_run_ok' => true,
                'confidence' => $confidence,
            ],
        );

        if ($decision['requires_approval'] ?? false) {
            $approval = SupportApproval::create([
                'support_case_id' => $case->id,
                'requested_action' => $tool,
                'payload_json' => $input,
                'risk_level' => 'medium',
                'status' => 'pending',
                'correlation_id' => $case->correlation_id,
            ]);

            $case->update(['status' => 'awaiting_approval']);

            return SupportJson::fail($tool, $input, [
                'approval_required',
                'reason:'.$decision['reason'],
                'approval_id:'.$approval->id,
            ]);
        }

        $planned = [
            'model' => 'user',
            'user_id' => $user->id,
            'change' => 'restore_soft_deleted_user',
        ];

        if ($dryRun) {
            return SupportJson::ok($tool, $input, [
                'dry_run' => true,
                'changes_planned' => [$planned],
                'changes_applied' => [],
                'verification' => new \stdClass(),
            ]);
        }

        $user->restore();

        $verification = $this->verification->verifyUserRestored($user);

        return SupportJson::ok($tool, $input, [
            'dry_run' => false,
            'changes_planned' => [$planned],
            'changes_applied' => [$planned],
            'verification' => $verification,
        ], warnings: ($verification['is_restored'] ?? false) ? [] : ['verification_failed']);
    }
}

