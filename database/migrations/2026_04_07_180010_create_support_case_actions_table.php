<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_case_actions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('support_case_id')->constrained('support_cases')->cascadeOnDelete();

            $table->string('action_name')->index();
            $table->string('action_type')->index(); // read, write, verify, email_draft, classification

            $table->json('input_json')->nullable();
            $table->json('output_json')->nullable();

            $table->boolean('succeeded')->default(false)->index();
            $table->boolean('requires_approval')->default(false)->index();
            $table->string('approved_by')->nullable()->index();
            $table->string('executed_by')->index(); // agent, human, system
            $table->text('error_message')->nullable();

            $table->string('correlation_id')->nullable()->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_case_actions');
    }
};

