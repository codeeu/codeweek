<?php

namespace App\Rules;

use App\Theme;
use Illuminate\Contracts\Validation\Rule;

class validTheme implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed  $value
     */
    public function passes(string $attribute, $value): bool
    {
        foreach (explode(',', $value) as $theme_id) {
            if (is_null(Theme::firstWhere('id', $theme_id))) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'The theme is invalid';
    }
}
