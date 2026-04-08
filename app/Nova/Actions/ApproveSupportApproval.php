<?php

namespace App\Nova\Actions;

use App\Jobs\Support\ExecuteApprovedSupportActionJob;
use App\Models\Support\SupportApproval;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class ApproveSupportApproval extends Action
{
    use Queueable;

    public $name = 'Approve';

    public function handle(ActionFields $fields, Collection $models)
    {
        /** @var SupportApproval $approval */
        foreach ($models as $approval) {
            if ($approval->status !== 'pending') {
                continue;
            }

            $approval->status = 'approved';
            $approval->approved_by = optional(auth()->user())->email ?? 'nova';
            $approval->approved_at = now();
            $approval->save();

            ExecuteApprovedSupportActionJob::dispatch($approval->id);
        }

        return Action::message('Approved and queued for execution.');
    }
}

