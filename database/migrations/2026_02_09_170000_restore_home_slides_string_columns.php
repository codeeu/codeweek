<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Restore string columns (title, description, button_text, button2_text) so Nova can save.
     * If the translations migration was run, copy 'en' from JSON and drop JSON columns.
     * Also add optional locale_overrides JSON for per-locale overrides.
     */
    public function up(): void
    {
        if (Schema::hasColumn('home_slides', 'title_translations')) {
            Schema::table('home_slides', function (Blueprint $table) {
                $table->string('title')->nullable()->after('id');
                $table->text('description')->nullable()->after('title');
                $table->string('button_text')->nullable()->after('url');
                $table->string('button2_text')->nullable()->after('open_second_new_tab');
            });

            $slides = DB::table('home_slides')->get();
            foreach ($slides as $row) {
                $titleTrans = $row->title_translations ? json_decode($row->title_translations, true) : [];
                $descTrans = $row->description_translations ? json_decode($row->description_translations, true) : [];
                $btnTrans = $row->button_text_translations ? json_decode($row->button_text_translations, true) : [];
                $btn2Trans = $row->button2_text_translations ? json_decode($row->button2_text_translations, true) : [];
                $titleVal = is_array($titleTrans) ? ($titleTrans['en'] ?? (string) (array_values($titleTrans)[0] ?? '')) : '';
                $descVal = is_array($descTrans) ? ($descTrans['en'] ?? array_values($descTrans)[0] ?? null) : null;
                $btnVal = is_array($btnTrans) ? ($btnTrans['en'] ?? (string) (array_values($btnTrans)[0] ?? '')) : '';
                $btn2Val = is_array($btn2Trans) ? ($btn2Trans['en'] ?? array_values($btn2Trans)[0] ?? null) : null;
                DB::table('home_slides')->where('id', $row->id)->update([
                    'title' => $titleVal,
                    'description' => $descVal,
                    'button_text' => $btnVal,
                    'button2_text' => $btn2Val,
                ]);
            }

            Schema::table('home_slides', function (Blueprint $table) {
                $table->dropColumn([
                    'title_translations',
                    'description_translations',
                    'button_text_translations',
                    'button2_text_translations',
                ]);
            });
        }

        if (Schema::hasTable('home_slides') && ! Schema::hasColumn('home_slides', 'locale_overrides')) {
            Schema::table('home_slides', function (Blueprint $table) {
                $table->json('locale_overrides')->nullable()->after('button2_text');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('home_slides', 'locale_overrides')) {
            Schema::table('home_slides', function (Blueprint $table) {
                $table->dropColumn('locale_overrides');
            });
        }
    }
};
