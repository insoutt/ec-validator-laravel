<?php

namespace Insoutt\EcValidatorLaravel;

use Illuminate\Support\Arr;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\InvokableValidationRule;
use Insoutt\EcValidatorLaravel\Rules\Cedula;

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
            $rule = InvokableValidationRule::make(new Cedula)
                ->setValidator($validator);
            $result = $rule->passes($attribute, $value);

            if ($result == false) {
                $validator->setCustomMessages([
                    $attribute => Arr::first($rule->message()),
                ]);
            }
            return $result;
        });
    }
}
