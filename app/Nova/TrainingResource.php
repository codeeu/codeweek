<?php

namespace App\Nova;

use App\Rules\FlexibleUrlOrAnchor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class TrainingResource extends Resource
{
    public static $group = 'Resources';

    public static $model = \App\TrainingResource::class;

    public static $title = 'card_title';

    public static $search = ['slug', 'card_title', 'page_title', 'card_author'];

    public static function label()
    {
        return 'Training Resources';
    }

    public static function singularLabel()
    {
        return 'Training Resource';
    }

    public static function authorizedToViewAny(Request $request): bool
    {
        return true;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Slug', 'slug')
                ->rules('nullable', 'max:255', 'alpha_dash', 'unique:training_resources,slug,{{resourceId}}')
                ->help('Optional. If empty, generated automatically from title. Used in /training/{slug}.'),

            Text::make('Preview URL', function () {
                if (! $this->resource?->exists) {
                    return 'Save first to generate preview URL.';
                }

                $url = URL::temporarySignedRoute(
                    'training.preview',
                    now()->addDays(14),
                    ['trainingResource' => $this->resource]
                );

                return '<a href="'.$url.'" target="_blank" rel="noopener noreferrer">'.$url.'</a>';
            })
                ->onlyOnDetail()
                ->asHtml()
                ->help('Share this link with clients for preview before publishing. Link expires in 14 days.'),

            Text::make('Card title', 'card_title')
                ->rules('nullable', 'max:255')
                ->help('Optional. Shown in the Learning Bits grid on /training'),

            Text::make('Card author', 'card_author')
                ->nullable()
                ->help('Optional subtitle shown under the card title'),

            Text::make('Card image', 'card_image')
                ->nullable()
                ->help('Supports full URLs (including Amazon S3/CloudFront) or local paths like /img/learning/my-image.png. Plain filenames are treated as /img/learning/{filename}.'),

            Text::make('Page title', 'page_title')->rules('nullable', 'max:255')
                ->help('Optional. Falls back to card title.'),

            Text::make('Hero author', 'hero_author')
                ->nullable()
                ->help('Optional pill text in the header banner'),

            Text::make('Hero button text', 'hero_button_text')
                ->nullable()
                ->help('Optional primary CTA shown in the hero section.'),

            Text::make('Hero button URL', 'hero_button_url')
                ->nullable()
                ->help('Supports full URLs, root-relative paths, or #anchors.'),

            Text::make('Hero secondary button text', 'hero_secondary_button_text')
                ->nullable()
                ->help('Optional outline CTA shown beside the hero primary button.'),

            Text::make('Hero secondary button URL', 'hero_secondary_button_url')
                ->nullable()
                ->help('Supports full URLs, root-relative paths, or #anchors.'),

            Trix::make('Intro', 'intro')
                ->nullable()
                ->help('Optional intro block shown above the main content'),

            Trix::make('Highlight box', 'highlight_box')
                ->nullable()
                ->help('Optional styled gray section (e.g. Scientific author / Contributors block).'),

            Text::make('Video URL', 'video_url')
                ->nullable()
                ->help('Optional YouTube URL. Supports youtu.be, watch, embed, shorts.'),

            Text::make('Video script URL', 'video_script_url')
                ->nullable()
                ->rules('nullable', 'url')
                ->help('Optional link shown under the video, e.g. DOCX/PDF script.'),

            Text::make('Video script link text', 'video_script_text')
                ->nullable()
                ->help('Optional. Defaults to "Download the video script".'),

            Text::make('Body image', 'body_image')
                ->nullable()
                ->help('Optional image path/URL (supports Amazon S3/CloudFront).'),

            Text::make('Body image alt text', 'body_image_alt')
                ->nullable(),

            Trix::make('Content', 'content')
                ->nullable()
                ->help('Main training content area'),

            Trix::make('PDF links section', 'pdf_links_section')
                ->nullable()
                ->help('Optional area for numbered downloadable resources (e.g. 1-6 links).'),

            Trix::make('Contacts section', 'contacts_section')
                ->nullable()
                ->help('Optional contacts/extra info block.'),

            Trix::make('Register box section', 'register_box_section')
                ->nullable()
                ->help('Optional text shown in a highlighted callout box (register on map, hashtags, etc).'),

            Trix::make('About box section', 'about_box_section')
                ->nullable()
                ->help('Optional blue info card shown below register box (supports heading, text, lists).'),

            Number::make('Anchor offset', 'anchor_offset')
                ->min(0)
                ->step(1)
                ->nullable()
                ->help('Optional scroll offset in pixels for in-page anchor links (useful with sticky headers).'),

            Text::make('Button text', 'button_text')->nullable(),

            Text::make('Button URL', 'button_url')
                ->nullable()
                ->rules('nullable', new FlexibleUrlOrAnchor),

            Text::make('Secondary button text', 'secondary_button_text')->nullable(),

            Text::make('Secondary button URL', 'secondary_button_url')
                ->nullable()
                ->rules('nullable', new FlexibleUrlOrAnchor),

            Text::make('Third button text', 'third_button_text')->nullable(),

            Text::make('Third button URL', 'third_button_url')
                ->nullable()
                ->rules('nullable', new FlexibleUrlOrAnchor),

            Text::make('Meta title', 'meta_title')
                ->nullable()
                ->help('Optional HTML title override'),

            Textarea::make('Meta description', 'meta_description')
                ->nullable()
                ->alwaysShow(),

            Number::make('Position', 'position')
                ->min(0)
                ->help('Lower = shown first among dynamic resources')
                ->nullable(),

            Boolean::make('Published', 'active')
                ->help('Turn off to keep this page hidden publicly. Preview URL still works.'),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position')->orderBy('created_at', 'desc');
    }
}
