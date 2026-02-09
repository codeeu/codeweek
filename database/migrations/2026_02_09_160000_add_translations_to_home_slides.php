<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Adds JSON columns for per-locale translations and migrates existing string data into 'en'.
     */
    public function up(): void
    {
        Schema::table('home_slides', function (Blueprint $table) {
            $table->json('title_translations')->nullable()->after('id');
            $table->json('description_translations')->nullable()->after('title_translations');
            $table->json('button_text_translations')->nullable()->after('url');
            $table->json('button2_text_translations')->nullable()->after('button2_text');
        });

        $slides = DB::table('home_slides')->get();
        foreach ($slides as $row) {
            DB::table('home_slides')->where('id', $row->id)->update([
                'title_translations' => json_encode(['en' => $row->title ?? '']),
                'description_translations' => json_encode(['en' => $row->description ?? '']),
                'button_text_translations' => json_encode(['en' => $row->button_text ?? '']),
                'button2_text_translations' => json_encode(['en' => $row->button2_text ?? '']),
            ]);
        }

        Schema::table('home_slides', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'button_text', 'button2_text']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
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
            DB::table('home_slides')->where('id', $row->id)->update([
                'title' => $titleTrans['en'] ?? '',
                'description' => $descTrans['en'] ?? null,
                'button_text' => $btnTrans['en'] ?? '',
                'button2_text' => $btn2Trans['en'] ?? null,
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
};
