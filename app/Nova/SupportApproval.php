<?php

namespace App\Nova;

use App\Nova\Actions\ApproveSupportApproval;
use App\Nova\Actions\RejectSupportApproval;
use App\Models\Support\SupportApproval as SupportApprovalModel;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Json;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class SupportApproval extends Resource
{
    public static $model = SupportApprovalModel::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'requested_action',
        'status',
        'risk_level',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Requested Action', 'requested_action')->sortable(),
            Text::make('Risk Level', 'risk_level')->sortable(),
            Text::make('Status', 'status')->sortable(),
            Json::make('Payload', 'payload_json')->onlyOnDetail(),
            Text::make('Approved By', 'approved_by')->hideFromIndex(),
            DateTime::make('Approved At', 'approved_at')->hideFromIndex(),
            Text::make('Rejected Reason', 'rejected_reason')->onlyOnDetail(),
            DateTime::make('Created At')->sortable(),
        ];
    }

    /**
     * @return array<int, Action>
     */
    public function actions(Request $request): array
    {
        return [
            (new ApproveSupportApproval())->canSee(fn () => true)->canRun(fn () => true),
            (new RejectSupportApproval())->canSee(fn () => true)->canRun(fn () => true),
        ];
    }
}

