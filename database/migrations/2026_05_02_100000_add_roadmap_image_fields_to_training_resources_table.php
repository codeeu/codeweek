<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->string('roadmap_image_url', 2048)->nullable()->after('roadmap_svg');
            $table->string('roadmap_image_link_url', 2048)->nullable()->after('roadmap_image_url');
        });
    }

    public function down(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->dropColumn(['roadmap_image_url', 'roadmap_image_link_url']);
        });
    }
};
