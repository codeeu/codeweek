<?php

namespace App\Nova;

use App\Rules\FlexibleUrlOrAnchor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

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

    private static function localesSorted(): array
    {
        $locales = config('app.locales', ['en']);
        if (is_string($locales)) {
            $locales = array_map('trim', explode(',', $locales));
        }
        $locales = array_values(array_filter($locales));
        if ($locales === []) {
            $locales = ['en'];
        }
        sort($locales);

        return $locales;
    }

    public function fields(Request $request): array
    {
        $pdfTranslationFields = [];
        foreach (self::localesSorted() as $locale) {
            if ($locale === 'en') {
                continue;
            }

            $pdfTranslationFields[] = Trix::make(
                'PDF links ('.strtoupper($locale).')',
                'locale_'.$locale.'_pdf_links_section'
            )
                ->nullable()
                ->hideFromIndex()
                ->help('Leave empty to keep the default English PDF links. Use the toolbar to add links (select text → link), lists, and headings. For Discover Digital, the Key one-pagers intro sentence is added automatically in the visitor’s language.')
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];

                    return $overrides[$locale]['pdf_links_section'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) use ($locale) {
                    $overrides = $model->locale_overrides ?? [];
                    if (! isset($overrides[$locale]) || ! is_array($overrides[$locale])) {
                        $overrides[$locale] = [];
                    }

                    $value = $request->get($requestAttribute);
                    if ($value === null || trim(strip_tags((string) $value)) === '') {
                        unset($overrides[$locale]['pdf_links_section']);
                    } else {
                        $overrides[$locale]['pdf_links_section'] = $value;
                    }

                    if ($overrides[$locale] === []) {
                        unset($overrides[$locale]);
                    }

                    $model->locale_overrides = $overrides === [] ? null : $overrides;
                });
        }

        $fields = [
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
                ->help('Default (English) downloadable resources. For other languages, use the “Translated PDF links” panel below. Use [[key_one_pagers_locale_note]] for the locale-aware intro sentence.'),

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

            Select::make('Roadmap embed format', 'roadmap_embed_kind')
                ->options([
                    'pdf' => 'PDF (inline viewer, links inside the file)',
                    'image' => 'Image (PNG/JPG thumbnail linking to URL you set)',
                    'svg' => 'SVG (static graphic; exports usually do not preserve PDF links)',
                    'none' => 'None (remove placeholder output)',
                ])
                ->default('pdf')
                ->help('Put [[embed_roadmap_pdf]] or [[embed_roadmap]] in Content where the roadmap should appear.'),

            Text::make('Roadmap PDF embed URL', 'roadmap_pdf_embed_url')
                ->nullable()
                ->rules('nullable', 'url')
                ->dependsOn(['roadmap_embed_kind'], function (Text $field, NovaRequest $request, FormData $formData) {
                    $kind = $formData->roadmap_embed_kind ?? 'pdf';
                    if ($kind === 'pdf' || $kind === 'image') {
                        $field->show();
                    } else {
                        $field->hide();
                    }
                })
                ->help('HTTPS URL to the roadmap PDF. For PDF format this is embedded in-page. For Image format use it too (or Roadmap image link URL) as the PDF click target.'),

            Textarea::make('Roadmap SVG', 'roadmap_svg')
                ->nullable()
                ->rows(10)
                ->dependsOn(['roadmap_embed_kind'], function (Textarea $field, NovaRequest $request, FormData $formData) {
                    if (($formData->roadmap_embed_kind ?? 'pdf') === 'svg') {
                        $field->show();
                    } else {
                        $field->hide();
                    }
                })
                ->help('Optional: paste full <svg>...</svg> only for a non-interactive graphic. For clickable resources, prefer PDF above.'),

            Text::make('Roadmap image URL', 'roadmap_image_url')
                ->nullable()
                ->rules('nullable', 'url')
                ->dependsOn(['roadmap_embed_kind'], function (Text $field, NovaRequest $request, FormData $formData) {
                    if (($formData->roadmap_embed_kind ?? 'pdf') === 'image') {
                        $field->show();
                    } else {
                        $field->hide();
                    }
                })
                ->help('Full URL of the roadmap graphic (e.g. PNG on S3). The whole image is clickable.'),

            Text::make('Roadmap image link URL', 'roadmap_image_link_url')
                ->nullable()
                ->rules('nullable', 'url')
                ->dependsOn(['roadmap_embed_kind'], function (Text $field, NovaRequest $request, FormData $formData) {
                    if (($formData->roadmap_embed_kind ?? 'pdf') === 'image') {
                        $field->show();
                    } else {
                        $field->hide();
                    }
                })
                ->help('Where clicks go (e.g. full PDF). If empty, falls back to Roadmap PDF embed URL.'),

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

        if ($pdfTranslationFields !== []) {
            $fields[] = Panel::make('Translated PDF links', $pdfTranslationFields)
                ->help('Only fill languages that have translated files. When the site language switches, that language’s links are shown if present; otherwise visitors keep the default English links.')
                ->collapsable()
                ->collapsedByDefault();
        }

        return $fields;
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position')->orderBy('created_at', 'desc');
    }
}
