<?php

namespace App\Rules;

use App\Audience;
use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class validAudience implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach (explode(',', $value) as $audience_id) {
            if (is_null(Audience::firstWhere('id', $audience_id))) {
                $fail('The audience is invalid');
            }
        }


    }
}
