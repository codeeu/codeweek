<?php

namespace App\Nova;

use App\MatchmakingProfile as MatchmakingProfileModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
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
                ->displayUsingLabels(),

            Text::make('Slug')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Avatar')->hideFromIndex(),

            Text::make('Email')->sortable(),
            Text::make('First Name')->hideFromIndex(),
            Text::make('Last Name')->hideFromIndex(),
            Text::make('Job Title')->hideFromIndex(),
            Text::make('Linkedin')->hideFromIndex(),
            Text::make('Facebook')->hideFromIndex(),
            Text::make('Website')->hideFromIndex(),
            Text::make('Organisation Name')->sortable(),

            // Array fields as JSON textareas
            Textarea::make('Languages')
                ->resolveUsing(fn($v) => is_array($v) ? json_encode($v) : $v)
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true)),

            Textarea::make('Organisation Type')
                ->resolveUsing(fn($v) => is_array($v) ? json_encode($v) : $v)
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true)),

            Textarea::make('Organisation Mission')->hideFromIndex(),

            Text::make('Location')->hideFromIndex(),
            BelongsTo::make('Country', 'countryModel', \App\Nova\Country::class)->nullable(),

            Textarea::make('Support Activities')
                ->resolveUsing(fn($v) => is_array($v) ? json_encode($v) : $v)
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true)),

            Text::make('Interested In School Collaboration')->hideFromIndex(),

            Textarea::make('Target School Types')
                ->resolveUsing(fn($v) => is_array($v) ? json_encode($v) : $v)
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->hideFromIndex(),

            Textarea::make('Time Commitment')
                ->resolveUsing(fn($v) => is_array($v) ? json_encode($v) : $v)
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->hideFromIndex(),

            Boolean::make('Dark Avatar', 'avatar_dark')->hideFromIndex(),
            Boolean::make('Can Start Immediately'),
            Textarea::make('Why Volunteering')->hideFromIndex(),

            Select::make('Format')
                ->options(MatchmakingProfileModel::getValidFormats())
                ->displayUsingLabels(),

            Boolean::make('Is Use Resource'),
            Boolean::make('Want Updates'),
            Boolean::make('Agree To Be Contacted For Feedback'),
            Textarea::make('Description')->hideFromIndex(),

            DateTime::make('Start Time')->hideFromIndex(),
            DateTime::make('Completion Time')->hideFromIndex(),

            Boolean::make('Email Via Linkedin'),
            Text::make('Get Email From')->hideFromIndex(),
        ];
    }
}
