<?php

use Illuminate\Support\Facades\Validator;
use Insoutt\EcValidatorLaravel\Tests\TestCase;

class PlacaTest extends TestCase
{
    public function test_invalid_placa()
    {
        $validator = Validator::make(
            ['myparam' => 'abc09'],
            ['myparam' => 'ec_placa']
        );
        $this->assertFalse($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => 'TBB7233'],
            ['myparam' => 'ec_placa_moto']
        );
    
        $this->assertFalse($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => 'IX617C'],
            ['myparam' => 'ec_placa_car']
        );
    
        $this->assertFalse($validator->passes());
    }

    public function test_valid_placa()
    {
        $validator = Validator::make(
            ['myparam' => 'TBB7233'],
            ['myparam' => 'ec_placa']
        );
    
        $this->assertTrue($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => 'IX617C'],
            ['myparam' => 'ec_placa']
        );
    
        $this->assertTrue($validator->passes());
    }

    public function test_valid_car_placa()
    {
        $validator = Validator::make(
            ['myparam' => 'TBB7233'],
            ['myparam' => 'ec_placa_car']
        );
    
        $this->assertTrue($validator->passes());   
    }

    public function test_valid_moto_placa()
    {
        $validator = Validator::make(
            ['myparam' => 'IX617C'],
            ['myparam' => 'ec_placa_moto']
        );
    
        $this->assertTrue($validator->passes());
    }
}