<?php

namespace App\Nova;

use App\Nova\Actions\BulkUploadMediaFiles;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class MediaUpload extends Resource
{
    public static $group = 'Resources';

    public static $model = \App\MediaUpload::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'title',
        'file_path',
    ];

    public static function label()
    {
        return 'Uploads';
    }

    public static function singularLabel()
    {
        return 'Upload';
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->nullable()
                ->help('Optional label to help identify this file in Nova.'),

            Text::make('File Name', function () {
                return basename((string) $this->file_path);
            })->onlyOnIndex(),

            File::make('File', 'file_path')
                ->disk('resources')
                ->path('nova/uploads')
                ->prunable()
                ->creationRules('required')
                ->rules('required', 'max:51200', 'mimes:jpg,jpeg,png,gif,webp,svg,pdf,doc,docx,ppt,pptx,xls,xlsx,txt')
                ->help('Uploads directly to S3 disk "resources" under folder "nova/uploads".'),

            Text::make('URL', function () {
                return $this->renderUrlWithCopy($this->resolved_url);
            })
                ->asHtml()
                ->onlyOnDetail(),

            Text::make('URL', function () {
                return $this->renderUrlWithCopy($this->resolved_url);
            })
                ->asHtml()
                ->onlyOnIndex(),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function actions(Request $request): array
    {
        return [
            new BulkUploadMediaFiles,
        ];
    }

    protected function renderUrlWithCopy(?string $url): string
    {
        if (empty($url)) {
            return '-';
        }

        $escapedUrl = e($url);
        $jsonUrl = json_encode($url, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        $copyScript = "navigator.clipboard.writeText({$jsonUrl}).then(function(){alert('URL copied to clipboard');}).catch(function(){window.prompt('Copy URL:', {$jsonUrl});}); return false;";

        return '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">' . $escapedUrl . '</a>'
            . ' <button type="button" class="btn btn-default btn-xs" onclick="' . e($copyScript) . '">Copy URL</button>';
    }
}
