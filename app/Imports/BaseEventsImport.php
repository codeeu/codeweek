<?php

namespace App\Imports;

use App\Theme;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;

abstract class BaseEventsImport extends DefaultValueBinder
{
    protected function parseDate($value)
    {
        return is_numeric($value) ? Date::excelToDateTimeObject($value) : null;
    }

    protected function parseArray($value): array
    {
        if (is_array($value)) return $value;
        if (is_string($value)) return array_filter(array_map('trim', explode(',', $value)));
        return [];
    }

    protected function parseBool($value): bool
    {
        return in_array(strtolower(trim((string) $value)), ['1', 'true', 'yes', 'x'], true);
    }

    protected function validateMultiChoice(?string $input, array $valid): array
    {
        return collect(explode(',', $input))
            ->map(fn($v) => trim($v))
            ->filter(fn($v) => in_array($v, $valid, true))
            ->values()
            ->all();
    }

    protected function validateSingleChoice(?string $input, array $valid): ?string
    {
        return in_array($input, $valid, true) ? $input : null;
    }

    protected function validateThemes(string $input): array
    {
        if (empty($input)) {
            return [];
        }
        
        $themeIds = array_unique(array_filter(array_map('trim', explode(',', $input))));

        // Mapping deleted old id to new id group
        $themeIdMapping = [
            7 => 6,
            10 => 9,
            12 => 1,
            15 => 16,
        ];

        $mappedThemeIds = array_map(function ($id) use ($themeIdMapping) {
            return $themeIdMapping[$id] ?? $id;
        }, $themeIds);

        $validThemeIds = Theme::whereIn('id', $mappedThemeIds)->pluck('id')->toArray();

        return $validThemeIds;
    }
}
