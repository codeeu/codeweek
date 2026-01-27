<?php

namespace App\Nova;

use App\MatchmakingProfile as MatchmakingProfileModel;
use App\Nova\Actions\ImportMatchmakingProfiles;
use App\Nova\Actions\DownloadMatchmakingTemplate;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;


class MatchmakingProfile extends Resource
{
    public static $model = MatchmakingProfileModel::class;

    public static $title = 'slug';

    public static $search = [
        'id', 'slug', 'email', 'first_name', 'last_name', 'organisation_name'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Select::make('Type')
                ->options(array_combine(MatchmakingProfileModel::getValidTypes(), MatchmakingProfileModel::getValidTypes()))
                ->displayUsingLabels()
                ->sortable(),

            Text::make('Slug')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('Avatar')->hideFromIndex(),

            Text::make('Email')->sortable(),
            Text::make('First Name')->sortable(),
            Text::make('Last Name')->sortable(),
            Text::make('Job Title'),
            Text::make('Linkedin')->hideFromIndex(),
            Text::make('Facebook')->hideFromIndex(),
            Text::make('Website'),
            Text::make('Organisation Name')->sortable(),

            // Array fields as JSON textareas
            Textarea::make('Languages')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->alwaysShow(),

            Textarea::make('Organisation Type')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->alwaysShow(),

            Textarea::make('Organisation Mission')->alwaysShow(),

            Text::make('Location'),
            BelongsTo::make('Country', 'countryModel', \App\Nova\Country::class)
                ->nullable()
                ->sortable()
                ->searchable(),

            Textarea::make('Support Activities')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->alwaysShow(),

            Text::make('Interested In School Collaboration')->sortable(),

            Textarea::make('Target School Types')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->alwaysShow(),

            Textarea::make('Time Commitment')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->alwaysShow(),

            Boolean::make('Dark Avatar', 'avatar_dark')->hideFromIndex(),
            Boolean::make('Can Start Immediately'),
            Textarea::make('Why Volunteering')->alwaysShow(),

            Select::make('Format')
                ->options(MatchmakingProfileModel::getValidFormats())
                ->displayUsingLabels()
                ->sortable(),

            Boolean::make('Is Use Resource'),
            Boolean::make('Want Updates'),
            Boolean::make('Agree To Be Contacted For Feedback'),
            Textarea::make('Description')->alwaysShow(),

            DateTime::make('Start Time')->sortable(),
            DateTime::make('Completion Time')->sortable(),

            Boolean::make('Email Via Linkedin'),
            Text::make('Get Email From'),
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [
            new DownloadMatchmakingTemplate,
            new ImportMatchmakingProfiles,
        ];
    }
}
