<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportCaseAction extends Model
{
    protected $table = 'support_case_actions';

    protected $guarded = [];

    protected $casts = [
        'input_json' => 'array',
        'output_json' => 'array',
        'succeeded' => 'boolean',
        'requires_approval' => 'boolean',
    ];

    public function supportCase(): BelongsTo
    {
        return $this->belongsTo(SupportCase::class, 'support_case_id');
    }
}

