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
            if (! Schema::hasColumn('excellences', 'certificate_generation_error')) {
                $table->text('certificate_generation_error')->nullable()->after('certificate_url');
            }
            if (! Schema::hasColumn('excellences', 'certificate_sent_error')) {
                $table->text('certificate_sent_error')->nullable()->after('notified_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('excellences', function (Blueprint $table) {
            $cols = [];
            if (Schema::hasColumn('excellences', 'certificate_generation_error')) {
                $cols[] = 'certificate_generation_error';
            }
            if (Schema::hasColumn('excellences', 'certificate_sent_error')) {
                $cols[] = 'certificate_sent_error';
            }
            if ($cols !== []) {
                $table->dropColumn($cols);
            }
        });
    }
};
