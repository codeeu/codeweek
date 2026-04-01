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
            $table->string('third_button_text')->nullable()->after('secondary_button_url');
            $table->string('third_button_url')->nullable()->after('third_button_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->dropColumn([
                'third_button_text',
                'third_button_url',
            ]);
        });
    }
};
