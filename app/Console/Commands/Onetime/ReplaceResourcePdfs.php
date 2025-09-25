<?php
namespace App\Console\Commands\Onetime;

use App\ResourceItem;
use App\ResourceLanguage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Str;
use Throwable;

/**
 * Replace (overwrite in-place) existing ResourceItem->source PDFs using a simple Excel mapping.
 *
 */
class ReplaceResourcePdfs extends Command
{
    /**
     * @var string Command name/signature.
     */
    protected $signature = 'resources:replace-pdfs';

    /**
     * @var string Command description.
     */
    protected $description = 'Overwrite existing ResourceItem PDF files in-place from an Excel mapping (one-off fix).';

    /**
     * @var string Absolute path to the Excel file (hardcoded for one-off run).
     */
    private string $EXCEL_PATH = 'storage/app/resources/replace_pdfs.xlsx';

    /**
     * @var string Absolute path to the base directory that contains new localized PDFs (hardcoded for one-off run).
     */
    private string $PDFS_BASE = 'storage/app/resources/new_pdfs';

    /**
     * @var string Storage disk name where resources live (must match importer: "resources").
     */
    private string $DISK = 'resources';

    /**
     * @var array<string,string> Language aliases for matching DB ResourceLanguage.
     */
    private array $LANG_ALIASES = [
        'suomi'  => 'Finnish',
        'slovak' => 'Slovakian',
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $report = [
            'replaced_in_place'   => [],
            'updated_url'         => [],
            'not_found_resource'  => [],
            'skipped_pdf_missing' => [],
            'failed'              => [],
        ];

        try {
            $this->validatePrerequisites();

            $excelPath = $this->absPath($this->EXCEL_PATH);
            $sheet = IOFactory::load($excelPath)->getActiveSheet();
            $rows  = $sheet->toArray(null, true, true, true);

            if (!$rows || count($rows) < 2) {
                $this->error('Excel has no data rows.');
                return self::FAILURE;
            }

            [$colName, $colLink, $colLang] = $this->resolveHeaderIndices(array_shift($rows));
            if ($colName === null || $colLink === null || $colLang === null) {
                $this->error('Missing required headers: "Name of the Resource", "Link", "Filters -  LANGUAGE".');
                return self::FAILURE;
            }

            $pdfsBase = $this->absPath($this->PDFS_BASE);
            $pdfIndex = $this->indexPdfs($pdfsBase);
            $disk     = Storage::disk($this->DISK);

            foreach ($rows as $i => $row) {
                $rowNum = $i + 2;
                try {
                    $name = trim((string)($row[$colName] ?? ''));
                    $link = trim((string)($row[$colLink] ?? ''));
                    $lang = trim((string)($row[$colLang] ?? ''));

                    if ($name === '' || $link === '') {
                        $this->warn("Row {$rowNum}: skipped (empty Name or Link)");
                        continue;
                    }

                    $dbLang = $this->mapLanguage($lang);
                    $item   = $this->findItem($name, $dbLang);

                    if (!$item) {
                        $report['not_found_resource'][] = ['row' => $rowNum, 'name' => $name, 'lang' => $dbLang];
                        $this->error("Row {$rowNum}: Resource not found for name=\"{$name}\"".($dbLang ? " lang=\"{$dbLang}\"" : ''));
                        continue;
                    }

                    $pdfPath = $this->lookupPdf($pdfIndex, $link);
                    if (!$pdfPath) {
                        $report['skipped_pdf_missing'][] = ['row' => $rowNum, 'filename' => $link];
                        $this->error("Row {$rowNum}: PDF not found in base folder for filename=\"{$link}\"");
                        continue;
                    }
                    
                    $key = $this->resolveStorageKeyFromUrl($item->source);

                    if ($key) {
                        $newUrl = $this->overwritePdfAndReturnUrl($disk, $key, $pdfPath);
                        $prev   = (string)$item->source;
                        
                        $item->source = $newUrl;
                        $item->save();

                        $report['replaced_in_place'][] = [
                            'row' => $rowNum, 'id' => $item->id, 'key' => $key,
                            'url_changed' => $prev === $newUrl ? 'no' : 'yes'
                        ];
                        $this->info("Row {$rowNum}: REPLACED_IN_PLACE item#{$item->id} ({$key})");
                    } else {
                        $newUrl = $this->uploadNewAndLink($disk, $item, $pdfPath, $dbLang);
                        $prev   = (string)$item->source;

                        $item->source = $newUrl;
                        $item->save();

                        $report['updated_url'][] = [
                            'row' => $rowNum, 'id' => $item->id,
                            'prev' => $prev, 'new' => $newUrl
                        ];
                        $this->info("Row {$rowNum}: UPDATED_URL item#{$item->id} {$prev} -> {$newUrl}");
                    }
                } catch (\Throwable $e) {
                    $report['failed'][] = ['row' => $rowNum, 'error' => $e->getMessage()];
                    Log::error('[ReplaceResourcePdfs] Row error', ['row' => $rowNum, 'error' => $e]);
                    $this->error("Row {$rowNum}: ".$e->getMessage());
                }
            }

            // Summary (explicitly prints cases that were NOT replaced)
            $this->line('--- SUMMARY ------------------------------------------------');
            $this->line('Replaced in place: '.count($report['replaced_in_place']));
            $this->line('Updated URL:       '.count($report['updated_url']));
            $this->line('Not found item:    '.count($report['not_found_resource']));
            $this->line('PDF missing:       '.count($report['skipped_pdf_missing']));
            $this->line('Failed:            '.count($report['failed']));
            $this->line('------------------------------------------------------------');
            
            if ($report['not_found_resource']) {
                $this->warn('DETAILS not_found_resource: '.json_encode($report['not_found_resource'], JSON_UNESCAPED_UNICODE));
            }
            if ($report['skipped_pdf_missing']) {
                $this->warn('DETAILS skipped_pdf_missing: '.json_encode($report['skipped_pdf_missing'], JSON_UNESCAPED_UNICODE));
            }
            if ($report['failed']) {
                $this->warn('DETAILS failed: '.json_encode($report['failed'], JSON_UNESCAPED_UNICODE));
            }
            
            return ($report['not_found_resource'] || $report['skipped_pdf_missing'] || $report['failed'])
                ? self::FAILURE
                : self::SUCCESS;

        } catch (\Throwable $e) {
            Log::error('[ReplaceResourcePdfs] Fatal', ['error' => $e]);
            $this->error($e->getMessage());
            return self::FAILURE;
        }
    }

