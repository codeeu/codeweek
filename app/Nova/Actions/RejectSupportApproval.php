<?php

namespace App\Nova\Actions;

use App\Models\Support\SupportApproval;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class RejectSupportApproval extends Action
{
    use Queueable;

    public $name = 'Reject';

    public function fields(NovaRequest $request): array
    {
        return [
            Text::make('Reason', 'reason')
                ->rules('required', 'max:500'),
        ];
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        /** @var SupportApproval $approval */
        foreach ($models as $approval) {
            if ($approval->status !== 'pending') {
                continue;
            }

            $approval->status = 'rejected';
            $approval->approved_by = optional(auth()->user())->email ?? 'nova';
            $approval->approved_at = now();
            $approval->rejected_reason = (string) $fields->reason;
            $approval->save();
        }

        return Action::message('Rejected.');
    }
}

