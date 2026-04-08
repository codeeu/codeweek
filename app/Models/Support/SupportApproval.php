<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportApproval extends Model
{
    protected $table = 'support_approvals';

    protected $guarded = [];

    protected $casts = [
        'payload_json' => 'array',
        'approved_at' => 'datetime',
    ];

    public function supportCase(): BelongsTo
    {
        return $this->belongsTo(SupportCase::class, 'support_case_id');
    }
}

