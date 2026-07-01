<?php

namespace Tests\Unit;

use App\Services\BulkEventImportResult;
use App\Services\BulkEventUploadCache;
use Tests\TestCase;

final class BulkEventUploadCacheTest extends TestCase
{
    public function test_preview_from_result_uses_failures_only_for_large_uploads(): void
    {
        $result = new BulkEventImportResult;
        $result->rowsProcessed = 600;

        for ($row = 2; $row <= 601; $row++) {
            if ($row === 42) {
                continue;
            }
            $result->addValid($row);
        }
        $result->addFailure(42, 'Row 42 — bad date');

        $preview = BulkEventUploadCache::previewFromResult($result);

        $this->assertTrue($preview['failures_only']);
        $this->assertSame(599, $preview['valid_count']);
        $this->assertSame(600, $preview['total_count']);
        $this->assertCount(1, $preview['row_statuses']);
        $this->assertSame(42, $preview['row_statuses'][0]['row']);
    }
}
