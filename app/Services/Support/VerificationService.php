<?php

namespace App\Services\Support;

use App\User;

class VerificationService
{
    public function verifyUserRestored(User $user): array
    {
        $fresh = $user->fresh();

        return [
            'user_id' => $fresh?->id,
            'deleted_at' => $fresh?->deleted_at?->toISOString(),
            'is_restored' => $fresh !== null && $fresh->deleted_at === null,
        ];
    }
}

