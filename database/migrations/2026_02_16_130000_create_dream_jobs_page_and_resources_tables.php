<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('dream_jobs_page')) {
            Schema::create('dream_jobs_page', function (Blueprint $table) {
                $table->id();
                $table->boolean('hero_dynamic')->default(false);
                $table->boolean('about_dynamic')->default(false);
                $table->boolean('role_models_dynamic')->default(false);
                $table->boolean('resources_dynamic')->default(false);
                $table->text('hero_intro')->nullable();
                $table->string('hero_cta_text')->nullable();
                $table->string('hero_cta_link')->nullable();
                $table->string('about_title')->nullable();
                $table->text('about_description')->nullable();
                $table->string('about_video_url')->nullable();
                $table->string('role_models_title')->nullable();
                $table->string('resources_title')->nullable();
                $table->json('locale_overrides')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('dream_jobs_resources')) {
            Schema::create('dream_jobs_resources', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('page_id')->default(1);
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('button_text')->nullable();
                $table->string('button_link')->nullable();
                $table->string('image')->nullable();
                $table->unsignedInteger('position')->default(0);
                $table->boolean('active')->default(true);
                $table->json('locale_overrides')->nullable();
                $table->timestamps();
            });
        }

        if (DB::table('dream_jobs_page')->count() === 0) {
            DB::table('dream_jobs_page')->insert([
                'id' => 1,
                'hero_dynamic' => false,
                'about_dynamic' => false,
                'role_models_dynamic' => false,
                'resources_dynamic' => false,
                'hero_cta_link' => '#dream-job-resources',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('dream_jobs_resources');
        Schema::dropIfExists('dream_jobs_page');
    }
};
