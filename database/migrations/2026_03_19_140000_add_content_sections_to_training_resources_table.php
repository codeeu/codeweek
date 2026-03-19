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
            $table->longText('pdf_links_section')->nullable()->after('content');
            $table->longText('contacts_section')->nullable()->after('pdf_links_section');
            $table->longText('register_box_section')->nullable()->after('contacts_section');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->dropColumn([
                'pdf_links_section',
                'contacts_section',
                'register_box_section',
            ]);
        });
    }
};
