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
        Schema::table('excellences', function (Blueprint $table) {
            $table->text('certificate_generation_error')->nullable()->after('certificate_url');
            $table->text('certificate_sent_error')->nullable()->after('notified_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('excellences', function (Blueprint $table) {
            $table->dropColumn(['certificate_generation_error', 'certificate_sent_error']);
        });
    }
};
