<?php

namespace Insoutt\EcValidatorLaravel;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\InvokableValidationRule;
use Insoutt\EcValidator\EcValidator;
use Insoutt\EcValidatorLaravel\Rules\Cedula;
use Insoutt\EcValidatorLaravel\Rules\Cellphone;
use Insoutt\EcValidatorLaravel\Rules\Placa;
use Insoutt\EcValidatorLaravel\Rules\Ruc;
use Insoutt\EcValidatorLaravel\Rules\Telephone;
use Insoutt\EcValidatorLaravel\Services\InvokableValidationRule as ServicesInvokableValidationRule;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EcValidatorLaravelServiceProvider extends PackageServiceProvider
{
    private $rules = [
        [
            'name' => 'ec_cedula',
            'class' => Cedula::class,
            'params' => [],
        ],
        [
            'name' => 'ec_ruc',
            'class' => Ruc::class,
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
        [
            'name' => 'ec_cellphone',
            'class' => Cellphone::class,
            'params' => [EcValidator::VALIDATE_GENERAL],
        ],
        [
            'name' => 'ec_cellphone_national',
            'class' => Cellphone::class,
            'params' => [EcValidator::VALIDATE_NATIONAL],
        ],
        [
            'name' => 'ec_cellphone_with_code',
            'class' => Cellphone::class,
            'params' => [EcValidator::VALIDATE_INTERNATIONAL],
        ],
        [
            'name' => 'ec_telephone',
            'class' => Telephone::class,
            'params' => [EcValidator::VALIDATE_GENERAL],
        ],
        [
            'name' => 'ec_telephone_local',
            'class' => Telephone::class,
            'params' => [EcValidator::VALIDATE_LOCAL],
        ],
        [
            'name' => 'ec_telephone_national',
            'class' => Telephone::class,
            'params' => [EcValidator::VALIDATE_NATIONAL],
        ],
        [
            'name' => 'ec_telephone_international',
            'class' => Telephone::class,
            'params' => [EcValidator::VALIDATE_INTERNATIONAL],
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
        $invokable = InvokableValidationRule::class;
        if(app()->version_compare(app()->version(), '10.0', '<')) {
            $invokable = ServicesInvokableValidationRule::class;
        }

        $rule = $invokable::make(new $classname(...$parameters))->setValidator($validator);
        $result = $rule->passes($attribute, $value);

        if ($result == false) {
            $validator->setCustomMessages([
                $attribute => Arr::first($rule->message()),
            ]);
        }

        return $result;
    }
}
