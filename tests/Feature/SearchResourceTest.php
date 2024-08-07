<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class SearchResourceTest extends TestCase
{
    use DatabaseMigrations;

    private $item;

    private $item2;

    protected function setUp(): void
    {
        parent::setUp();
        $this->item = \App\ResourceItem::factory()->create();
        $this->item2 = \App\ResourceItem::factory()->create();

    }

    #[Test]
    public function type_should_be_seen(): void
    {

        $this->post('/resources/search', [])
            ->assertSee($this->item->name);

    }

    #[Test]
    public function user_can_display_teach_resources(): void
    {
        $teachItem = \App\ResourceItem::factory()->create(['teach' => 1, 'learn' => 0]);
        $learnItem = \App\ResourceItem::factory()->create(['teach' => 0, 'learn' => 1]);

        $this->post('/resources/search', ['selectedSection' => 'teach'])
            ->assertSee($teachItem->name)
            ->assertDontSee($learnItem->name);

    }

    #[Test]
    public function no_filters_should_show_all_resources(): void
    {

        $this->post('/resources/search', [])
            ->assertSee($this->item->name)
            ->assertSee($this->item2->name);

    }

    #[Test]
    public function a_user_can_search_resource_by_name(): void
    {

        $item = \App\ResourceItem::factory()->create(['name' => 'foobar']);
        $item2 = \App\ResourceItem::factory()->create(['name' => 'rrrghrgrhrgh']);

        $this->post('/resources/search', ['searchInput' => 'foo'])
            ->assertSee($item->name)
            ->assertDontSee($item2->name);

    }

    #[Test]
    public function a_user_can_search_resource_by_levels(): void
    {
        $level = create(\App\ResourceLevel::class, ['id' => 1]);
        $level2 = create(\App\ResourceLevel::class);

        $this->item->levels()->attach($level);
        $this->item2->levels()->attach($level2);

        $selectedLevels = [$level];

        $this->post('/resources/search', ['selectedLevels' => $selectedLevels])
            ->assertSee($this->item->name)
            ->assertDontSee($this->item2->name);

    }

    #[Test]
    public function a_user_can_search_resource_by_types(): void
    {
        $type = \App\ResourceType::factory()->create(['id' => 1]);
        $type2 = \App\ResourceType::factory()->create();

        $this->item->types()->attach($type);
        $this->item2->types()->attach($type2);

        $selectedTypes = [$type];

        $result = $this->post('/resources/search', compact('selectedTypes'))
            ->assertSee($this->item->name)
            ->assertDontSee($this->item2->name);

    }

    #[Test]
    public function a_user_can_search_resource_by_subject(): void
    {

        $subject = \App\ResourceSubject::factory()->create(['id' => 1]);
        $subject2 = \App\ResourceSubject::factory()->create();

        $this->item->subjects()->attach($subject);
        $this->item2->subjects()->attach($subject2);

        $selectedSubjects = [$subject];

        $this->post('/resources/search', compact('selectedSubjects'))
            ->assertSee($this->item->name)
            ->assertDontSee($this->item2->name);

    }

    #[Test]
    public function a_user_can_search_resource_by_category(): void
    {

        $category = create(\App\ResourceCategory::class, ['id' => 1]);
        $category2 = create(\App\ResourceCategory::class);

        $this->item->categories()->attach($category);
        $this->item2->categories()->attach($category2);

        $selectedCategories = [$category];

        $this->post('/resources/search', compact('selectedCategories'))
            ->assertSee($this->item->name)
            ->assertDontSee($this->item2->name);

    }

    #[Test]
    public function a_user_can_search_resource_by_languages(): void
    {

        $language = create(\App\ResourceLanguage::class, ['id' => 1]);
        $language2 = create(\App\ResourceLanguage::class);

        $this->item->languages()->attach($language);
        $this->item2->languages()->attach($language2);

        $selectedLanguages = [$language];

        $this->post('/resources/search', compact('selectedLanguages'))
            ->assertSee($this->item->name)
            ->assertDontSee($this->item2->name);

    }

    #[Test]
    public function a_user_can_search_resource_by_programming_languages(): void
    {

        $programmingLanguage = create(\App\ResourceProgrammingLanguage::class, ['id' => 1]);
        $programmingLanguage2 = create(\App\ResourceProgrammingLanguage::class);

        $this->item->programmingLanguages()->attach($programmingLanguage);
        $this->item2->programmingLanguages()->attach($programmingLanguage2);

        $selectedProgrammingLanguages = [$programmingLanguage];

        $this->post('/resources/search', compact('selectedProgrammingLanguages'))
            ->assertSee($this->item->name)
            ->assertDontSee($this->item2->name);

    }

    #[Test]
    public function a_user_can_search_resource_by_types_and_language(): void
    {

        $type = \App\ResourceType::factory()->create(['id' => 1]);
        $type2 = \App\ResourceType::factory()->create();
        $language = create(\App\ResourceLanguage::class, ['id' => 1]);
        $language2 = create(\App\ResourceLanguage::class);

        $this->item->types()->attach($type);
        $this->item2->types()->attach($type);
        $this->item->languages()->attach($language);
        $this->item2->languages()->attach($language2);

        $selectedTypes = [$type];
        $selectedLanguages = [$language];

        $this->post('/resources/search', compact(['selectedTypes', 'selectedLanguages']))
            ->assertSee($this->item->name)
            ->assertDontSee($this->item2->name);

    }

    #[Test]
    public function no_duplicates_allowed(): void
    {
        $type = \App\ResourceType::factory()->create(['id' => 1]);
        $type2 = \App\ResourceType::factory()->create();
        $type3 = \App\ResourceType::factory()->create();


        $this->item->types()->attach($type);
        $this->item->types()->attach($type2);
        $this->item->types()->attach($type3);

        $selectedTypes = [$type, $type2, $type3];

        $result = $this->post('/resources/search', compact('selectedTypes'));

        $data = $result->decodeResponseJson()['data'];

        $this->assertEquals(1, count($data));

    }
}
