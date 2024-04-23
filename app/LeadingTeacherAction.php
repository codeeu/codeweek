<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadingTeacherAction extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
