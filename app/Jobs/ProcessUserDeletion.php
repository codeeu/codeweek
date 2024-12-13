<?php

namespace App\Jobs;

use App\Excellence;
use App\Participation;
use App\User;
use App\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProcessUserDeletion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;
    protected $legacyUserId = 1000000;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        try {
            DB::beginTransaction();

            Log::info("Processing deletion for user ID: {$this->userId}");

            // Update events creator_id
            Event::where('creator_id', $this->userId)
                ->update(['creator_id' => $this->legacyUserId]);

            // Update events approved_by
            Event::where('approved_by', $this->userId)
                ->update(['approved_by' => $this->legacyUserId]);

            // Hard delete the user
            User::where('id', $this->userId)->delete();

            DB::commit();
            Log::info("Successfully deleted user ID: {$this->userId}");

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error processing user ID: {$this->userId}", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }
}
