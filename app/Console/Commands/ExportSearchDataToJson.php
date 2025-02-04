<?php

namespace App\Console\Commands;

use App\Blog;
use App\Event;
use App\Podcast;
use App\ResourceItem;
use App\StaticPage;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ExportSearchDataToJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-search-data-to-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export mapped data to JSON file in storage';

    protected $dataSources = [
        [
            'model' => Podcast::class,
            'map_fields' => [
                'name' => '{title}',
                'category' => 'Podcast',
                'description' => '{description}',
                'thumbnail' => '{image}',
                'path' => '{url}',
                'link_type' => 'internal',
                'language' => 'en',
                'unique_identifier' => '',
                'created_at' => '{created_at}',
            ],
        ],
        [
            'model' => StaticPage::class,
            'map_fields' => [
                'name' => '{name}',
                'category' => '{category}',
                'description' => '{description}',
                'thumbnail' => '{thumbnail}',
                'path' => '{path}',
                'link_type' => '{link_type}',
                'language' => '{language}',
                'unique_identifier' => '{unique_identifier}',
                'created_at' => '{created_at}',
            ]
        ],
        [
            'model' => ResourceItem::class,
            'map_fields' => [
                'name' => '{name}',
                'category' => 'Learn',
                'description' => '{description}',
                'thumbnail' => '{thumbnail}',
                'path' => '{source}',
                'link_type' => 'external',
                'language' => 'en',
                'unique_identifier' => '',
                'created_at' => '{created_at}',
            ]
        ],
        [
            'model' => ResourceItem::class,
            'map_fields' => [
                'name' => '{name}',
                'category' => 'Teach',
                'description' => '{description}',
                'thumbnail' => '{thumbnail}',
                'path' => '{source}',
                'link_type' => 'external',
                'language' => 'en',
                'unique_identifier' => '',
                'created_at' => '{created_at}',
            ]
        ],
        [
            'model' => Blog::class,
            'map_fields' => [
                'name' => '{name}',
                'category' => 'Blog',
                'description' => '{description}',
                'thumbnail' => '{thumbnail}',
                'path' => '{path}',
                'link_type' => 'external',
                'language' => 'en',
                'unique_identifier' => '',
                'created_at' => '{date}',
            ]
        ],
        // [
        //     'model' => Event::class,
        //     'map_fields' => [
        //         'name' => '{title}',
        //         'category' => 'Activities',
        //         'description' => '{description}',
        //         'thumbnail' => '{picture_path}',
        //         'path' => '{url}',
        //         'link_type' => 'internal',
        //         'language' => 'en',
        //         'unique_identifier' => '',
        //         'created_at' => '{created_at}',
        //     ]
        // ],
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $jsonFile = 'data.json';
        $existingData = [];

        if (Storage::disk('storage')->exists($jsonFile)) {
            $existingData = json_decode(Storage::disk('storage')->get($jsonFile), true) ?? [];
        }

        $existingDataMapped = [];
        foreach ($existingData as $item) {
            $uniqueKey = $item['path'] . '_' . $item['model'] . '_' . $item['category'];
            $existingDataMapped[$uniqueKey] = $item;
        }

        $newDataMapped = [];

        foreach ($this->dataSources as $source) {
            $modelClass = $source['model'];
            $mapFields = $source['map_fields'];

            if (!class_exists($modelClass)) {
                Log::error("Model class does not exist: $modelClass");
                continue;
            }

            if ($mapFields['category'] == 'Learn' || $mapFields['category'] == 'Teach') {
                $query = $modelClass::where(strtolower($mapFields['category']), '=', true);
            } else {
                $query = $modelClass::query();
            }

            $query->chunk(100, function ($records) use (&$newDataMapped, $mapFields, $existingDataMapped, $modelClass) {
                foreach ($records as $record) {
                    $mappedResult = ['model' => class_basename($modelClass)];
                    foreach ($mapFields as $key => $mapping) {
                        if (preg_match('/^{(.+)}$/', $mapping, $matches)) {
                            $field = $matches[1];
                            $mappedResult[$key] = isset($record->{$field}) ? $record->{$field} : '';
                        } else {
                            $mappedResult[$key] = $mapping;
                        }
                    }
                    $mappedResult['created_at'] = (new Carbon($mappedResult['created_at']))->format('Y-m-d H:i:s');

                    $uniqueKey = $mappedResult['path'] . '_' . $mappedResult['model'] . '_' . $mappedResult['category'];

                    if (isset($existingDataMapped[$uniqueKey])) {
                        $existingDataMapped[$uniqueKey] = $mappedResult;
                    } else {
                        $newDataMapped[$uniqueKey] = $mappedResult;
                    }
                }
            });
        }

        $mergedData = array_merge($existingDataMapped, $newDataMapped);
        Storage::disk('storage')->put($jsonFile, json_encode(array_values($mergedData), JSON_PRETTY_PRINT));

        $this->info("Exported data successfully to storage/app/public/data.json");
    }
}
