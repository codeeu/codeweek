<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('hackathons_page')) {
            Schema::create('hackathons_page', function (Blueprint $table) {
                $table->id();
                $table->boolean('dynamic_content')->default(false);
                $table->string('hero_title')->nullable();
                $table->text('hero_subtitle')->nullable();
                $table->string('intro_title')->nullable();
                $table->text('intro_paragraph_1')->nullable();
                $table->text('intro_paragraph_2')->nullable();
                $table->string('details_title')->nullable();
                $table->text('details_paragraph_1')->nullable();
                $table->text('details_paragraph_2')->nullable();
                $table->text('details_paragraph_3')->nullable();
                $table->text('details_paragraph_4')->nullable();
                $table->string('video_url')->nullable();
                $table->string('extra_button_text')->nullable();
                $table->string('extra_button_link')->nullable();
                $table->string('recap_button_text')->nullable();
                $table->string('recap_button_link')->nullable();
                $table->string('toolkit_button_text')->nullable();
                $table->string('toolkit_button_link')->nullable();
                $table->json('locale_overrides')->nullable();
                $table->timestamps();
            });
        }

        if (DB::table('hackathons_page')->count() === 0) {
            DB::table('hackathons_page')->insert([
                'id' => 1,
                'dynamic_content' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('hackathons_page');
    }
};
