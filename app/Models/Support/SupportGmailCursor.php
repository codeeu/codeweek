<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

class SupportGmailCursor extends Model
{
    protected $table = 'support_gmail_cursors';

    protected $fillable = [
        'mailbox',
        'label',
        'last_history_id',
        'last_polled_at',
    ];

    protected $casts = [
        'last_polled_at' => 'datetime',
    ];
}

