<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Parse the multi-sheet Learn & Teach metadata workbook (one tab per resource group).
 */
class LearnTeachWorkbookParser
{
    public const CSV_HEADERS = [
        'name_of_the_resource',
        'link',
        'description',
        'filters_type',
        'filters_target_audience',
        'filters_level_of_difficulty',
        'filters_programming_language',
        'filters_subject',
        'filters_topics',
        'filters_language',
        'category',
        'group_name',
        'image',
    ];

    public static function looksLikeLearnTeachWorkbook(string $path): bool
    {
        try {
            $spreadsheet = IOFactory::load($path);
        } catch (\Throwable) {
            return false;
        }

        if (count($spreadsheet->getAllSheets()) < 2) {
            return false;
        }

        $header = strtolower(trim((string) $spreadsheet->getSheet(0)->getCell('C1')->getValue()));

        return str_contains($header, 'name of the resource');
    }

    /**
     * @return array<int, array<string, string>>
     */
    public function parse(string $path): array
    {
        $spreadsheet = IOFactory::load($path);
        $rows = [];

        foreach ($spreadsheet->getAllSheets() as $worksheet) {
            $group = trim($worksheet->getTitle());
            $isThirdParty = strcasecmp($group, 'Third party resources') === 0;
            $startRow = $isThirdParty ? 2 : 3;
            $highestRow = (int) $worksheet->getHighestDataRow();

            for ($rowNum = $startRow; $rowNum <= $highestRow; $rowNum++) {
                $cells = [];
                for ($col = 1; $col <= 13; $col++) {
                    $value = $worksheet->getCell([$col, $rowNum])->getValue();
                    $cells[$col] = is_string($value) ? trim($value) : (is_scalar($value) ? trim((string) $value) : '');
                }

                if ($this->rowIsEmpty($cells)) {
                    continue;
                }

                $name = $cells[3] ?? '';
                if ($name === '') {
                    continue;
                }

                if ($isThirdParty) {
                    $language = $cells[12] ?? '';
                } else {
                    $language = $cells[2] ?? '';
                    if ($language === '' || strcasecmp($language, 'language') === 0) {
                        continue;
                    }
                }

                $link = $cells[4] ?? '';
                $image = $this->normalizeImage($cells[13] ?? '');

                $rows[] = [
                    'name_of_the_resource' => $name,
                    'link' => $link,
                    'description' => $cells[5] ?? '',
                    'filters_type' => $cells[6] ?? '',
                    'filters_target_audience' => $cells[7] ?? '',
                    'filters_level_of_difficulty' => $cells[8] ?? '',
                    'filters_programming_language' => $cells[9] ?? '',
                    'filters_subject' => $cells[10] ?? '',
                    'filters_topics' => $cells[11] ?? '',
                    'filters_language' => $language,
                    'category' => '',
                    'group_name' => $isThirdParty ? 'Third party resources' : $group,
                    'image' => $image,
                ];
            }
        }

        return $rows;
    }

    /**
     * @param  array<int, array<string, string>>  $rows
     */
    public function writeCsv(array $rows, string $absolutePath): void
    {
        $handle = fopen($absolutePath, 'w');
        if ($handle === false) {
            throw new \RuntimeException('Could not write import CSV: '.$absolutePath);
        }

        fputcsv($handle, self::CSV_HEADERS);
        foreach ($rows as $row) {
            $line = [];
            foreach (self::CSV_HEADERS as $header) {
                $line[] = $row[$header] ?? '';
            }
            fputcsv($handle, $line);
        }

        fclose($handle);
    }

    /**
     * @param  array<int, string>  $cells
     */
    private function rowIsEmpty(array $cells): bool
    {
        foreach ($cells as $value) {
            if ($value !== '') {
                return false;
            }
        }

        return true;
    }

    private function normalizeImage(string $image): string
    {
        $image = trim($image);
        if ($image === '') {
            return '';
        }

        if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
            if (str_contains($image, ';')) {
                return trim(explode(';', $image)[0]);
            }

            return $image;
        }

        return $image;
    }
}
