<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SocialUrl implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }


    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
