<?php

namespace Insoutt\EcValidatorLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Insoutt\EcValidatorLaravel\Commands\EcValidatorLaravelCommand;

class EcValidatorLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ec-validator-laravel');
    }
}
