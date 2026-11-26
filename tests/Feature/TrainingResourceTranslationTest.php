<?php

namespace Tests\Feature;

use App\Nova\TrainingResource as NovaTrainingResource;
use App\TrainingResource;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class TrainingResourceTranslationTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * The base TestCase mocks the Locale middleware away, so requests cannot
     * switch language through ?lang=. Set the locale the page actually reads.
     */
    private function usingLocale(string $locale): void
    {
        App::setLocale($locale);
    }

    private function codyColorKit(): TrainingResource
    {
        $this->seed('TrainingResourceCodyColorKitSeeder');

        return TrainingResource::where('slug', 'cody-color-kit')->firstOrFail();
    }

    #[Test]
    public function cody_color_kit_is_served_from_the_database_in_english(): void
    {
        $this->codyColorKit();
        $this->usingLocale('en');

        $this->get('/training/cody-color-kit')
            ->assertOk()
            ->assertSee('Who is the CodyColor KIT for?')
            ->assertSee('DOWNLOAD THE KIT!')
            ->assertSee('docs/training/EN/color-kit/Discover-the-method.pdf', false)
            ->assertDontSee('A chi è rivolto il CodyColor KIT?', false);
    }

    #[Test]
    public function switching_to_italian_serves_the_translated_page_and_italian_pdfs(): void
    {
        $this->codyColorKit();
        $this->usingLocale('it');

        $response = $this->get('/training/cody-color-kit')->assertOk();

        $response->assertSee('A chi è rivolto il CodyColor KIT?', false)
            ->assertSee('Perché scoprire, sperimentare e imparare il metodo CodyColor?', false)
            ->assertSee('In questi learning bits troverai:', false)
            ->assertSee('Registra le tue attività', false)
            ->assertSee('codycolor-kit-learning-bits-it.png', false);

        foreach ([
            'Discover-the-method',
            'Prepare-the-learning-experience',
            'Discover-the-lesson-plan',
            'Share-your-experience',
            'CodyColor-Full-kit',
        ] as $pdf) {
            $response->assertSee('docs/training/IT/color-kit/'.$pdf.'.pdf', false);
        }

        $response->assertDontSee('Who is the CodyColor KIT for?')
            ->assertDontSee('docs/training/EN/color-kit/', false);
    }

    #[Test]
    public function a_locale_without_a_translation_falls_back_to_english(): void
    {
        $this->codyColorKit();
        $this->usingLocale('de');

        $this->get('/training/cody-color-kit')
            ->assertOk()
            ->assertSee('Who is the CodyColor KIT for?')
            ->assertSee('docs/training/EN/color-kit/Discover-the-method.pdf', false)
            ->assertDontSee('A chi è rivolto il CodyColor KIT?', false);
    }

    #[Test]
    public function the_training_index_lists_the_resource_once_with_localised_card_text(): void
    {
        $this->codyColorKit();

        $this->usingLocale('en');
        $this->get('/training')
            ->assertOk()
            ->assertSee('By Alessandro Bogliolo and Italian EU Code Week HUB');

        $this->usingLocale('it');
        $this->get('/training')
            ->assertOk()
            ->assertSee('Di Alessandro Bogliolo e dell’HUB italiano di EU Code Week', false)
            ->assertDontSee('By Alessandro Bogliolo and Italian EU Code Week HUB');
    }

    #[Test]
    public function for_locale_falls_back_per_field_so_partial_translations_never_blank_a_section(): void
    {
        $resource = TrainingResource::create([
            'slug' => 'partly-translated',
            'card_title' => 'English title',
            'page_title' => 'English page title',
            'content' => '<p>English content</p>',
            'locale_overrides' => [
                'it' => [
                    'page_title' => 'Titolo italiano',
                    // Trix stores an emptied editor as markup, which must not win.
                    'content' => '<div><br></div>',
                ],
            ],
        ]);

        $this->assertSame('Titolo italiano', $resource->forLocale('page_title', 'it'));
        $this->assertSame('<p>English content</p>', $resource->forLocale('content', 'it'));
        $this->assertSame('English title', $resource->forLocale('card_title', 'it'));
        $this->assertSame('English page title', $resource->forLocale('page_title', 'en'));
    }

    #[Test]
    public function non_translatable_fields_always_return_the_base_value(): void
    {
        $resource = TrainingResource::create([
            'slug' => 'url-not-translatable',
            'card_title' => 'Title',
            'button_url' => 'https://example.com/en.pdf',
            'locale_overrides' => ['it' => ['button_url' => 'https://example.com/it.pdf']],
        ]);

        $this->assertSame('https://example.com/en.pdf', $resource->forLocale('button_url', 'it'));
    }

    #[Test]
    public function the_nova_translation_panel_saves_and_clears_overrides(): void
    {
        $resource = TrainingResource::create([
            'slug' => 'nova-round-trip',
            'card_title' => 'English title',
            'page_title' => 'English page title',
        ]);

        $field = function (TrainingResource $model, string $value) {
            $nova = new NovaTrainingResource($model);
            $request = NovaRequest::create('/', 'POST', ['locale_it_page_title' => $value]);

            $panel = collect($nova->fields($request))
                ->first(fn ($field) => $field instanceof Panel && str_contains($field->name, '(IT)'));

            $titleField = collect($panel->data)
                ->first(fn ($field) => $field->attribute === 'locale_it_page_title');

            $titleField->fill($request, $model);
            $model->save();
        };

        $field($resource, 'Titolo italiano');
        $this->assertSame(
            'Titolo italiano',
            $resource->fresh()->locale_overrides['it']['page_title']
        );

        // Emptying the field must remove the key so the English value wins again.
        $field($resource, '');
        $this->assertNull($resource->fresh()->locale_overrides);
        $this->assertSame('English page title', $resource->fresh()->forLocale('page_title', 'it'));
    }

    #[Test]
    public function locale_pdf_links_keep_the_english_supporting_detail_block(): void
    {
        $resource = TrainingResource::create([
            'slug' => 'with-supporting-detail',
            'card_title' => 'Title',
            'pdf_links_section' => '<h2>Key one-pagers</h2><p>EN links</p><h2>Useful detail info</h2><p>EN detail</p>',
            'locale_overrides' => ['it' => ['pdf_links_section' => '<h2>Key one-pagers</h2><p>IT links</p>']],
        ]);

        $section = $resource->pdfLinksSectionForLocale('it');

        $this->assertStringContainsString('IT links', $section);
        $this->assertStringContainsString('EN detail', $section);
        $this->assertStringNotContainsString('EN links', $section);
    }
}
