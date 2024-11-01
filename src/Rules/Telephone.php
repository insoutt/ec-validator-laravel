<?php

namespace Insoutt\EcValidatorLaravel\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Insoutt\EcValidator\EcValidator;

class Telephone implements ValidationRule
{
    protected $type = EcValidator::VALIDATE_GENERAL;

    public function __construct($type)
    {
        $this->type = $type;
    }
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $validator = \Insoutt\EcValidator\EcValidator::make();

        if (! $validator->validateTelephone($value, $this->type)) {
            $fail('validation.' . $this->getName())->translate();
        }
    }

    private function getName()
    {
        return match ($this->type) {
            EcValidator::VALIDATE_LOCAL => 'ec_cellphone_local',
            EcValidator::VALIDATE_NATIONAL => 'ec_cellphone_national',
            EcValidator::VALIDATE_INTERNATIONAL => 'ec_cellphone_international',
            default => 'ec_cellphone',
        };
    }
}