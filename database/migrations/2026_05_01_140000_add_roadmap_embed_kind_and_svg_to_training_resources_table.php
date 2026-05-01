<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->string('roadmap_embed_kind', 16)->default('pdf')->after('roadmap_pdf_embed_url');
            $table->mediumText('roadmap_svg')->nullable()->after('roadmap_embed_kind');
        });
    }

    public function down(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->dropColumn(['roadmap_embed_kind', 'roadmap_svg']);
        });
    }
};