    /**
     * Resolve a file/dir path to an absolute path across environments.
     *
     * @param  string $path
     * @return string
     *
     * @throws \RuntimeException when the path cannot be resolved to an existing file/dir
     */
    private function absPath(string $path): string
    {
        $path = trim($path);

        $candidate = base_path(ltrim($path, './\\/'));
        if (file_exists($candidate)) {
            return realpath($candidate) ?: $candidate;
        }

        $normalized = ltrim($path, './\\/');
        if (str_starts_with($normalized, 'storage/')) {
            $inStorage = storage_path(substr($normalized, strlen('storage/')));
            if (file_exists($inStorage)) {
                return realpath($inStorage) ?: $inStorage;
            }
        }

        throw new \RuntimeException("Cannot resolve path: {$path}");
    }

    /**
     * Validate hardcoded paths and disk.
     *
     * @return void
     */
    private function validatePrerequisites(): void
    {
        $excelPath = $this->absPath($this->EXCEL_PATH);
        if (!is_file($excelPath)) {
            throw new \RuntimeException("Excel not found: {$excelPath}");
        }
        $pdfsBase = $this->absPath($this->PDFS_BASE);
        if (!is_dir($pdfsBase)) {
            throw new \RuntimeException("PDFs base dir not found: {$pdfsBase}");
        }
        Storage::disk($this->DISK);
    }

    /**
     * Resolve required column letters by header names (case/space tolerant).
     *
     * @param array<string,string|null> $header
     * @return array{0:?string,1:?string,2:?string}
     */
    private function resolveHeaderIndices(array $header): array
    {
        $norm = [];
        foreach ($header as $col => $val) {
            $k = $this->normalizeHeader((string)$val);
            if ($k !== '') $norm[$k] = $col;
        }

        return [
            $norm['name of the resource'] ?? null,
            $norm['link'] ?? null,
            $norm['filters - language'] ?? $norm['filters-language'] ?? null,
        ];
    }

    /**
     * Normalize header string.
     *
     * @param string $v
     * @return string
     */
    private function normalizeHeader(string $v): string
    {
        $v = mb_strtolower(trim($v));
        $v = preg_replace('/\s+/', ' ', $v);
        $v = str_replace([' – ', ' — ', ' -  ', '  -', '-  '], ' - ', $v);
        $v = preg_replace('/\s+/', ' ', $v);
        return $v ?? '';
    }

    /**
     * Map Excel language to DB language name (handles SUOMI/SLOVAK aliases).
     *
     * @param string $lang
     * @return string|null
     */
    private function mapLanguage(string $lang): ?string
    {
        if ($lang === '') return null;
        $k = mb_strtolower($lang);
        if (isset($this->LANG_ALIASES[$k])) return $this->LANG_ALIASES[$k];
        return ucwords($k);
    }

