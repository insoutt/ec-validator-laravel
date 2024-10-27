<?php

namespace Insoutt\EcValidatorLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Insoutt\EcValidatorLaravel\EcValidatorLaravel
 */
class EcValidatorLaravel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Insoutt\EcValidatorLaravel\EcValidatorLaravel::class;
    }
}
