<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_case_messages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('support_case_id')->constrained('support_cases')->cascadeOnDelete();

            $table->string('message_type')->index(); // internal_summary, reply_draft, approval_request, acknowledgement
            $table->string('recipient_email')->nullable()->index();
            $table->string('subject')->nullable();
            $table->longText('body');
            $table->string('delivery_status')->nullable()->index();
            $table->timestamp('sent_at')->nullable()->index();

            $table->string('correlation_id')->nullable()->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_case_messages');
    }
};

