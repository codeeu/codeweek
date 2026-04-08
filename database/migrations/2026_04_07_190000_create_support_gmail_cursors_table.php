<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('support_gmail_cursors', function (Blueprint $table) {
            $table->id();
            $table->string('mailbox')->default('me');
            $table->string('label')->nullable();

            // Gmail historyId is a string-ish integer; keep as string to avoid overflow.
            $table->string('last_history_id')->nullable();
            $table->dateTime('last_polled_at')->nullable();

            $table->timestamps();

            $table->unique(['mailbox', 'label']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_gmail_cursors');
    }
};

