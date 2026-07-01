<?php

namespace Tests\Unit\BulkUserChanges;

use App\Services\BulkUserChanges\BulkUserChangesSheetReader;
use Tests\TestCase;

final class BulkUserChangesSheetReaderTest extends TestCase
{
    public function test_reads_changes_sheet_and_finds_anita_row(): void
    {
        $path = base_path('docs/internal/C4EU_20240801_EUCodeWeek ALTEC Contacts_edited for website.xlsx');
        if (! is_file($path)) {
            $this->markTestSkipped('Fixture spreadsheet not present.');
        }

        $parsed = app(BulkUserChangesSheetReader::class)->read($path);

        $this->assertSame('Changes', $parsed['sheet_name']);
        $this->assertGreaterThan(0, $parsed['header_row']);
        $this->assertSame(273, $parsed['meta']['last_data_row']);
        $this->assertSame('joanna.lasek@malmo.se', $parsed['meta']['last_email']);
        $this->assertGreaterThan(100, $parsed['meta']['parsed_rows']);
        $this->assertLessThan(200, $parsed['meta']['parsed_rows']);

        $anita = collect($parsed['rows'])->first(fn (array $row) => ($row['email'] ?? '') === 'anitakocunik@wp.pl');
        $this->assertNotNull($anita);
        $this->assertSame(150, $anita['row_number']);
        $this->assertSame('role_add', $anita['operation']);
        $this->assertSame('leading teacher', $anita['role_name']);
    }

    public function test_ignore_through_row_skips_earlier_batches(): void
    {
        $path = base_path('docs/internal/C4EU_20240801_EUCodeWeek ALTEC Contacts_edited for website.xlsx');
        if (! is_file($path)) {
            $this->markTestSkipped('Fixture spreadsheet not present.');
        }

        $options = new \App\Services\BulkUserChanges\BulkUserChangesReadOptions(ignoreThroughRow: 149);
        $parsed = app(BulkUserChangesSheetReader::class)->read($path, null, $options);

        $this->assertSame(149, $parsed['meta']['ignore_through_row']);
        $this->assertSame(148, $parsed['meta']['skipped_ignored_range_rows']);
        $this->assertSame('anitakocunik@wp.pl', $parsed['meta']['first_email']);
        $this->assertSame('joanna.lasek@malmo.se', $parsed['meta']['last_email']);
        $this->assertSame(150, $parsed['meta']['first_data_row']);
        $this->assertGreaterThan(110, $parsed['meta']['parsed_rows']);
        $this->assertLessThan(130, $parsed['meta']['parsed_rows']);
    }

    public function test_reads_current_batch_when_older_rows_are_removed(): void
    {
        $fixture = base_path('docs/internal/C4EU_20240801_EUCodeWeek ALTEC Contacts_edited for website.xlsx');
        if (! is_file($fixture)) {
            $this->markTestSkipped('Fixture spreadsheet not present.');
        }

        $path = sys_get_temp_dir().'/bulk_user_changes_trimmed_'.uniqid().'.xlsx';
        $source = \PhpOffice\PhpSpreadsheet\IOFactory::load($fixture)->getSheetByName('Changes');
        $workbook = new \PhpOffice\PhpSpreadsheet\Spreadsheet;
        $sheet = $workbook->getActiveSheet();
        $sheet->setTitle('Changes');

        for ($column = 1; $column <= 14; $column++) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($column);
            $sheet->setCellValue($columnLetter.'1', $source->getCell($columnLetter.'1')->getValue());
        }

        $targetRow = 2;
        for ($sourceRow = 150; $sourceRow <= 273; $sourceRow++) {
            for ($column = 1; $column <= 14; $column++) {
                $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($column);
                $sheet->setCellValue($columnLetter.$targetRow, $source->getCell($columnLetter.$sourceRow)->getValue());
            }
            $targetRow++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($workbook);
        $writer->save($path);

        try {
            $parsed = app(BulkUserChangesSheetReader::class)->read($path);

            $this->assertSame(2, $parsed['meta']['first_data_row']);
            $this->assertSame('anitakocunik@wp.pl', $parsed['meta']['first_email']);
            $this->assertSame('joanna.lasek@malmo.se', $parsed['meta']['last_email']);
            $this->assertGreaterThan(110, $parsed['meta']['parsed_rows']);
            $this->assertLessThan(130, $parsed['meta']['parsed_rows']);
        } finally {
            @unlink($path);
        }
    }

    public function test_rejects_workbook_without_changes_sheet(): void
    {
        $path = sys_get_temp_dir().'/bulk_user_changes_no_changes_'.uniqid().'.xlsx';
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet;
        $spreadsheet->getActiveSheet()->setTitle('Contacts');
        $spreadsheet->getActiveSheet()->setCellValue('A1', 'Country');
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($path);

        try {
            $this->expectException(\InvalidArgumentException::class);
            $this->expectExceptionMessage('No sheet named "Changes" found');

            app(BulkUserChangesSheetReader::class)->read($path);
        } finally {
            @unlink($path);
        }
    }
}
