<?php

namespace Insoutt\EcValidatorLaravel\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Insoutt\EcValidator\EcValidator;

class Placa implements ValidationRule
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

        if (! $validator->validatePlaca($value, $this->type)) {
            $fail('validation.' . $this->getName())->translate();
        }
    }

    private function getName()
    {
        return match ($this->type) {
            EcValidator::VALIDATE_PLACA_CAR => 'ec_placa_car',
            EcValidator::VALIDATE_PLACA_MOTO => 'ec_placa_moto',
            default => 'ec_placa',
        };
    }
}