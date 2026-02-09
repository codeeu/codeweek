<?php

namespace App\Nova\Actions;

use App\HomeSlide;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class ExportHomeSlideLocaleOverrides extends Action
{
    public $name = 'Export locale overrides (CSV)';

    public function handle(ActionFields $fields, Collection $models)
    {
        $slide = $models->first();
        if (! $slide instanceof HomeSlide) {
            return Action::danger('Please select a homepage slide to export.');
        }

        return Action::redirect(route('admin.home-slides.export-locale-overrides', ['id' => $slide->id]));
    }

    public function fields(NovaRequest $request): array
    {
        return [];
    }
}
