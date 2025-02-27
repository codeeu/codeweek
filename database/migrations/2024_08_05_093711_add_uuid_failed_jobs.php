<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('failed_jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('failed_jobs', 'uuid')) {
                $table->uuid('uuid')->after('id')->nullable(false)->unique();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('failed_jobs') && Schema::hasColumn('failed_jobs', 'uuid')) {
            Schema::table('failed_jobs', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }
    }
};
