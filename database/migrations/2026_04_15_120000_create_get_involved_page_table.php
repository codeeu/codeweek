<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('get_involved_page')) {
            return;
        }

        Schema::create('get_involved_page', function (Blueprint $table) {
            $table->id();
            $table->boolean('use_dynamic_content')->default(false);

            $table->text('intro_heading')->nullable();
            $table->longText('intro_text')->nullable();
            $table->string('intro_button_text')->nullable();
            $table->string('intro_button_link')->nullable();

            $table->text('movement_heading')->nullable();
            $table->longText('movement_text_1')->nullable();
            $table->longText('movement_text_2')->nullable();

            $table->text('start_heading')->nullable();
            $table->longText('start_text')->nullable();

            $table->text('card_community_title')->nullable();
            $table->longText('card_community_text')->nullable();
            $table->string('card_community_link')->nullable();
            $table->boolean('card_community_new_tab')->default(false);

            $table->text('card_activity_title')->nullable();
            $table->longText('card_activity_text')->nullable();
            $table->string('card_activity_link')->nullable();
            $table->boolean('card_activity_new_tab')->default(false);

            $table->text('card_ambassadors_title')->nullable();
            $table->longText('card_ambassadors_text')->nullable();
            $table->string('card_ambassadors_link')->nullable();
            $table->boolean('card_ambassadors_new_tab')->default(false);

            $table->text('card_stories_title')->nullable();
            $table->longText('card_stories_text')->nullable();
            $table->string('card_stories_link')->nullable();
            $table->boolean('card_stories_new_tab')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('get_involved_page');
    }
};
