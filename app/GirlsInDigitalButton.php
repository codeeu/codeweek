<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GirlsInDigitalButton extends Model
{
    protected $table = 'girls_in_digital_buttons';

    protected $fillable = [
        'page_id',
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

    public function page()
    {
        return $this->belongsTo(GirlsInDigitalPage::class, 'page_id');
    }
}
