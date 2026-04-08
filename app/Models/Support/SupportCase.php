<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupportCase extends Model
{
    protected $table = 'support_cases';

    protected $guarded = [];

    protected $casts = [
        'secondary_emails' => 'array',
        'needs_human_review' => 'boolean',
        'confidence' => 'decimal:4',
    ];

    public function actions(): HasMany
    {
        return $this->hasMany(SupportCaseAction::class, 'support_case_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(SupportCaseMessage::class, 'support_case_id');
    }

    public function approvals(): HasMany
    {
        return $this->hasMany(SupportApproval::class, 'support_case_id');
    }
}