    /**
     * Find a ResourceItem by exact name and optional language filter.
     *
     * @param string      $name
     * @param string|null $dbLanguage
     * @return ResourceItem|null
     */
    private function findItem(string $name, ?string $dbLanguage): ?ResourceItem
    {
        $q = ResourceItem::query()->where('name', $name);

        if ($dbLanguage) {
            $lang = ResourceLanguage::whereRaw('LOWER(name) = ?', [mb_strtolower($dbLanguage)])->first();
            if ($lang) {
                $q->whereHas('languages', fn($qq) => $qq->where('resource_language_id', $lang->id));
            }
        }

        return $q->orderByDesc('id')->first();
    }

    /**
     * Build a case-insensitive filename index of all PDFs under base.
     *
     * @param string $base
     * @return array<string,string> [lowercase filename => absolute path]
     */
    private function indexPdfs(string $base): array
    {
        $idx = [];
        $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($base, \FilesystemIterator::SKIP_DOTS));
        foreach ($rii as $file) {
            if ($file->isFile() && mb_strtolower($file->getExtension() ?: '') === 'pdf') {
                $idx[mb_strtolower($file->getFilename())] = $file->getPathname();
            }
        }
        $this->line('Indexed PDFs: '.number_format(count($idx)));
        return $idx;
    }

    /**
     * Lookup PDF path by exact filename (case-insensitive). Requires ".pdf" present or will append it.
     *
     * @param array<string,string> $pdfIndex
     * @param string               $filename
     * @return string|null
     */
    private function lookupPdf(array $pdfIndex, string $filename): ?string
    {
        $needle = mb_strtolower(trim($filename));
        if ($needle === '') return null;
        if (!str_ends_with($needle, '.pdf')) $needle .= '.pdf';
        return $pdfIndex[$needle] ?? null;
    }

    /**
     * Resolve storage object key from a public URL or stored path (same disk).
     *
     * @param string|null $url
     * @return string|null
     */
    private function resolveStorageKeyFromUrl(?string $url): ?string
    {
        if (!$url) return null;

        $disk   = Storage::disk($this->DISK);
        $base   = rtrim((string)$disk->url(''), '/') . '/';

        // Relative key already?
        if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            return ltrim($url, '/');
        }

        // Same disk base URL
        if (str_starts_with($url, $base)) {
            $key = ltrim(substr($url, strlen($base)), '/');
            return $key !== '' ? $key : null;
        }
        
        $srcPath  = ltrim((string)parse_url($url, PHP_URL_PATH), '/');
        $basePath = ltrim((string)parse_url($base, PHP_URL_PATH), '/');

        if ($basePath && str_starts_with($srcPath, $basePath)) {
            $candidate = ltrim(substr($srcPath, strlen($basePath)), '/');
            return $candidate !== '' ? $candidate : null;
        }
        
        if ($srcPath && $disk->exists($srcPath)) {
            return $srcPath;
        }

        return null;
    }

    /**
     * Overwrite an existing S3 object and return its public URL (URL stays the same key).
     *
     * @param \Illuminate\Contracts\Filesystem\Filesystem $disk
     * @param string                                      $key
     * @param string                                      $absPdfPath
     * @return string
     */
    private function overwritePdfAndReturnUrl($disk, string $key, string $absPdfPath): string
    {
        $content = @file_get_contents($absPdfPath);
        if ($content === false) {
            throw new \RuntimeException("Cannot read file: {$absPdfPath}");
        }

        $disk->put($key, $content, ['visibility' => 'public']);

        return $disk->url($key);
    }

    /**
     * Upload a new object to S3 and return its public URL (also used to UPDATE DB->source).
     * Path scheme: pdfs/{Y}/{m}/{slug(name)}{ -Lang }.pdf
     *
     * @param \Illuminate\Contracts\Filesystem\Filesystem $disk
     * @param \App\ResourceItem                           $item
     * @param string                                      $absPdfPath
     * @param string|null                                 $dbLang
     * @return string
     */
    private function uploadNewAndLink($disk, ResourceItem $item, string $absPdfPath, ?string $dbLang): string
    {
        $content = @file_get_contents($absPdfPath);
        if ($content === false) {
            throw new \RuntimeException("Cannot read file: {$absPdfPath}");
        }

        $langSuffix = $dbLang ? ('-'.Str::slug($dbLang)) : '';
        $ext        = 'pdf';
        $fname      = Str::slug(pathinfo($absPdfPath, PATHINFO_FILENAME)) ?: Str::slug($item->name);
        $key        = sprintf(
            'pdfs/%s/%s/%s%s.pdf',
            now()->format('Y'),
            now()->format('m'),
            $fname,
            $langSuffix
        );
        
        if ($disk->exists($key)) {
            $key = sprintf(
                'pdfs/%s/%s/%s%s-%s.%s',
                now()->format('Y'),
                now()->format('m'),
                $fname,
                $langSuffix,
                substr(sha1($absPdfPath.microtime(true)), 0, 6),
                $ext
            );
        }

        $disk->put($key, $content, ['visibility' => 'public']);
        return $disk->url($key);
    }
}
