<?php

namespace App\Nova\Actions;

use App\HomeSlide;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Http\Requests\NovaRequest;

class ImportHomeSlideLocaleOverrides extends Action
{
    public $name = 'Import locale overrides (CSV)';

    public function handle(ActionFields $fields, Collection $models)
    {
        $slide = $models->first();
        if (! $slide instanceof HomeSlide) {
            return Action::danger('Please select a homepage slide to import into.');
        }

        $file = $fields->csv_file ?? null;
        if (! $file) {
            return Action::danger('Please select a CSV file to import.');
        }

        $path = is_object($file) && method_exists($file, 'getRealPath')
            ? $file->getRealPath()
            : (is_string($file) ? $file : null);
        if (! $path || ! is_readable($path)) {
            return Action::danger('Could not read the uploaded file.');
        }
        $rows = array_map('str_getcsv', file($path));
        if (empty($rows)) {
            return Action::danger('The CSV file is empty.');
        }

        $header = array_map('trim', array_map('strtolower', $rows[0]));
        $localeIndex = array_search('locale', $header, true);
        if ($localeIndex === false) {
            return Action::danger('CSV must have a "locale" column.');
        }

        $titleIndex = array_search('title', $header, true);
        $descIndex = array_search('description', $header, true);
        $btnIndex = array_search('button_text', $header, true);
        $btn2Index = array_search('button2_text', $header, true);

        $overrides = $slide->locale_overrides ?? [];
        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            if (count($row) <= $localeIndex) {
                continue;
            }
            $locale = trim($row[$localeIndex] ?? '');
            if ($locale === '') {
                continue;
            }
            if (! isset($overrides[$locale])) {
                $overrides[$locale] = [];
            }
            if ($titleIndex !== false && isset($row[$titleIndex])) {
                $overrides[$locale]['title'] = trim($row[$titleIndex]);
            }
            if ($descIndex !== false && isset($row[$descIndex])) {
                $overrides[$locale]['description'] = trim($row[$descIndex]);
            }
            if ($btnIndex !== false && isset($row[$btnIndex])) {
                $overrides[$locale]['button_text'] = trim($row[$btnIndex]);
            }
            if ($btn2Index !== false && isset($row[$btn2Index])) {
                $overrides[$locale]['button2_text'] = trim($row[$btn2Index]);
            }
        }

        $slide->locale_overrides = $overrides;
        $slide->save();

        return Action::message('Locale overrides imported. Rows: ' . (count($rows) - 1));
    }

    public function fields(NovaRequest $request): array
    {
        return [
            File::make('CSV file', 'csv_file')
                ->rules('required', 'file', 'mimes:csv,txt')
                ->help('CSV with columns: locale, title, description, button_text, button2_text. Use the Export action to get a template.'),
        ];
    }
}
