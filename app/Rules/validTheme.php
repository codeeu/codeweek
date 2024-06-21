<?php

namespace App\Rules;

use App\Theme;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class validTheme implements ValidationRule
{
    public function validate($attribute, mixed $value, Closure $fail): void
    {
        foreach ($value as $theme_id) {
            if (is_null(Theme::firstWhere('id', $theme_id))) {
                $fail('The theme is invalid');
            }
        }
    }
}
