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
        $this->assertGreaterThan(200, $parsed['meta']['parsed_rows']);

        $anita = collect($parsed['rows'])->first(fn (array $row) => ($row['email'] ?? '') === 'anitakocunik@wp.pl');
        $this->assertNotNull($anita);
        $this->assertSame(150, $anita['row_number']);
        $this->assertSame('role_add', $anita['operation']);
        $this->assertSame('leading teacher', $anita['role_name']);
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
