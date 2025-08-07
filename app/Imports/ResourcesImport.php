<?php

namespace App\Imports;

use App\ResourceItem;
use App\ResourceType;
use App\ResourceLevel;
use App\ResourceProgrammingLanguage;
use App\ResourceSubject;
use App\ResourceCategory;
use App\ResourceLanguage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Illuminate\Support\Str;

class ResourcesImport extends DefaultValueBinder implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    protected $imagesDir;

    protected $focus;

    // public
    private $disk = 'resources';

    public function __construct($imagesDir = null, $focus = false)
    {
        $this->imagesDir = $imagesDir;
        $this->focus = $focus;
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

    public function model(array $row): ?Model
    {
        if (empty($row['name_of_the_resource'])) {
            Log::warning('[ResourcesImport] Missing name_of_the_resource', $row);
            return null;
        }

        $thumbnail = null;
        if (!empty($row['image']) && $this->imagesDir) {
            $localPath = $this->imagesDir . DIRECTORY_SEPARATOR . $row['image'];
            if (file_exists($localPath)) {
                $ext = pathinfo($row['image'], PATHINFO_EXTENSION) ?: 'jpg';
                $basename = Str::slug($row['name_of_the_resource']) . '-' . time() . '.' . $ext;
                Storage::disk($this->disk)->put($basename, file_get_contents($localPath));
                $thumbnail = Storage::disk($this->disk)->url($basename);
            } else {
                Log::warning("[ResourcesImport] Image not found: $localPath");
            }
        }

        $groups = [];
        if (!empty($row['category'])) {
            $groups = $this->parseArray($row['category']);
        }

        $item = new ResourceItem([
            'name' => trim($row['name_of_the_resource']),
            'source' => trim($row['link'] ?? ''),
            'description' => trim($row['description'] ?? ''),
            'thumbnail' => $thumbnail,
            'learn' => true,
            'teach' => true,
            'active' => true,
            'weight' => \Carbon\Carbon::now()->format('Y'),
            'groups' => $groups,
        ]);
        $item->save();

        // Attach relations
        // TYPE (ResourceType)
        $types = $this->parseArray($row['filters_type'] ?? []);
        foreach ($types as $type) {
            $model = ResourceType::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($type))])->first();
            if ($model) {
                $item->types()->attach($model->id);
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceType::class, trim($type));
                $item->types()->attach($model->id);
            } else {
                Log::warning("[ResourcesImport] ResourceType not found: $type");
            }
        }

        // TARGET AUDIENCE (ResourceLevel)
        $audiences = $this->parseArray($row['filters_target_audience'] ?? []);
        foreach ($audiences as $aud) {
            $model = ResourceLevel::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($aud))])->first();
            if ($model) {
                $item->levels()->attach($model->id);
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceLevel::class, trim($aud));
                $item->levels()->attach($model->id);
            } else {
                Log::warning("[ResourcesImport] ResourceLevel (target_audience) not found: $aud");
            }
        }

        // LEVEL OF DIFFICULTY (ResourceLevel)
        $levels = $this->parseArray($row['filters_level_of_difficulty'] ?? []);
        foreach ($levels as $level) {
            $model = ResourceLevel::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($level))])->first();
            if ($model) {
                $item->levels()->attach($model->id);
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceLevel::class, trim($level));
                $item->levels()->attach($model->id);
            } else {
                Log::warning("[ResourcesImport] ResourceLevel (level_of_difficulty) not found: $level");
            }
        }

        // PROGRAMMING LANGUAGE (ResourceProgrammingLanguage)
        $languages = $this->parseArray($row['filters_programming_language'] ?? []);
        foreach ($languages as $lang) {
            $model = ResourceProgrammingLanguage::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($lang))])->first();
            if ($model) {
                $item->programmingLanguages()->attach($model->id);
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceProgrammingLanguage::class, trim($lang));
                $item->programmingLanguages()->attach($model->id);
            } else {
                Log::warning("[ResourcesImport] ResourceProgrammingLanguage not found: $lang");
            }
        }

        // SUBJECT (ResourceSubject)
        $subjects = $this->parseArray($row['filters_subject'] ?? []);
        foreach ($subjects as $subject) {
            $model = ResourceSubject::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($subject))])->first();
            if ($model) {
                $item->subjects()->attach($model->id);
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceSubject::class, trim($subject));
                $item->subjects()->attach($model->id);
            } else {
                Log::warning("[ResourcesImport] ResourceSubject not found: $subject");
            }
        }

        // TOPICS (ResourceCategory)
        $topics = $this->parseArray($row['filters_topics'] ?? []);
        foreach ($topics as $topic) {
            $model = ResourceCategory::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($topic))])->first();
            if ($model) {
                $item->categories()->attach($model->id);
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceCategory::class, trim($topic));
                $item->categories()->attach($model->id);
            } else {
                Log::warning("[ResourcesImport] ResourceCategory (topic) not found: $topic");
            }
        }

        // LANGUAGE (ResourceLanguage)
        $langs = $this->parseArray($row['filters_language'] ?? []);
        foreach ($langs as $lang) {
            $model = ResourceLanguage::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($lang))])->first();
            if ($model) {
                $item->languages()->attach($model->id);
            } elseif ($this->focus) {
                $model = $this->createOrGetModel(ResourceLanguage::class, trim($lang));
                $item->languages()->attach($model->id);
            } else {
                Log::warning("[ResourcesImport] ResourceLanguage not found: $lang");
            }
        }

        return $item;
    }
}
