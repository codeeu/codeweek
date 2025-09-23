<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Str;
use App\ResourceItem;
use Storage;

// Usage:
// php artisan ingest {path} {type} {id?} [--save]
// type example: resources.pdf
class IngestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ingest
                            {path : Absolute or relative file path}
                            {type : Namespace.subtype, e.g. resources.pdf}
                            {id? : Object id if --save is used}
                            {--save : Persist to object instead of just returning URL}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ingest a file by type, optionally persisting to an object.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $path = $this->argument('path');
        $id   = $this->argument('id');
        $type = strtolower($this->argument('type'));
        $save = (bool) $this->option('save');

        if (!is_file($path)) {
            $this->error("File not found: {$path}");
            return self::FAILURE;
        }

        [$namespace, $subtype] = array_pad(explode('.', $type, 2), 2, null);
        if (!$namespace || !$subtype) {
            $this->error("Invalid type. Expected namespace.subtype, got '{$type}'");
            return self::FAILURE;
        }

        $disk = $this->resolveDisk($namespace, $subtype);
        if (!$disk) {
            $this->error("No storage disk resolver for type '{$type}'");
            return self::FAILURE;
        }

        $url = match ("{$namespace}.{$subtype}") {
            'resources.pdf' => $this->handleResourcesPdf($path, $disk),
            default => null,
        };

        if (!$url) {
            $this->error("Unsupported type '{$type}'");
            return self::FAILURE;
        }

        if ($save) {
            if (!$id) {
                $this->error("--save requires an {id}");
                return self::FAILURE;
            }
            $persisted = $this->persistToObject($namespace, $subtype, (int) $id, $url);
            if (!$persisted) {
                $this->error("Failed to persist URL to object for type '{$type}' and id {$id}");
                return self::FAILURE;
            }
        }

        $this->line($url);
        return self::SUCCESS;
    }

    protected function resolveDisk(string $namespace, string $subtype): ?string
    {
        return match ($namespace) {
            'resources' => 'resources',
            default => null,
        };
    }

    protected function handleResourcesPdf(string $path, string $disk): ?string
    {
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION) ?: 'pdf');
        $safe = Str::slug(pathinfo($path, PATHINFO_FILENAME)) ?: 'document';
        $name = "{$safe}-" . time() . ".{$ext}";

        $contents = @file_get_contents($path);
        if ($contents === false) {
            return null;
        }

        Storage::disk($disk)->put($name, $contents);
        return Storage::disk($disk)->url($name);
    }

    protected function persistToObject(string $namespace, string $subtype, int $id, string $url): bool
    {
        return match ("{$namespace}.{$subtype}") {
            'resources.pdf' => $this->persistResourceSource($id, $url),
            default => false,
        };
    }

    protected function persistResourceSource(int $id, string $url): bool
    {
        $item = ResourceItem::find($id);
        if (!$item) {
            return false;
        }
        $item->source = $url;
        return (bool) $item->save();
    }
}
