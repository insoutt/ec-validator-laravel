<?php

namespace Insoutt\EcValidatorLaravel\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class Cedula implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $validator = \Insoutt\EcValidator\EcValidator::make();

        if (! $validator->validateCedula($value)) {
            $fail('validation.ec_cedula')->translate();
        }
    }
}
