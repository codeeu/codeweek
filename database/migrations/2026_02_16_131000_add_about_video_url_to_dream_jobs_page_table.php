<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('dream_jobs_page') && !Schema::hasColumn('dream_jobs_page', 'about_video_url')) {
            Schema::table('dream_jobs_page', function (Blueprint $table) {
                $table->string('about_video_url')->nullable()->after('about_description');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('dream_jobs_page') && Schema::hasColumn('dream_jobs_page', 'about_video_url')) {
            Schema::table('dream_jobs_page', function (Blueprint $table) {
                $table->dropColumn('about_video_url');
            });
        }
    }
};
