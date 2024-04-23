<?php

namespace App\Rules;

use App\Audience;
use Illuminate\Contracts\Validation\Rule;

class validAudience implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach (explode(',', $value) as $audience_id) {
            if (is_null(Audience::firstWhere('id', $audience_id))) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The audience is invalid';
    }
}
