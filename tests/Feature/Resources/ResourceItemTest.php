<?php

namespace Tests\Feature\Achievements\Resources;

use PHPUnit\Framework\Attributes\Test;
use Database\Seeders\Resource\CategorySeeder;
use Database\Seeders\Resource\LanguageSeeder;
use Database\Seeders\Resource\LevelSeeder;
use Database\Seeders\Resource\ProgrammingLanguageSeeder;
use Database\Seeders\Resource\TypeSeeder;
use Exception;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ResourceItemTest extends TestCase
{
    use DatabaseMigrations;

    private $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

        $this->admin = \App\User::factory()->create();
        $this->admin->assignRole('super admin');

    }

    #[Test]
    public function resource_item_can_be_created(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $request = [
            'name' => 'foobar',
            'description' => 'description text',
            'source' => 'http://foo.bar',
        ];

        $this->post('/api/resource/item', $request);

        $this->assertDatabaseHas('resource_items', [
            'name' => 'foobar',
        ]);
    }

    #[Test]
    public function resource_item_can_be_filtered_by_subject(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = \App\ResourceItem::factory()->create();

        $item->subjects()->attach(\App\ResourceSubject::factory()->count(2)->create());

        $this->assertEquals(2, count($item->fresh()->subjects));

    }

    #[Test]
    public function resource_item_can_be_filtered_by_category(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = \App\ResourceItem::factory()->create();

        $item->categories()->attach(create(\App\ResourceCategory::class, [], 3));

        $this->assertEquals(3, count($item->fresh()->categories));

    }

    #[Test]
    public function resource_item_can_be_filtered_by_level(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = \App\ResourceItem::factory()->create();

        $item->levels()->attach(create(\App\ResourceLevel::class, [], 3));

        $this->assertEquals(3, count($item->fresh()->levels));

    }

    #[Test]
    public function resource_item_can_be_filtered_by_type(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = \App\ResourceItem::factory()->create();

        $item->types()->attach(\App\ResourceType::factory()->count(4)->create());

        $this->assertEquals(4, count($item->fresh()->types));

    }

    #[Test]
    public function resource_item_can_be_filtered_by_programming_language(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = \App\ResourceItem::factory()->create();

        $item->programmingLanguages()->attach(create(\App\ResourceProgrammingLanguage::class, [], 5));

        $this->assertEquals(5, count($item->fresh()->programmingLanguages));

    }

    #[Test]
    public function resource_item_can_be_filtered_by_language(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = \App\ResourceItem::factory()->create();

        $item->languages()->attach(create(\App\ResourceLanguage::class, [], 7));

        $this->assertEquals(7, count($item->fresh()->languages));

    }

    #[Test]
    public function resource_item_can_attach_types_by_name(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed(TypeSeeder::class);

        $item = \App\ResourceItem::factory()->create();

        $item->attachTypes('Tutorial; Website; Presentation; Other; Application; Online course; Video; Game; Graphic material; Audio; Toolkit; Lesson Plan');

        $types = $item->fresh()->types;

        //dd($types->pluck('id'));

        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $this->assertEquals($expected, $types->pluck('id')->toArray());

    }

    #[Test]
    public function resource_item_can_attach_categories_by_name(): void
    {
        $this->withoutExceptionHandling();

        $this->seed(CategorySeeder::class);

        $this->signIn($this->admin);

        $item = \App\ResourceItem::factory()->create();

        $item->attachCategories('Coding; Programming; Computational thinking; Robotics; Making; Tinkering; Unplugged activities; Other');

        $categories = $item->fresh()->categories;

        //dd($types->pluck('id'));

        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, $categories->pluck('id')->toArray());

    }

    #[Test]
    public function resource_item_can_attach_programming_languages_by_name(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed(ProgrammingLanguageSeeder::class);

        $item = \App\ResourceItem::factory()->create();

        $item->attachProgrammingLanguages('C++; CSS; HTML; HTML5; Java; JavaScript; Python; Raspberry Pi; Swift; Visual Programming; All targeted programming languages; Other');

        $programmingLanguages = $item->fresh()->programmingLanguages;

        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $this->assertEquals($expected, $programmingLanguages->pluck('id')->toArray());

    }

    #[Test]
    public function resource_item_can_attach_levels_by_name(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed(LevelSeeder::class);

        $item = \App\ResourceItem::factory()->create();

        $item->attachLevels('Beginner; Intermediate; Advanced;');

        $levels = $item->fresh()->levels;

        $expected = [1, 2, 3];
        $this->assertEquals($expected, $levels->pluck('id')->toArray());

    }

    #[Test]
    public function resource_item_can_attach_languages_by_name(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed(LanguageSeeder::class);

        $item = \App\ResourceItem::factory()->create();

        $item->attachLanguages('English; French; Russian; Portuguese; Spanish; Norwegian; Slovenian; Romanian; German; Polish; Danish; Croatian; Dutch; Slovak; Czech; Greek; Italian; Swedish; Finnish; Hungarian; Turkish; Mandarin; Estonian;');

        $languages = $item->fresh()->languages;

        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23];
        $this->assertEquals($expected, $languages->pluck('id')->toArray());

    }

    #[Test]
    public function resource_item_can_attach_languages_globally(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed(LanguageSeeder::class);

        $item = \App\ResourceItem::factory()->create();

        $item->attachLanguages('All targeted languages;');

        $languages = $item->fresh()->languages;

        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];
        $this->assertEquals($expected, $languages->pluck('id')->toArray());

    }

    #[Test]
    public function resource_item_should_fault_for_unknown_types(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = \App\ResourceItem::factory()->create();

        $this->expectException(Exception::class);

        $item->attachTypes('Unknown Tag;');

    }

    #[Test]
    public function no_duplicates_resource_items_allowed(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed(LanguageSeeder::class);

        $item = \App\ResourceItem::factory()->create();

        $item->attachLanguages('English; French; English;');

        $languages = $item->fresh()->languages;

        $expected = [1, 2];
        $this->assertEquals($expected, $languages->pluck('id')->toArray());

    }
}
