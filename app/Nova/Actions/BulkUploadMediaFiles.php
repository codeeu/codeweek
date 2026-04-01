<?php

namespace App\Nova\Actions;

use App\MediaUpload;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\File;
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
        $uploadedFiles = $this->collectUploadedFiles($fields, request());
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

            $originalName = $file->getClientOriginalName();
            $extension = strtolower((string) pathinfo($originalName, PATHINFO_EXTENSION));
            if (!in_array($extension, $allowedExtensions, true)) {
                $skipped++;
                continue;
            }

            $baseName = pathinfo($originalName, PATHINFO_FILENAME);
            $safeBaseName = Str::slug($baseName) ?: 'upload-file';
            $destination = 'nova/uploads/' . now()->format('Y/m');
            $finalFileName = $safeBaseName . '-' . Str::random(8) . '.' . $extension;
            $storedPath = $file->storeAs($destination, $finalFileName, 'resources');

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
        $fields = [];

        for ($i = 1; $i <= 20; $i++) {
            $fields[] = File::make("File {$i}", "file_{$i}")
                ->rules('nullable', 'max:51200', 'mimes:jpg,jpeg,png,gif,webp,svg,pdf,doc,docx,ppt,pptx,xls,xlsx,txt');
        }

        $fields[0]->help('Upload up to 20 files in one run (mix of images/docs).');

        return $fields;
    }

    /**
     * Collect uploaded files from explicit action slots.
     *
     * @return array
     */
    protected function collectUploadedFiles(ActionFields $fields, Request $request): array
    {
        $files = [];
        for ($i = 1; $i <= 20; $i++) {
            $key = "file_{$i}";
            $file = $fields->{$key} ?? $request->file($key);
            if ($file) {
                $files[] = $file;
            }
        }

        return $files;
    }
}
