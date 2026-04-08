<?php

namespace App\Nova;

use App\Models\Support\SupportCaseAction as SupportCaseActionModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Json;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class SupportCaseAction extends Resource
{
    public static $model = SupportCaseActionModel::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'action_name',
        'action_type',
        'executed_by',
        'error_message',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Support Case Id', 'support_case_id')->sortable(),
            Text::make('Action Name', 'action_name')->sortable(),
            Text::make('Action Type', 'action_type')->sortable(),
            Boolean::make('Succeeded', 'succeeded')->sortable(),
            Boolean::make('Requires Approval', 'requires_approval')->sortable(),
            Text::make('Executed By', 'executed_by')->sortable(),
            Text::make('Approved By', 'approved_by')->hideFromIndex(),
            Text::make('Error', 'error_message')->onlyOnDetail(),
            Json::make('Input', 'input_json')->onlyOnDetail(),
            Json::make('Output', 'output_json')->onlyOnDetail(),
            DateTime::make('Created At')->sortable(),
        ];
    }
}

