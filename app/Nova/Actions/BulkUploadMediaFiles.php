<?php

namespace App\Nova\Actions;

use App\MediaUpload;
use Illuminate\Bus\Queueable;
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
        $uploadedFiles = $fields->files ?? request()->file('files');
        if (!$uploadedFiles) {
            return Action::danger('Please select one or more files.');
        }

        if (!is_array($uploadedFiles)) {
            $uploadedFiles = [$uploadedFiles];
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

            $extension = strtolower((string) $file->getClientOriginalExtension());
            if (!in_array($extension, $allowedExtensions, true)) {
                $skipped++;
                continue;
            }

            $baseName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeBaseName = Str::slug($baseName) ?: 'upload-file';
            $destination = 'nova/uploads/' . now()->format('Y/m');
            $storedPath = $file->storeAs(
                $destination,
                $safeBaseName . '-' . Str::random(8) . '.' . $extension,
                'resources'
            );

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
            File::make('Files', 'files')
                ->withMeta([
                    'extraAttributes' => [
                        'multiple' => true,
                        'accept' => '.jpg,.jpeg,.png,.gif,.webp,.svg,.pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.txt',
                    ],
                ])
                ->rules('required')
                ->help('Drag and drop multiple files or click to select. Supported: images, PDF, Office docs, and TXT.'),
        ];
    }

    /**
     * Indicate that this action can be run without any models.
     */
    public function standalone()
    {
        return true;
    }
}
