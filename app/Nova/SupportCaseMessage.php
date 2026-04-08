<?php

namespace App\Nova;

use App\Models\Support\SupportCaseMessage as SupportCaseMessageModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class SupportCaseMessage extends Resource
{
    public static $model = SupportCaseMessageModel::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'message_type',
        'recipient_email',
        'subject',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Support Case Id', 'support_case_id')->sortable(),
            Text::make('Message Type', 'message_type')->sortable(),
            Text::make('Recipient', 'recipient_email')->hideFromIndex(),
            Text::make('Subject', 'subject')->hideFromIndex(),
            Text::make('Body', 'body')->onlyOnDetail(),
            DateTime::make('Sent At', 'sent_at')->hideFromIndex(),
            DateTime::make('Created At')->sortable(),
        ];
    }
}

