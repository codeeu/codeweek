<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Per-section dynamic toggles, images, FAQ, "Why matters" section,
     * and dedicated buttons table (one row per button: enable, link, text, open new tab).
     */
    public function up(): void
    {
        $page = 'girls_in_digital_page';

        Schema::table($page, function (Blueprint $table) use ($page) {
            if (! Schema::hasColumn($page, 'hero_dynamic')) {
                $table->boolean('hero_dynamic')->default(false)->after('id');
            }
            if (! Schema::hasColumn($page, 'about_dynamic')) {
                $table->boolean('about_dynamic')->default(false)->after('hero_dynamic');
            }
            if (! Schema::hasColumn($page, 'resources_dynamic')) {
                $table->boolean('resources_dynamic')->default(false)->after('about_dynamic');
            }
            if (! Schema::hasColumn($page, 'matters_dynamic')) {
                $table->boolean('matters_dynamic')->default(false)->after('resources_dynamic');
            }
            if (! Schema::hasColumn($page, 'faq_dynamic')) {
                $table->boolean('faq_dynamic')->default(false)->after('matters_dynamic');
            }
            if (! Schema::hasColumn($page, 'hero_image')) {
                $table->string('hero_image')->nullable()->after('hero_video_url');
            }
            if (! Schema::hasColumn($page, 'about_image')) {
                $table->string('about_image')->nullable()->after('about_description_2');
            }
            if (! Schema::hasColumn($page, 'resource_young_image')) {
                $table->string('resource_young_image')->nullable()->after('resource_educator_description');
            }
            if (! Schema::hasColumn($page, 'resource_educator_image')) {
                $table->string('resource_educator_image')->nullable()->after('resource_young_image');
            }
            if (! Schema::hasColumn($page, 'matters_title')) {
                $table->string('matters_title')->nullable()->after('resource_educator_image');
            }
            if (! Schema::hasColumn($page, 'matters_graph1_image')) {
                $table->string('matters_graph1_image')->nullable()->after('matters_title');
            }
            if (! Schema::hasColumn($page, 'matters_graph1_link')) {
                $table->string('matters_graph1_link')->nullable()->after('matters_graph1_image');
            }
            if (! Schema::hasColumn($page, 'matters_graph1_caption')) {
                $table->text('matters_graph1_caption')->nullable()->after('matters_graph1_link');
            }
            if (! Schema::hasColumn($page, 'matters_graph2_image')) {
                $table->string('matters_graph2_image')->nullable()->after('matters_graph1_caption');
            }
            if (! Schema::hasColumn($page, 'matters_graph2_link')) {
                $table->string('matters_graph2_link')->nullable()->after('matters_graph2_image');
            }
            if (! Schema::hasColumn($page, 'matters_graph2_caption')) {
                $table->text('matters_graph2_caption')->nullable()->after('matters_graph2_link');
            }
            if (! Schema::hasColumn($page, 'matters_graph3_image')) {
                $table->string('matters_graph3_image')->nullable()->after('matters_graph2_caption');
            }
            if (! Schema::hasColumn($page, 'matters_graph3_link')) {
                $table->string('matters_graph3_link')->nullable()->after('matters_graph3_image');
            }
            if (! Schema::hasColumn($page, 'matters_graph3_caption')) {
                $table->text('matters_graph3_caption')->nullable()->after('matters_graph3_link');
            }
            if (! Schema::hasColumn($page, 'matters_paragraph_1')) {
                $table->text('matters_paragraph_1')->nullable()->after('matters_graph3_caption');
            }
            if (! Schema::hasColumn($page, 'matters_paragraph_2')) {
                $table->text('matters_paragraph_2')->nullable()->after('matters_paragraph_1');
            }
            if (! Schema::hasColumn($page, 'faq_title')) {
                $table->string('faq_title')->nullable()->after('matters_paragraph_2');
            }
            if (! Schema::hasColumn($page, 'faq_items')) {
                $table->json('faq_items')->nullable()->after('faq_title');
            }
        });

        if (! Schema::hasTable('girls_in_digital_buttons')) {
            Schema::create('girls_in_digital_buttons', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('page_id')->default(1);
                $table->string('key');
                $table->unique(['page_id', 'key']);
                $table->string('label');
                $table->string('url');
                $table->boolean('open_new_tab')->default(false);
                $table->boolean('enabled')->default(true);
                $table->unsignedInteger('position')->default(0);
                $table->timestamps();
            });
        }

        if (Schema::hasColumn($page, 'buttons')) {
            $row = DB::table($page)->where('id', 1)->first();
            if ($row && $row->buttons) {
                $buttons = json_decode($row->buttons, true);
                if (is_array($buttons)) {
                    foreach ($buttons as $i => $b) {
                        $key = $b['key'] ?? 'btn_' . $i;
                        DB::table('girls_in_digital_buttons')->updateOrInsert(
                            ['page_id' => 1, 'key' => $key],
                            [
                                'page_id' => 1,
                                'label' => $b['label'] ?? '',
                                'url' => $b['url'] ?? '',
                                'open_new_tab' => (bool) ($b['open_new_tab'] ?? false),
                                'enabled' => (bool) ($b['enabled'] ?? true),
                                'position' => (int) ($b['position'] ?? $i),
                                'updated_at' => now(),
                                'created_at' => now(),
                            ]
                        );
                    }
                }
            }
            Schema::table($page, function (Blueprint $table) use ($page) {
                $table->dropColumn('buttons');
            });
        }

        if (Schema::hasColumn($page, 'use_dynamic_content')) {
            $uc = DB::table($page)->where('id', 1)->value('use_dynamic_content');
            Schema::table($page, function (Blueprint $table) use ($page) {
                $table->dropColumn('use_dynamic_content');
            });
            if ($uc) {
                DB::table($page)->where('id', 1)->update([
                    'hero_dynamic' => true,
                    'about_dynamic' => true,
                    'resources_dynamic' => true,
                    'matters_dynamic' => true,
                    'faq_dynamic' => true,
                ]);
            }
        }

        $count = DB::table('girls_in_digital_buttons')->count();
        if ($count === 0) {
            $defaults = [
                ['key' => 'gcib_sprint_hero', 'label' => 'Girls Code It Better Sprint', 'url' => 'https://codeweek.eu/blog/girls-in-digital-week-2026/', 'open_new_tab' => false, 'position' => 0],
                ['key' => 'female_role_models', 'label' => 'Female Role Models Database', 'url' => 'https://codeweek.ecwt.eu/', 'open_new_tab' => true, 'position' => 1],
                ['key' => 'open_call_challenges', 'label' => 'Open Call for GiD Challenges', 'url' => '/docs/girls-in-digital/open-call-for-new-code-week-challenges_v2.pdf', 'open_new_tab' => true, 'position' => 2],
                ['key' => 'search_activity', 'label' => 'Search an activity', 'url' => '/events', 'open_new_tab' => false, 'position' => 3],
                ['key' => 'meet_role_model', 'label' => 'Meet a Role Model', 'url' => 'https://codeweek.ecwt.eu/role-models/', 'open_new_tab' => true, 'position' => 4],
                ['key' => 'organise_gcib_sprint', 'label' => 'Organise a GCIB Sprint', 'url' => 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/GCIB-Sprint-materials.zip', 'open_new_tab' => false, 'position' => 5],
                ['key' => 'activity_guideline', 'label' => 'Girls in Digital Activity Guideline', 'url' => '/docs/girls-in-digital/girls-in-digital-activity-guidelines.pdf', 'open_new_tab' => true, 'position' => 6],
                ['key' => 'social_media_kit', 'label' => 'Social Media Kit', 'url' => '/docs/girls-in-digital/girls-in-digital-media-kit.pdf', 'open_new_tab' => true, 'position' => 7],
            ];
            foreach ($defaults as $i => $d) {
                DB::table('girls_in_digital_buttons')->insert([
                    'page_id' => 1,
                    'key' => $d['key'],
                    'label' => $d['label'],
                    'url' => $d['url'],
                    'open_new_tab' => $d['open_new_tab'],
                    'enabled' => true,
                    'position' => $d['position'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('girls_in_digital_buttons');
        $page = 'girls_in_digital_page';
        $cols = ['hero_dynamic', 'about_dynamic', 'resources_dynamic', 'matters_dynamic', 'faq_dynamic', 'hero_image', 'about_image', 'resource_young_image', 'resource_educator_image', 'matters_title', 'matters_graph1_image', 'matters_graph1_link', 'matters_graph1_caption', 'matters_graph2_image', 'matters_graph2_link', 'matters_graph2_caption', 'matters_graph3_image', 'matters_graph3_link', 'matters_graph3_caption', 'matters_paragraph_1', 'matters_paragraph_2', 'faq_title', 'faq_items'];
        Schema::table($page, function (Blueprint $table) use ($page, $cols) {
            foreach ($cols as $col) {
                if (Schema::hasColumn($page, $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
