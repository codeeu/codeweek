<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GirlsInDigitalFaqItem extends Model
{
    protected static function booted()
    {
        static::creating(function (self $item) {
            $pageId = $item->page_id ?: (request()->query('viaResourceId') ?? 1);
            $item->page_id = (int) $pageId;
            if ($item->position === null || $item->position === 0) {
                $max = self::where('page_id', $item->page_id)->max('position');
                $item->position = $max === null ? 0 : (int) $max + 1;
            }
        });
    }
    protected $table = 'girls_in_digital_faq_items';

    protected $fillable = [
        'page_id',
        'position',
        'question',
        'answer',
        'locale_overrides',
    ];

    protected $casts = [
        'position' => 'integer',
        'locale_overrides' => 'array',
    ];

    public function page()
    {
        return $this->belongsTo(GirlsInDigitalPage::class, 'page_id');
    }

    public function questionForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (! empty($overrides[$locale]['question'])) {
            return (string) $overrides[$locale]['question'];
        }
        return (string) ($this->question ?? '');
    }

    public function answerForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (! empty($overrides[$locale]['answer'])) {
            return (string) $overrides[$locale]['answer'];
        }
        return (string) ($this->answer ?? '');
    }
}
