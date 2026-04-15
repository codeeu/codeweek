<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('online_courses_page')) {
            Schema::create('online_courses_page', function (Blueprint $table) {
                $table->id();
                $table->boolean('use_dynamic_content')->default(false);
                $table->text('hero_title')->nullable();
                $table->longText('hero_text')->nullable();
                $table->text('hero_cta_text')->nullable();
                $table->text('hero_cta_link')->nullable();
                $table->text('intro_title')->nullable();
                $table->longText('intro_text_1')->nullable();
                $table->longText('intro_text_2')->nullable();
                $table->longText('intro_text_3')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('csr_campaign_page')) {
            Schema::create('csr_campaign_page', function (Blueprint $table) {
                $table->id();
                $table->boolean('use_dynamic_content')->default(false);
                $table->longText('hero_text')->nullable();
                $table->text('primary_cta_text')->nullable();
                $table->text('primary_cta_link')->nullable();
                $table->text('secondary_cta_text')->nullable();
                $table->text('secondary_cta_link')->nullable();
                $table->text('about_title')->nullable();
                $table->longText('about_description')->nullable();
                $table->text('resources_title')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('csr_campaign_resources')) {
            Schema::create('csr_campaign_resources', function (Blueprint $table) {
                $table->id();
                $table->foreignId('page_id')->constrained('csr_campaign_page')->cascadeOnDelete();
                $table->text('title')->nullable();
                $table->longText('description')->nullable();
                $table->text('button_text')->nullable();
                $table->text('button_link')->nullable();
                $table->text('image')->nullable();
                $table->text('image_mobile')->nullable();
                $table->integer('position')->default(0);
                $table->boolean('active')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('dance_page')) {
            Schema::create('dance_page', function (Blueprint $table) {
                $table->id();
                $table->boolean('use_dynamic_content')->default(false);
                $table->text('hero_title')->nullable();
                $table->longText('hero_subtitle')->nullable();
                $table->text('content_intro_title')->nullable();
                $table->longText('content_intro_subtitle')->nullable();
                $table->text('get_involved_title')->nullable();
                $table->longText('get_involved_subtitle')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('treasure_hunt_page')) {
            Schema::create('treasure_hunt_page', function (Blueprint $table) {
                $table->id();
                $table->boolean('use_dynamic_content')->default(false);
                $table->text('hero_title')->nullable();
                $table->longText('hero_subtitle')->nullable();
                $table->text('intro_title')->nullable();
                $table->longText('intro_paragraph_1')->nullable();
                $table->longText('intro_paragraph_2')->nullable();
                $table->text('how_to_play_title')->nullable();
                $table->longText('step_1_text')->nullable();
                $table->longText('step_2_text')->nullable();
                $table->longText('step_3_text')->nullable();
                $table->longText('step_4_text')->nullable();
                $table->longText('info_text')->nullable();
                $table->text('get_involved_title')->nullable();
                $table->longText('get_involved_text')->nullable();
                $table->text('get_involved_link_1')->nullable();
                $table->text('get_involved_link_2')->nullable();
                $table->text('get_involved_link_3')->nullable();
                $table->text('get_involved_link_4')->nullable();
                $table->text('get_involved_link_5')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('treasure_hunt_page');
        Schema::dropIfExists('dance_page');
        Schema::dropIfExists('csr_campaign_resources');
        Schema::dropIfExists('csr_campaign_page');
        Schema::dropIfExists('online_courses_page');
    }
};
