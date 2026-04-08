<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportCaseMessage extends Model
{
    protected $table = 'support_case_messages';

    protected $guarded = [];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function supportCase(): BelongsTo
    {
        return $this->belongsTo(SupportCase::class, 'support_case_id');
    }
}

