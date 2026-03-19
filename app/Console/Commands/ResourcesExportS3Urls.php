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
                            {--json : Output JSON array instead of CSV}
                            {--output= : Write CSV or JSON to this path (e.g. storage/app/resources_s3_urls.csv)}';

    protected $description = 'Export ResourceItem id, name, source, thumbnail (for matching local filenames to live S3 keys)';

    public function handle(): int
    {
        $q = ResourceItem::query()->orderBy('id');
        if ($this->option('active-only')) {
            $q->where('active', true);
        }
        $rows = $q->get(['id', 'name', 'source', 'thumbnail']);

        $outputPath = $this->option('output');
        $outputPath = is_string($outputPath) ? trim($outputPath) : '';

        if ($this->option('json')) {
            $payload = $rows->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            if ($outputPath !== '') {
                $full = $this->resolveOutputPath($outputPath);
                if ($full === null) {
                    return self::FAILURE;
                }
                file_put_contents($full, $payload);
                $this->info("Wrote JSON ({$rows->count()} items) to: {$full}");

                return self::SUCCESS;
            }
            $this->line($payload);

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
        $csv = stream_get_contents($out) ?: '';
        fclose($out);

        if ($outputPath !== '') {
            $full = $this->resolveOutputPath($outputPath);
            if ($full === null) {
                return self::FAILURE;
            }
            file_put_contents($full, $csv);
            $this->info("Wrote CSV ({$rows->count()} rows) to: {$full}");

            return self::SUCCESS;
        }

        $this->output->write($csv);

        return self::SUCCESS;
    }

    /**
     * @return string|null Absolute path, or null on error
     */
    private function resolveOutputPath(string $path): ?string
    {
        $full = str_starts_with($path, DIRECTORY_SEPARATOR) || preg_match('#^[a-zA-Z]:\\\\#', $path) === 1
            ? $path
            : base_path($path);

        $dir = dirname($full);
        if (! is_dir($dir)) {
            if (! @mkdir($dir, 0755, true) && ! is_dir($dir)) {
                $this->error("Cannot create directory: {$dir}");

                return null;
            }
        }

        return $full;
    }
}
