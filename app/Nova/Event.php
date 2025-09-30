<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Arr;
use Laravel\Nova\Fields\Trix;

class Event extends Resource
{
    public static $group = 'Community';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Event::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'geoposition'
    ];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(Request $request): array
    {
        try {
            return [
                ID::make()->sortable(),

                // Core
                Text::make('Title')->sortable()->rules('required', 'max:255'),
                Text::make('Slug')->hideFromIndex()->rules('nullable', 'max:255'),

                Country::make('Country', 'country_iso')->sortable()->rules('required', 'size:2'),

                Select::make('Status')
                    ->options([
                        'APPROVED' => 'Approved',
                        'REJECTED' => 'Rejected',
                        'PENDING'  => 'Pending',
                    ])->displayUsingLabels()->sortable()->rules('required'),

                Text::make('Organizer')->hideFromIndex()->rules('nullable', 'max:255'),
                Text::make('Location')->hideFromIndex()->rules('nullable', 'max:255'),

                // Geo
                Text::make('Geoposition')->hideFromIndex()->rules('nullable', 'max:255'),
                Number::make('Latitude')->step('any')->hideFromIndex()->rules('nullable', 'numeric'),
                Number::make('Longitude')->step('any')->hideFromIndex()->rules('nullable', 'numeric'),

                // Dates
                DateTime::make('Start Date', 'start_date')->sortable()->rules('nullable', 'date'),
                DateTime::make('End Date', 'end_date')->sortable()->rules('nullable', 'date'),
                DateTime::make('Publication Date', 'pub_date')->onlyOnDetail()->rules('nullable', 'date'),
                DateTime::make('Reported At', 'reported_at')->onlyOnDetail()->rules('nullable', 'date'),
                DateTime::make('Certificate Generated At', 'certificate_generated_at')->onlyOnDetail()->rules('nullable', 'date'),
                DateTime::make('Last Report Notification Sent At', 'last_report_notification_sent_at')->onlyOnDetail()->rules('nullable', 'date'),
                DateTime::make('Source Synced At', 'source_synced_at')->onlyOnDetail()->rules('nullable', 'date'),

                // Contacts & Links
                URL::make('Event URL', 'event_url')->displayUsing(fn ($v) => $v)->hideFromIndex()->rules('nullable', 'url'),
                Text::make('Contact Person')->hideFromIndex()->rules('nullable', 'max:255'),
                Text::make('User Email', 'user_email')->hideFromIndex()->rules('nullable', 'email', 'max:255'),

                // Media
                URL::make('Picture')->displayUsing(fn ($v) => $v)->hideFromIndex()->rules('nullable', 'url'),
                URL::make('Picture Detail', 'picture_detail')->displayUsing(fn ($v) => $v)->hideFromIndex()->rules('nullable', 'url'),
                URL::make('Certificate URL', 'certificate_url')->displayUsing(fn ($v) => $v)->onlyOnDetail()->rules('nullable', 'url'),

                // Descriptions
                Trix::make('Description')->hideFromIndex(),
                Text::make('Web Link', function () {
                    $slug = $this->slug;
                    $id   = $this->id;
                    $url  = config('codeweek.app_url');

                    return "<a target='_blank' href='{$url}/view/{$id}/{$slug}'>View Activity's Page</a>";
                })->asHtml()->onlyOnDetail(),
                Text::make('Certificate', function () {
                    $certificate_url = $this->certificate_url;
                    return $certificate_url
                        ? "<a target='_blank' href='{$certificate_url}'>{$certificate_url}</a>"
                        : '-';
                })->asHtml()->onlyOnDetail(),

                // Classification
                Text::make('Activity Type', 'activity_type')->hideFromIndex()->rules('nullable', 'max:255'),
                Text::make('Organizer Type', 'organizer_type')->hideFromIndex()->rules('nullable', 'max:255'),

                MultiSelect::make('Activity Format', 'activity_format')
                    ->options(array_combine(\App\Event::ACTIVITY_FORMATS, \App\Event::ACTIVITY_FORMATS))
                    ->nullable()
                    ->rules(function () {
                        return [
                            function ($attribute, $value, $fail) {
                                if ($value === null || $value === '' || $value === [] || $value === '[]') {
                                    return;
                                }
                                if (!is_array($value)) {
                                    $decoded = json_decode((string) $value, true);
                                    if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
                                        $fail(__('validation.array', ['attribute' => $attribute]));
                                    }
                                }
                            },
                        ];
                    })
                    ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                        try {
                            $raw = $request->input($requestAttribute);
                            $decoded = is_array($raw) ? $raw : (is_string($raw) ? json_decode($raw, true) : null);
                            $model->{$attribute} = is_array($decoded) ? array_values($decoded) : [];
                        } catch (\Throwable $e) {
                            $model->{$attribute} = [];
                        }
                    })
                    ->hideFromIndex(),

                Select::make('Duration')->options(
                    array_combine(\App\Event::DURATIONS, \App\Event::DURATIONS)
                )->displayUsingLabels()->hideFromIndex()->rules('nullable', 'in:'.implode(',', \App\Event::DURATIONS)),

                Select::make('Recurring Type', 'recurring_type')->options(
                    array_combine(\App\Event::RECURRING_TYPES, \App\Event::RECURRING_TYPES)
                )->displayUsingLabels()->hideFromIndex()->rules('nullable', 'in:'.implode(',', \App\Event::RECURRING_TYPES)),

                Select::make('Recurring Event', 'recurring_event')->options(
                    array_combine(\App\Event::RECURRING_EVENTS, \App\Event::RECURRING_EVENTS)
                )->displayUsingLabels()->hideFromIndex()->rules('nullable', 'in:'.implode(',', \App\Event::RECURRING_EVENTS)),

                MultiSelect::make('Ages', 'ages')
                    ->options(array_combine(\App\Event::AGES, \App\Event::AGES))
                    ->nullable()
                    ->rules(function () {
                        return [
                            function ($attribute, $value, $fail) {
                                if ($value === null || $value === '' || $value === [] || $value === '[]') {
                                    return;
                                }
                                if (!is_array($value)) {
                                    $decoded = json_decode((string) $value, true);
                                    if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
                                        $fail(__('validation.array', ['attribute' => $attribute]));
                                    }
                                }
                            },
                        ];
                    })
                    ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                        try {
                            $raw = $request->input($requestAttribute);
                            $decoded = is_array($raw) ? $raw : (is_string($raw) ? json_decode($raw, true) : null);
                            $model->{$attribute} = is_array($decoded) ? array_values($decoded) : [];
                        } catch (\Throwable $e) {
                            $model->{$attribute} = [];
                        }
                    })
                    ->hideFromIndex(),

                // Flags
                Boolean::make('Is Extracurricular Event', 'is_extracurricular_event')->hideFromIndex(),
                Boolean::make('Is Standard School Curriculum', 'is_standard_school_curriculum')->hideFromIndex(),
                Boolean::make('Is Using Resource', 'is_use_resource')->hideFromIndex(),

                // Numbers / Stats
                Number::make('Participants Count', 'participants_count')->step(1)->min(0)->hideFromIndex()->rules('nullable', 'integer', 'min:0'),
                Number::make('Average Participant Age', 'average_participant_age')->step('any')->hideFromIndex()->rules('nullable', 'numeric', 'min:0'),
                Number::make('Percentage of Females', 'percentage_of_females')->step('any')->hideFromIndex()->rules('nullable', 'numeric', 'min:0', 'max:100'),
                Number::make('Males Count', 'males_count')->step(1)->min(0)->hideFromIndex()->rules('nullable', 'integer', 'min:0'),
                Number::make('Females Count', 'females_count')->step(1)->min(0)->hideFromIndex()->rules('nullable', 'integer', 'min:0'),
                Number::make('Other Count', 'other_count')->step(1)->min(0)->hideFromIndex()->rules('nullable', 'integer', 'min:0'),

                // Codes / Misc
                Text::make('Codeweek For All Participation Code', 'codeweek_for_all_participation_code')
                    ->onlyOnForms()->rules('nullable', 'max:255'),
                Text::make('Name For Certificate', 'name_for_certificate')->onlyOnForms()->rules('nullable', 'max:255'),
                Text::make('Language')->help('Comma-separated language codes (e.g., en,fr,de)')
                    ->onlyOnForms()->rules('nullable', 'max:255'),
                Text::make('Source Ref', 'source_ref')->hideFromIndex()->rules('nullable', 'max:255'),

                // Relations
                BelongsTo::make('Owner', 'owner', \App\Nova\User::class)->searchable()->nullable(),
                BelongsTo::make('Country Model', 'country', \App\Nova\Country::class)->onlyOnDetail(),

                BelongsToMany::make('Audiences'),
                BelongsToMany::make('Themes'),
                BelongsToMany::make('Tags')->fields(function () {
                    return [];
                }),

                // Creator email shortcut for index
                Text::make('Creator', 'owner.email')->onlyOnIndex(),

            ];
        } catch (\Throwable $e) {
            return [
                Text::make('Title')->sortable(),
                Country::make('Country', 'country_iso')->sortable(),
                Select::make('Status')->options([
                    'APPROVED' => 'Approved',
                    'REJECTED' => 'Rejected',
                    'PENDING'  => 'Pending',
                ]),
            ];
        }
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [
            //    new Metrics\EventsPerDay
        ];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(Request $request): array
    {
        return [
            (new Filters\EventCountry)->canSee(function ($request) {
                return $request->user()->isAdmin();
            }),
            new Filters\EventStatus,
        ];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(Request $request): array
    {

        /*  return [
              new Actions\ApproveEvent
          ];*/

        return [
            (new Actions\ApproveEvent)->canSee(function ($request) {
                return $request->user()->hasRole('super admin') || $request->user()->hasRole('ambassador');

            })->canRun(function ($request) {
                return $request->user()->hasRole('super admin') || $request->user()->hasRole('ambassador');
            }),
            (new Actions\RejectEvent)->canSee(function ($request) {
                return $request->user()->hasRole('super admin') || $request->user()->hasRole('ambassador');

            })->canRun(function ($request) {
                return $request->user()->hasRole('super admin') || $request->user()->hasRole('ambassador');
            }),
        ];

    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->hasRole('ambassador')) {
            return $query->where('country_iso', '=', $request->user()->country_iso);
        }

        return $query;

    }
}
