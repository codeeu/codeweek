<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Event extends Resource
{
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
        'id', 'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            Text::make('Title')->sortable(),
            Text::make('Certificate', function () {
                $certificate_url = $this->certificate_url;

                return "<a target='_blank' href='{$certificate_url}'>{$certificate_url}</a>";
            })->asHtml()->onlyOnDetail(),
            Text::make('Web Link', function () {
                $slug = $this->slug;
                $id = $this->id;
                $url = config('codeweek.app_url');

                return "<a target='_blank' href='{$url}/view/{$id}/{$slug}'>View Activity's Page</a>";
            })->asHtml()->onlyOnDetail(),
            Text::make('Description')->onlyOnDetail(),
            Text::make('Organizer')->onlyOnDetail(),
            Text::make('codeweek_for_all_participation_code')->sortable()->onlyOnDetail(),

            Country::make('Country', 'country_iso')->sortable(),

            Select::make('Status')->options([
                'APPROVED' => 'Approved',
                'REJECTED' => 'Rejected',
                'PENDING' => 'Pending',
            ]),

            Text::make('Creator', 'owner.email'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            //    new Metrics\EventsPerDay
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request)
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
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request)
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
