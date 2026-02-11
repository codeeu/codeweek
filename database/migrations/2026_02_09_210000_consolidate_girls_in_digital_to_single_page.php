<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Consolidate Girls in Digital into one page: add content columns and buttons JSON,
     * migrate data from girls_in_digital_buttons if it exists, then drop that table.
     */
    public function up(): void
    {
        Schema::table('girls_in_digital_page', function (Blueprint $table) {
            if (! Schema::hasColumn('girls_in_digital_page', 'use_dynamic_content')) {
                $table->boolean('use_dynamic_content')->default(false)->after('id');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'hero_intro')) {
                $table->text('hero_intro')->nullable()->after('use_dynamic_content');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'hero_video_url')) {
                $table->string('hero_video_url')->nullable()->after('hero_intro');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'about_title')) {
                $table->string('about_title')->nullable()->after('hero_video_url');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'about_description_1')) {
                $table->text('about_description_1')->nullable()->after('about_title');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'about_description_2')) {
                $table->text('about_description_2')->nullable()->after('about_description_1');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'resource_title')) {
                $table->string('resource_title')->nullable()->after('about_description_2');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'resource_person_title')) {
                $table->string('resource_person_title')->nullable()->after('resource_title');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'resource_person_description_1')) {
                $table->text('resource_person_description_1')->nullable()->after('resource_person_title');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'resource_person_description_2')) {
                $table->text('resource_person_description_2')->nullable()->after('resource_person_description_1');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'resource_educator_title')) {
                $table->string('resource_educator_title')->nullable()->after('resource_person_description_2');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'resource_educator_description')) {
                $table->text('resource_educator_description')->nullable()->after('resource_educator_title');
            }
            if (! Schema::hasColumn('girls_in_digital_page', 'buttons')) {
                $table->json('buttons')->nullable()->after('resource_educator_description');
            }
        });

        if (Schema::hasTable('girls_in_digital_buttons')) {
            $rows = DB::table('girls_in_digital_buttons')->orderBy('position')->orderBy('id')->get();
            $buttons = $rows->map(fn ($r) => [
                'key' => $r->key,
                'label' => $r->label,
                'url' => $r->url,
                'open_new_tab' => (bool) $r->open_new_tab,
                'enabled' => (bool) $r->enabled,
                'position' => (int) $r->position,
            ])->values()->all();
            DB::table('girls_in_digital_page')->where('id', 1)->update(['buttons' => json_encode($buttons)]);
            Schema::dropIfExists('girls_in_digital_buttons');
        }
    }

    public function down(): void
    {
        Schema::table('girls_in_digital_page', function (Blueprint $table) {
            $cols = ['use_dynamic_content', 'hero_intro', 'hero_video_url', 'about_title', 'about_description_1', 'about_description_2', 'resource_title', 'resource_person_title', 'resource_person_description_1', 'resource_person_description_2', 'resource_educator_title', 'resource_educator_description', 'buttons'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('girls_in_digital_page', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
