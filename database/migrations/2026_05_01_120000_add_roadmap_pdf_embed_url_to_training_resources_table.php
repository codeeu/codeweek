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
            $table->string('roadmap_pdf_embed_url')->nullable()->after('anchor_offset');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->dropColumn('roadmap_pdf_embed_url');
        });
    }
};
