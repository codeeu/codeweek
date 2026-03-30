<?php

namespace App\Nova\Actions;

use App\MediaUpload;
use DigitalCreative\Filepond\Filepond;
use DigitalCreative\Filepond\Data\Data;
use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class BulkUploadMediaFiles extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The displayable name of the action.
     *
     * @var string
     */
    public $name = 'Bulk Upload Files';

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $uploadedFiles = $this->collectUploadedFiles($fields);
        if (empty($uploadedFiles)) {
            return Action::danger('Please select one or more files.');
        }

        $allowedExtensions = [
            'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg',
            'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'txt',
        ];

        $uploaded = 0;
        $skipped = 0;

        foreach ($uploadedFiles as $file) {
            if (!$file) {
                $skipped++;
                continue;
            }

            $originalName = $this->extractOriginalName($file);
            if ($originalName === null) {
                $skipped++;
                continue;
            }
            $extension = strtolower((string) pathinfo($originalName, PATHINFO_EXTENSION));
            if (!in_array($extension, $allowedExtensions, true)) {
                $skipped++;
                continue;
            }

            $baseName = pathinfo($originalName, PATHINFO_FILENAME);
            $safeBaseName = Str::slug($baseName) ?: 'upload-file';
            $destination = 'nova/uploads/' . now()->format('Y/m');
            $finalFileName = $safeBaseName . '-' . Str::random(8) . '.' . $extension;
            $storedPath = $this->storeFile($file, $destination, $finalFileName);

            if (!$storedPath) {
                $skipped++;
                continue;
            }

            MediaUpload::create([
                'title' => trim(str_replace(['-', '_'], ' ', $baseName)),
                'file_path' => $storedPath,
                'disk' => 'resources',
            ]);

            $uploaded++;
        }

        return Action::message("Bulk upload completed: {$uploaded} uploaded, {$skipped} skipped.");
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Filepond::make('Files', 'files')
                ->multiple()
                ->limit(50)
                ->acceptedTypes('.jpg,.jpeg,.png,.gif,.webp,.svg,.pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.txt')
                ->rules('required')
                ->help('Drag and drop multiple files or click to select. Supported: images, PDF, Office docs, and TXT.'),
        ];
    }

    /**
     * Collect uploaded files from Nova action fields + raw request payload.
     *
     * @return UploadedFile[]
     */
    protected function collectUploadedFiles(ActionFields $fields): array
    {
        $candidates = [];

        if (isset($fields->files)) {
            $candidates[] = $fields->files;
        }

        $requestItems = request()->collect('files')->all();
        if (!empty($requestItems)) {
            $candidates[] = $requestItems;
        }

        $requestFiles = request()->allFiles();
        if (!empty($requestFiles)) {
            $candidates[] = $requestFiles;
        }

        $flatten = function ($value) use (&$flatten): array {
            if ($value instanceof UploadedFile) {
                return [$value];
            }

            if (is_string($value)) {
                return [$value];
            }

            if (!is_array($value)) {
                return [];
            }

            $result = [];
            foreach ($value as $item) {
                $result = array_merge($result, $flatten($item));
            }

            return $result;
        };

        $files = [];
        foreach ($candidates as $candidate) {
            $files = array_merge($files, $flatten($candidate));
        }

        return $files;
    }

    protected function extractOriginalName(UploadedFile|string $file): ?string
    {
        if ($file instanceof UploadedFile) {
            return $file->getClientOriginalName();
        }

        try {
            $data = Data::fromEncrypted($file);
            return $data->filename;
        } catch (\Throwable $e) {
            return null;
        }
    }

    protected function storeFile(UploadedFile|string $file, string $destination, string $finalFileName): ?string
    {
        if ($file instanceof UploadedFile) {
            return $file->storeAs($destination, $finalFileName, 'resources');
        }

        try {
            $data = Data::fromEncrypted($file);
        } catch (\Throwable $e) {
            return null;
        }

        $stream = Storage::disk($data->disk)->readStream($data->path);
        if ($stream === false) {
            return null;
        }

        $targetPath = $destination . '/' . $finalFileName;
        $stored = Storage::disk('resources')->put($targetPath, $stream, 'public');
        if (is_resource($stream)) {
            fclose($stream);
        }

        // Clean temporary Filepond directory.
        $data->deleteDirectory();

        return $stored ? $targetPath : null;
    }

}
