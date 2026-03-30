<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

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

            File::make('File', 'file_path')
                ->disk('resources')
                ->path('nova/uploads')
                ->prunable()
                ->creationRules('required')
                ->rules('required', 'max:51200', 'mimes:jpg,jpeg,png,gif,webp,svg,pdf,doc,docx,ppt,pptx,xls,xlsx,txt')
                ->help('Uploads directly to S3 disk "resources" under folder "nova/uploads".'),

            Text::make('URL', function () {
                if (empty($this->resolved_url)) {
                    return '-';
                }

                $url = $this->resolved_url;

                return '<a href="' . e($url) . '" target="_blank" rel="noopener noreferrer">' . e($url) . '</a>';
            })
                ->asHtml()
                ->onlyOnDetail(),

            Text::make('URL', function () {
                return $this->resolved_url ?: '-';
            })->onlyOnIndex(),
        ];
    }
}
