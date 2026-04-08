<?php

namespace App\Nova;

use App\Models\Support\SupportGmailCursor as SupportGmailCursorModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class SupportGmailCursor extends Resource
{
    public static $model = SupportGmailCursorModel::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'mailbox',
        'label',
        'last_history_id',
    ];

    public static function authorizedToCreate(Request $request): bool
    {
        return false;
    }

    public function authorizedToUpdate(Request $request): bool
    {
        return false;
    }

    public function authorizedToDelete(Request $request): bool
    {
        return false;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Mailbox', 'mailbox')->sortable(),
            Text::make('Label', 'label')->sortable(),
            Text::make('Last History Id', 'last_history_id')->sortable(),
            DateTime::make('Last Polled At', 'last_polled_at')->sortable(),
            DateTime::make('Created At')->sortable(),
            DateTime::make('Updated At')->sortable(),
        ];
    }
}

