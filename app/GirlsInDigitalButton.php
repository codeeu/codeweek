<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GirlsInDigitalButton extends Model
{
    protected $table = 'girls_in_digital_buttons';

    protected $fillable = [
        'key',
        'label',
        'url',
        'open_new_tab',
        'enabled',
        'position',
    ];

    protected $casts = [
        'open_new_tab' => 'boolean',
        'enabled' => 'boolean',
        'position' => 'integer',
    ];

    public function scopeEnabled($query)
    {
        return $query->where('enabled', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('position')->orderBy('id');
    }
}
