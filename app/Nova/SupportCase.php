<?php

namespace App\Nova;

use App\Models\Support\SupportCase as SupportCaseModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Json;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class SupportCase extends Resource
{
    public static $model = SupportCaseModel::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'subject',
        'gmail_message_id',
        'gmail_thread_id',
        'target_email',
        'forwarded_by_email',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Subject')->sortable(),
            Text::make('Status')->sortable(),
            Text::make('Case Type', 'case_type')->sortable(),
            Text::make('Risk Level', 'risk_level')->sortable(),
            Text::make('Assigned Runbook', 'assigned_runbook')->sortable(),
            Text::make('Target Email', 'target_email')->sortable(),
            Boolean::make('Needs Human Review', 'needs_human_review')->sortable(),

            Text::make('Source Channel', 'source_channel')->sortable(),
            Text::make('Processing Mode', 'processing_mode')->sortable(),
            Text::make('Gmail Message Id', 'gmail_message_id')->hideFromIndex(),
            Text::make('Gmail Thread Id', 'gmail_thread_id')->hideFromIndex(),

            Text::make('Forwarded By', 'forwarded_by_email')->hideFromIndex(),
            Text::make('Original Sender', 'original_sender_email')->hideFromIndex(),

            Text::make('Correlation Id', 'correlation_id')->hideFromIndex(),

            Text::make('Raw Message', 'raw_message')->onlyOnDetail(),
            Text::make('Normalized Message', 'normalized_message')->onlyOnDetail(),
            Json::make('Secondary Emails', 'secondary_emails')->onlyOnDetail(),

            HasMany::make('Actions', 'actions', SupportCaseAction::class)->onlyOnDetail(),
            HasMany::make('Approvals', 'approvals', SupportApproval::class)->onlyOnDetail(),
            HasMany::make('Messages', 'messages', SupportCaseMessage::class)->onlyOnDetail(),

            DateTime::make('Created At')->sortable(),
            DateTime::make('Updated At')->sortable(),
        ];
    }
}

