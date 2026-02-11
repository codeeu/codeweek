<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GirlsInDigitalPage extends Model
{
    protected $table = 'girls_in_digital_page';

    protected $fillable = ['locale_overrides'];

    protected $casts = ['locale_overrides' => 'array'];

    /**
     * Get the singleton page config (id = 1). Create if missing.
     */
    public static function config(): self
    {
        $page = self::first();
        if ($page) {
            return $page;
        }
        return self::create(['locale_overrides' => null]);
    }

    /**
     * Get content for a key in the current locale: override or lang fallback.
     */
    public function contentForLocale(string $key, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (! empty($overrides[$locale][$key])) {
            return (string) $overrides[$locale][$key];
        }
        return (string) __('girls-in-digital.' . $key);
    }
}
