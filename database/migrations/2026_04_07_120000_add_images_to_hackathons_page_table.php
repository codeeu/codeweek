<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('hackathons_page') && !Schema::hasColumn('hackathons_page', 'hero_background_image_url')) {
            Schema::table('hackathons_page', function (Blueprint $table) {
                $table->string('hero_background_image_url')->nullable()->after('hero_subtitle');
            });
        }

        if (Schema::hasTable('hackathons_page') && !Schema::hasColumn('hackathons_page', 'video_poster_image_url')) {
            Schema::table('hackathons_page', function (Blueprint $table) {
                $table->string('video_poster_image_url')->nullable()->after('video_url');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('hackathons_page') && Schema::hasColumn('hackathons_page', 'video_poster_image_url')) {
            Schema::table('hackathons_page', function (Blueprint $table) {
                $table->dropColumn('video_poster_image_url');
            });
        }

        if (Schema::hasTable('hackathons_page') && Schema::hasColumn('hackathons_page', 'hero_background_image_url')) {
            Schema::table('hackathons_page', function (Blueprint $table) {
                $table->dropColumn('hero_background_image_url');
            });
        }
    }
};

