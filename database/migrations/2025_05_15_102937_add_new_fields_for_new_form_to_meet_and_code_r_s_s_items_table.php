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
        Schema::table('meet_and_code_r_s_s_items', function (Blueprint $table) {
            $table->json('activity_format')->nullable();
            $table->string('duration')->nullable()->after('activity_format');
            $table->string('recurring_event')->nullable()->after('duration');
            $table->string('recurring_type')->nullable()->after('recurring_event');
            $table->integer('males_count')->nullable()->after('recurring_type');
            $table->integer('females_count')->nullable()->after('males_count');
            $table->integer('other_count')->nullable()->after('females_count');
            $table->boolean('is_extracurricular_event')->default(false)->after('other_count');
            $table->boolean('is_standard_school_curriculum')->default(false)->after('is_extracurricular_event');
            $table->json('ages')->nullable()->after('is_standard_school_curriculum');
            $table->boolean('is_use_resource')->default(false)->after('ages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meet_and_code_r_s_s_items', function (Blueprint $table) {
            //
        });
    }
};
