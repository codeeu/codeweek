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
        Schema::create('matchmaking_profiles', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ['volunteer', 'organisation']);
            $table->string('slug')->unique();
            $table->string('avatar')->nullable();
            $table->boolean('avatar_dark')->default(false);

            $table->string('email')->index();
            $table->string('first_name')->nullable(); // Individual only
            $table->string('last_name')->nullable(); // Individual only
            $table->string('job_title')->nullable(); // Individual only
            $table->string('get_email_from')->nullable();

            $table->json('languages')->nullable(); // Individual
            $table->boolean('email_via_linkedin')->default(false);
            $table->string('linkedin')->nullable(); // Individual
            $table->string('facebook')->nullable(); // Individual
            $table->string('website')->nullable(); // Both

            $table->string('organisation_name')->nullable(); // Both
            $table->json('organisation_type')->nullable(); // Both

            $table->text('organisation_mission')->nullable(); // Organisation only

            $table->string('location')->nullable();
            $table->string('country', 2)->nullable(); // ISO code

            $table->json('support_activities')->nullable(); // Both
            $table->string('interested_in_school_collaboration')->nullable(); // Org
            $table->json('target_school_types')->nullable(); // Org
            $table->json('digital_expertise_areas')->nullable(); // Org

            $table->json('time_commitment')->nullable(); // Individual
            $table->boolean('can_start_immediately')->nullable(); // Individual
            $table->text('why_volunteering')->nullable(); // Individual
            $table->enum('format', ['Online', 'In-person', 'Both'])->nullable(); // Individual

            $table->boolean('is_use_resource')->default(false);
            $table->boolean('want_updates')->default(false);
            $table->boolean('agree_to_be_contacted_for_feedback')->default(false);

            $table->text('description')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('completion_time')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchmaking_profiles');
    }
};
