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
        Validator::extend('ec_cedula', function ($attribute, $value, $parameters, $validator) {
            return $this->customValidation(Cedula::class, $attribute, $value, $parameters, $validator);
        });

        Validator::extend('ec_placa', function ($attribute, $value, $parameters, $validator) {
            return $this->customValidation(Placa::class, $attribute, $value, [EcValidator::VALIDATE_GENERAL], $validator);
        });

        Validator::extend('ec_placa_car', function ($attribute, $value, $parameters, $validator) {
            return $this->customValidation(Placa::class, $attribute, $value, [EcValidator::VALIDATE_PLACA_CAR], $validator);
        });

        Validator::extend('ec_placa_moto', function ($attribute, $value, $parameters, $validator) {
            return $this->customValidation(Placa::class, $attribute, $value, [EcValidator::VALIDATE_PLACA_MOTO], $validator);
        });
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
