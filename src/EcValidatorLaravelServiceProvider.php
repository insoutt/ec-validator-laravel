<?php

namespace Insoutt\EcValidatorLaravel;

use Illuminate\Support\Arr;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\InvokableValidationRule;
use Insoutt\EcValidator\EcValidator;
use Insoutt\EcValidatorLaravel\Rules\Cedula;
use Insoutt\EcValidatorLaravel\Rules\Placa;

class EcValidatorLaravelServiceProvider extends PackageServiceProvider
{
    private $rules = [
        [
            'name' => 'ec_cedula',
            'class' => Cedula::class,
            'params' => [],
        ],
        [
            'name' => 'ec_placa',
            'class' => Placa::class,
            'params' => [EcValidator::VALIDATE_GENERAL],
        ],
        [
            'name' => 'ec_placa_car',
            'class' => Placa::class,
            'params' => [EcValidator::VALIDATE_PLACA_CAR],
        ],
        [
            'name' => 'ec_placa_moto',
            'class' => Placa::class,
            'params' => [EcValidator::VALIDATE_PLACA_MOTO],
        ],
    ];

    public function bootingPackage()
    {
        $this->loadRules();
    }

    public function configurePackage(Package $package): void
    {
        /*
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ec-validator-laravel')
            ->hasTranslations();
    }


    public function loadRules()
    {
        foreach ($this->rules as $rule) {
            Validator::extend($rule['name'], function ($attribute, $value, $parameters, $validator) use ($rule) {
                return $this->customValidation($rule['class'], $attribute, $value, $rule['params'], $validator);
            });
        }
    }

    public function customValidation($classname, $attribute, $value, $parameters, $validator)
    {
        $rule = InvokableValidationRule::make(new $classname(...$parameters))->setValidator($validator);
        $result = $rule->passes($attribute, $value);

        if ($result == false) {
            $validator->setCustomMessages([
                $attribute => Arr::first($rule->message()),
            ]);
        }
        return $result;
    }
}
