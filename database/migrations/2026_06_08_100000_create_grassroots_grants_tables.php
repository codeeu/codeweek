<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('grassroots_grants_page')) {
            Schema::create('grassroots_grants_page', function (Blueprint $table) {
                $table->id();
                $table->boolean('is_preview_mode')->default(true);
                $table->string('hero_title')->nullable();
                $table->text('hero_subtitle')->nullable();
                $table->text('hero_image')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->string('round_title')->nullable();
                $table->longText('overview_intro')->nullable();
                $table->longText('overview_activity_types')->nullable();
                $table->longText('overview_underserved')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('grassroots_grants_hubs')) {
            Schema::create('grassroots_grants_hubs', function (Blueprint $table) {
                $table->id();
                $table->foreignId('page_id')->constrained('grassroots_grants_page')->cascadeOnDelete();
                $table->string('title');
                $table->string('hub_status')->default('active');
                $table->unsignedInteger('projects_funded')->nullable();
                $table->unsignedInteger('participants_reached')->nullable();
                $table->unsignedInteger('educators_engaged')->nullable();
                $table->unsignedInteger('activities_on_platform')->nullable();
                $table->longText('overview')->nullable();
                $table->text('underserved_focus')->nullable();
                $table->text('status_message')->nullable();
                $table->unsignedInteger('position')->default(0);
                $table->boolean('active')->default(true);
                $table->string('image_folder')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('grassroots_grants_projects')) {
            Schema::create('grassroots_grants_projects', function (Blueprint $table) {
                $table->id();
                $table->foreignId('hub_id')->constrained('grassroots_grants_hubs')->cascadeOnDelete();
                $table->string('title');
                $table->string('organisation')->nullable();
                $table->string('location')->nullable();
                $table->string('participants')->nullable();
                $table->string('educators')->nullable();
                $table->string('activities')->nullable();
                $table->longText('description')->nullable();
                $table->text('underserved_focus')->nullable();
                $table->unsignedInteger('position')->default(0);
                $table->boolean('active')->default(true);
                $table->string('image_folder')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('grassroots_grants_project_links')) {
            Schema::create('grassroots_grants_project_links', function (Blueprint $table) {
                $table->id();
                $table->foreignId('project_id')->constrained('grassroots_grants_projects')->cascadeOnDelete();
                $table->string('label')->nullable();
                $table->text('url');
                $table->unsignedInteger('position')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('grassroots_grants_project_images')) {
            Schema::create('grassroots_grants_project_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('project_id')->constrained('grassroots_grants_projects')->cascadeOnDelete();
                $table->text('url');
                $table->string('alt')->nullable();
                $table->string('file_type')->default('image');
                $table->unsignedInteger('position')->default(0);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('grassroots_grants_project_images');
        Schema::dropIfExists('grassroots_grants_project_links');
        Schema::dropIfExists('grassroots_grants_projects');
        Schema::dropIfExists('grassroots_grants_hubs');
        Schema::dropIfExists('grassroots_grants_page');
    }
};
