<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->longText('highlight_box')->nullable()->after('intro');
            $table->string('video_url')->nullable()->after('highlight_box');
            $table->string('body_image')->nullable()->after('video_url');
            $table->string('body_image_alt')->nullable()->after('body_image');
            $table->string('secondary_button_text')->nullable()->after('button_url');
            $table->string('secondary_button_url')->nullable()->after('secondary_button_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->dropColumn([
                'highlight_box',
                'video_url',
                'body_image',
                'body_image_alt',
                'secondary_button_text',
                'secondary_button_url',
            ]);
        });
    }
};
