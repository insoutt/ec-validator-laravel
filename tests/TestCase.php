<?php

namespace Insoutt\EcValidatorLaravel\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Insoutt\EcValidatorLaravel\EcValidatorLaravelServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Insoutt\\EcValidatorLaravel\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            EcValidatorLaravelServiceProvider::class,
        ];
    }
}
