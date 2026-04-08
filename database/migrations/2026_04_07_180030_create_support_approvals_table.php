<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_approvals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('support_case_id')->constrained('support_cases')->cascadeOnDelete();

            $table->string('requested_action')->index();
            $table->json('payload_json')->nullable();
            $table->string('risk_level')->index(); // low, medium, high
            $table->string('status')->index(); // pending, approved, rejected, expired

            $table->string('approved_by')->nullable()->index();
            $table->timestamp('approved_at')->nullable()->index();
            $table->text('rejected_reason')->nullable();

            $table->string('correlation_id')->nullable()->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_approvals');
    }
};

