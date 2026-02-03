<?php

namespace App\Imports;

use App\ResourceItem;
use App\ResourceType;
use App\Services\ResourcesImportResult;
use App\ResourceLevel;
use App\ResourceProgrammingLanguage;
use App\ResourceSubject;
use App\ResourceCategory;
use App\ResourceLanguage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Illuminate\Support\Str;

class ResourcesImport extends DefaultValueBinder implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    /**
     * Folder images upload to S3
     */
    protected $imagesDir;

    /**
     * Folder PDF upload to S3
     */
    protected $pdfsDir;

    protected $focus;

    /**
     * Row index => column overrides (e.g. from web preview edits). Keys are 0-based data row index.
     */
    protected $overrides;

    /** Current 0-based row index (first data row = 0). */
    protected $currentRowIndex = 0;

    /** Optional result collector for web import report. */
    protected ?ResourcesImportResult $result = null;

    // public
    private $disk = 'resources';

    public function __construct($imagesDir = null, $pdfsDir = null, $focus = false, array $overrides = [], ?ResourcesImportResult $result = null)
    {
        $this->imagesDir = $imagesDir;
        $this->focus = $focus;
        $this->pdfsDir = $pdfsDir;
        $this->overrides = $overrides;
        $this->result = $result;
    }

    protected function createOrGetModel($class, $name)
    {
        $name = ucwords(mb_strtolower(trim($name)));

        return $class::create([
            'name' => $name,
            'position' => 0,
            'active' => true,
            'teach' => true,
            'learn' => true,
        ]);
    }

    protected function parseArray($value)
    {
        if (is_array($value)) return $value;
        if (is_string($value)) return array_filter(array_map('trim', preg_split('/[,;|]/', $value)));
        return [];
    }

    /**
     * Get first non-empty value from row for given keys (supports alternate Excel column names).
     *
     * @param  array<string, mixed>  $row
     * @param  array<string>  $keys
     * @return mixed
     */
    protected function getRowValue(array $row, array $keys)
    {
        foreach ($keys as $key) {
            $v = $row[$key] ?? null;
            if ($v !== null && $v !== '') {
                return $v;
            }
        }
        return null;
    }

    public function model(array $row): ?Model
    {
        $rowIndex = $this->currentRowIndex++;
        if (isset($this->overrides[$rowIndex]) && is_array($this->overrides[$rowIndex])) {
            $row = array_merge($row, $this->overrides[$rowIndex]);
        }

        if (empty($row['name_of_the_resource'])) {
            Log::warning('[ResourcesImport] Missing name_of_the_resource', $row);
            if ($this->result) {
                $this->result->addFailure($rowIndex + 1, 'Missing name_of_the_resource');
            }
            return null;
        }

        try {
            return $this->processRow($row, $rowIndex);
        } catch (\Throwable $e) {
            Log::warning('[ResourcesImport] Row ' . ($rowIndex + 1) . ' failed: ' . $e->getMessage(), ['row' => $row]);
            if ($this->result) {
                $this->result->addFailure($rowIndex + 1, $e->getMessage());
            }
            return null;
        }
    }

    /**
     * Process a single row and return the created ResourceItem (or null).
     */
    protected function processRow(array $row, int $rowIndex): ?Model
    {
        $thumbnail = null;
        $imageValue = trim((string) ($row['image'] ?? ''));
        if ($imageValue !== '') {
            if (str_starts_with($imageValue, 'http://') || str_starts_with($imageValue, 'https://')) {
                $thumbnail = $imageValue;
            } elseif ($this->imagesDir) {
                $localPath = $this->imagesDir . DIRECTORY_SEPARATOR . $imageValue;
                if (file_exists($localPath)) {
                    $ext = pathinfo($imageValue, PATHINFO_EXTENSION) ?: 'jpg';
                    $basename = Str::slug($row['name_of_the_resource']) . '-' . time() . '.' . $ext;
                    Storage::disk($this->disk)->put($basename, file_get_contents($localPath));
                    $thumbnail = Storage::disk($this->disk)->url($basename);
                } else {
                    Log::warning("[ResourcesImport] Image not found: $localPath");
                }
            }
        }

        $pdfLink = null;
        if (!empty($row['link']) && stripos($row['link'], 'http://') !== 0 && stripos($row['link'], 'https://') !== 0 && $this->pdfsDir) {
            $groupName = !empty($row['group_name']) ? trim($row['group_name']) : '';
            $groupSlug = $groupName ? Str::slug($groupName) : 'default';

            $searchBase = $groupName ? $this->pdfsDir . DIRECTORY_SEPARATOR . $groupName : $this->pdfsDir;
            $pdfFilename = basename($row['link']);
            $pdfLocalPath = null;

            if (is_dir($searchBase)) {
                $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($searchBase));
                foreach ($rii as $file) {
                    if ($file->isFile() && strcasecmp($file->getFilename(), $pdfFilename) === 0) {
                        $pdfLocalPath = $file->getPathname();
                        break;
                    }
                }
            }

            if ($pdfLocalPath && file_exists($pdfLocalPath)) {
                $ext = pathinfo($pdfFilename, PATHINFO_EXTENSION) ?: 'pdf';
                $basename = Str::slug(pathinfo($pdfFilename, PATHINFO_FILENAME)) . '-' . time() . '.' . $ext;
                $storagePath = $groupSlug . '/' . $basename;
                Storage::disk($this->disk)->put($storagePath, file_get_contents($pdfLocalPath));
                $pdfLink = Storage::disk($this->disk)->url($storagePath);
            } else {
                Log::warning("[ResourcesImport] PDF not found: {$row['link']} in {$searchBase}");
            }
        }

        $groups = [];
        if (!empty($row['category'])) {
            $groups = $this->parseArray($row['category']);
        }

        $name = trim($row['name_of_the_resource']);
        $source = $pdfLink ?: trim($row['link'] ?? '');
        $itemAttributes = [
            'name' => $name,
            'source' => $source,
            'description' => trim($row['description'] ?? ''),
            'thumbnail' => $thumbnail,
            'learn' => true,
            'teach' => true,
            'active' => true,
            'weight' => \Carbon\Carbon::now()->format('Y'),
        ];
        if (Schema::hasColumn((new ResourceItem)->getTable(), 'groups')) {
            $itemAttributes['groups'] = $groups;
        }

        $item = ResourceItem::where('name', $name)->where('source', $source)->first();
        if ($item) {
            $item->fill($itemAttributes);
            $item->save();
            if ($this->result) {
                $this->result->addUpdated($item);
            }
        } else {
            $item = new ResourceItem($itemAttributes);
            $item->save();
            if ($this->result) {
                $this->result->addCreated($item);
            }
        }

        // Collect relation IDs then sync (so updates replace relations; no duplicates)
        $typeIds = [];
        foreach ($this->parseArray($this->getRowValue($row, ['filters_type', 'type']) ?? []) as $type) {
            $model = ResourceType::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($type))])->first();
            if ($model) {
                $typeIds[] = $model->id;
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceType::class, trim($type));
                $typeIds[] = $model->id;
            } else {
                Log::warning("[ResourcesImport] ResourceType not found: $type");
            }
        }
        $item->types()->sync(array_unique($typeIds));

        $levelIds = [];
        foreach ($this->parseArray($this->getRowValue($row, ['filters_target_audience', 'target_audience']) ?? []) as $aud) {
            $model = ResourceLevel::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($aud))])->first();
            if ($model) {
                $levelIds[] = $model->id;
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceLevel::class, trim($aud));
                $levelIds[] = $model->id;
            } else {
                Log::warning("[ResourcesImport] ResourceLevel (target_audience) not found: $aud");
            }
        }
        foreach ($this->parseArray($this->getRowValue($row, ['filters_level_of_difficulty', 'level_of_difficulty']) ?? []) as $level) {
            $model = ResourceLevel::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($level))])->first();
            if ($model) {
                $levelIds[] = $model->id;
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceLevel::class, trim($level));
                $levelIds[] = $model->id;
            } else {
                Log::warning("[ResourcesImport] ResourceLevel (level_of_difficulty) not found: $level");
            }
        }
        $item->levels()->sync(array_unique($levelIds));

        $programmingLanguageIds = [];
        foreach ($this->parseArray($this->getRowValue($row, ['filters_programming_language', 'programming_language']) ?? []) as $lang) {
            $model = ResourceProgrammingLanguage::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($lang))])->first();
            if ($model) {
                $programmingLanguageIds[] = $model->id;
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceProgrammingLanguage::class, trim($lang));
                $programmingLanguageIds[] = $model->id;
            } else {
                Log::warning("[ResourcesImport] ResourceProgrammingLanguage not found: $lang");
            }
        }
        $item->programmingLanguages()->sync(array_unique($programmingLanguageIds));

        $subjectIds = [];
        foreach ($this->parseArray($this->getRowValue($row, ['filters_subject', 'filters_subjects', 'subjects', 'subject', 'filter_subject']) ?? []) as $subject) {
            $model = ResourceSubject::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($subject))])->first();
            if ($model) {
                $subjectIds[] = $model->id;
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceSubject::class, trim($subject));
                $subjectIds[] = $model->id;
            } else {
                Log::warning("[ResourcesImport] ResourceSubject not found: $subject");
            }
        }
        $item->subjects()->sync(array_unique($subjectIds));

        $categoryIds = [];
        foreach ($this->parseArray($this->getRowValue($row, ['filters_topics', 'topics']) ?? []) as $topic) {
            $model = ResourceCategory::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($topic))])->first();
            if ($model) {
                $categoryIds[] = $model->id;
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceCategory::class, trim($topic));
                $categoryIds[] = $model->id;
            } else {
                Log::warning("[ResourcesImport] ResourceCategory (topic) not found: $topic");
            }
        }
        $item->categories()->sync(array_unique($categoryIds));

        $languageIds = [];
        foreach ($this->parseArray($this->getRowValue($row, ['filters_language', 'language']) ?? []) as $lang) {
            $model = ResourceLanguage::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($lang))])->first();
            if ($model) {
                $languageIds[] = $model->id;
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceLanguage::class, trim($lang));
                $languageIds[] = $model->id;
            } else {
                Log::warning("[ResourcesImport] ResourceLanguage not found: $lang");
            }
        }
        $item->languages()->sync(array_unique($languageIds));

        return $item;
    }
}
