<?php

use Illuminate\Support\Facades\Validator;
use Insoutt\EcValidatorLaravel\Tests\TestCase;

class RucTest extends TestCase
{
    public function test_invalid_ruc()
    {
        $validator = Validator::make(
            ['myparam' => '3791248678001'],
            ['myparam' => 'ec_ruc']
        );
        $this->assertFalse($validator->passes());
    }

    public function test_valid_ruc()
    {
        $validator = Validator::make(
            ['myparam' => '1791248678001'],
            ['myparam' => 'ec_ruc']
        );
        $this->assertTrue($validator->passes());
    }
}
