<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AgeRestriction implements Rule
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
        return ($value >= 5 && $value <= 65);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You have to be within the age range of 5 and 65 years to be eligible to claim insurance.';
    }
}
