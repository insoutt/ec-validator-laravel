<?php

namespace Insoutt\EcValidatorLaravel\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class Ruc implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $validator = \Insoutt\EcValidator\EcValidator::make();

        if (! $validator->validateRuc($value)) {
            $fail('validation.ec_ruc')->translate();
        }
    }
}
