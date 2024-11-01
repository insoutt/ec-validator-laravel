<?php

namespace Insoutt\EcValidatorLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Support\Facades\Validator;
use Insoutt\EcValidatorLaravel\Rules\Cedula;

class EcValidatorLaravelServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        Validator::extend('ec_cedula', function ($attribute, $value, $parameters, $validator) {
            $rule = new Cedula();
            $rule->validate($attribute, $value, $this->fail($validator, $attribute));

            return !$validator->errors()->has($attribute);
        });
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ec-validator-laravel')
            ->hasTranslations();
    }

    private function fail($validator, $attribute)
    {
        return function($message) use ($validator, $attribute) {
            $validator->errors()->add($attribute, $message);
        };
    }
}
