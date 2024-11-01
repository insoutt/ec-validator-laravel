<?php

use Illuminate\Support\Facades\Validator;
use Insoutt\EcValidatorLaravel\Tests\TestCase;

class CedulaTest extends TestCase
{
    public function test_invalid_cedula()
    {
        $validator = Validator::make(
            ['myparam' => '1400724651'],
            ['myparam' => 'ec_cedula']
        );
        $this->assertFalse($validator->passes());
    }

    public function test_valid_cedula()
    {
        $validator = Validator::make(
            ['myparam' => '1400724652'],
            ['myparam' => 'ec_cedula']
        );
        $this->assertTrue($validator->passes());
    }
}
