<?php

namespace App\Console\Commands;

use App\ResourceItem;
use Illuminate\Console\Command;

/**
 * Export Learn & Teach ResourceItem S3 URLs so you can rename local import files
 * to match production basenames, then run resources:import --preserve-filenames.
 */
class ResourcesExportS3Urls extends Command
{
    protected $signature = 'resources:export-s3-urls
                            {--active-only : Only rows with active=1}
                            {--json : Output JSON array instead of CSV}';

    protected $description = 'Export ResourceItem id, name, source, thumbnail (for matching local filenames to live S3 keys)';

    public function handle(): int
    {
        $q = ResourceItem::query()->orderBy('id');
        if ($this->option('active-only')) {
            $q->where('active', true);
        }
        $rows = $q->get(['id', 'name', 'source', 'thumbnail']);

        if ($this->option('json')) {
            $this->line($rows->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            return self::SUCCESS;
        }

        $out = fopen('php://temp', 'r+');
        fputcsv($out, ['id', 'name', 'source', 'thumbnail', 'pdf_basename', 'thumb_basename']);
        foreach ($rows as $r) {
            $src = (string) ($r->source ?? '');
            $thumb = (string) ($r->thumbnail ?? '');
            fputcsv($out, [
                $r->id,
                $r->name,
                $src,
                $thumb,
                $src !== '' ? basename(parse_url($src, PHP_URL_PATH) ?: $src) : '',
                $thumb !== '' ? basename(parse_url($thumb, PHP_URL_PATH) ?: $thumb) : '',
            ]);
        }
        rewind($out);
        $this->output->write(stream_get_contents($out) ?: '');
        fclose($out);

        return self::SUCCESS;
    }
}
