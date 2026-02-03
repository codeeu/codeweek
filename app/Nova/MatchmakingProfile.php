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
            // Index fields (ordered)
            ID::make()->sortable(),
            Select::make('Type')
                ->options(array_combine(MatchmakingProfileModel::getValidTypes(), MatchmakingProfileModel::getValidTypes()))
                ->displayUsingLabels()
                ->sortable(),
            Text::make('Organisation Name')->sortable(),
            Text::make('Email')->sortable(),
            Text::make('Name', function () {
                return $this->display_name;
            })->onlyOnIndex(),
            DateTime::make('Start Time')->sortable(),
            DateTime::make('Completion Time')->sortable(),
            DateTime::make('Last Modified Time', 'updated_at')->sortable(),
            Text::make('Organisation Website', 'website')->onlyOnIndex(),
            Text::make('Organisation Type', function () {
                return is_array($this->organisation_type) ? implode(', ', $this->organisation_type) : $this->organisation_type;
            })->onlyOnIndex(),
            Text::make('Main Email Address', 'get_email_from')->onlyOnIndex(),
            Text::make('Country/Region/Areas of operation', function () {
                return $this->countryModel ? $this->countryModel->name : $this->country;
            })->onlyOnIndex(),
            Text::make('Want to tell us more about your organisation?', 'organisation_mission')->onlyOnIndex(),
            Boolean::make('Do you give your consent to use your logo and display it in the matchmaking directory?', 'is_use_resource')->onlyOnIndex(),
            Text::make('What kind of activities or support can you offer to schools and educators? (Select all that apply):', function () {
                return is_array($this->support_activities) ? implode(', ', $this->support_activities) : $this->support_activities;
            })->onlyOnIndex(),
            Text::make('Are you interested in collaborating with schools to bring real-world expertise into the classroom?', 'interested_in_school_collaboration')->onlyOnIndex(),
            Text::make('What types of schools are you most interested in working with?', function () {
                return is_array($this->target_school_types) ? implode(', ', $this->target_school_types) : $this->target_school_types;
            })->onlyOnIndex(),
            Text::make('What areas of digital expertise does your organisation or you specialise in?', function () {
                return is_array($this->digital_expertise_areas) ? implode(', ', $this->digital_expertise_areas) : $this->digital_expertise_areas;
            })->onlyOnIndex(),
            Boolean::make('Would you like to be part of the wider EU Code Week community and receive updates about future activities and events?', 'want_updates')->onlyOnIndex(),
            Text::make('Do you have any additional information or comments that could help us better match you with schools and educators?', 'description')->onlyOnIndex(),
            Boolean::make('By registering as a Digital Volunteer, you agree to being contacted later to share feedback about your experience.', 'agree_to_be_contacted_for_feedback')->onlyOnIndex(),

            // Detail fields
            Text::make('Slug')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),
            Text::make('Avatar')->hideFromIndex(),
            Text::make('First Name')->hideFromIndex(),
            Text::make('Last Name')->hideFromIndex(),
            Text::make('Job Title')->hideFromIndex(),
            Text::make('Linkedin')->hideFromIndex(),
            Text::make('Facebook')->hideFromIndex(),
            Text::make('Website')->hideFromIndex(),

            Textarea::make('Languages')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->hideFromIndex(),

            Textarea::make('Organisation Type')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->hideFromIndex(),

            Textarea::make('Organisation Mission')->hideFromIndex(),
            Text::make('Location')->hideFromIndex(),
            BelongsTo::make('Country', 'countryModel', \App\Nova\Country::class)
                ->nullable()
                ->sortable()
                ->searchable()
                ->hideFromIndex(),

            Textarea::make('Support Activities')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->hideFromIndex(),

            Text::make('Interested In School Collaboration')->hideFromIndex(),
            Textarea::make('Target School Types')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->hideFromIndex(),
            Textarea::make('Time Commitment')
                ->resolveUsing(fn($v) => is_array($v) ? implode(', ', $v) : ($v ?: ''))
                ->fillUsing(fn($req, $mdl, $attr, $reqAttr) => $mdl->{$attr} = json_decode($req->{$reqAttr}, true))
                ->hideFromIndex(),
            Boolean::make('Dark Avatar', 'avatar_dark')->hideFromIndex(),
            Boolean::make('Can Start Immediately')->hideFromIndex(),
            Textarea::make('Why Volunteering')->hideFromIndex(),
            Select::make('Format')
                ->options(MatchmakingProfileModel::getValidFormats())
                ->displayUsingLabels()
                ->sortable()
                ->hideFromIndex(),
            Boolean::make('Is Use Resource')->hideFromIndex(),
            Boolean::make('Want Updates')->hideFromIndex(),
            Boolean::make('Agree To Be Contacted For Feedback')->hideFromIndex(),
            Textarea::make('Description')->hideFromIndex(),
            Boolean::make('Email Via Linkedin')->hideFromIndex(),
            Text::make('Get Email From')->hideFromIndex(),
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
