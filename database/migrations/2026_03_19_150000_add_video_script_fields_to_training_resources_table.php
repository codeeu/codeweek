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
            $table->string('video_script_url')->nullable()->after('video_url');
            $table->string('video_script_text')->nullable()->after('video_script_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->dropColumn([
                'video_script_url',
                'video_script_text',
            ]);
        });
    }
};
