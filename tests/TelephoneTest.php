<?php

use Illuminate\Support\Facades\Validator;
use Insoutt\EcValidatorLaravel\Tests\TestCase;

class TelephoneTest extends TestCase
{
    public function test_invalid_telephone()
    {
        $validator = Validator::make(
            ['myparam' => '09809'],
            ['myparam' => 'ec_telephone']
        );
        $this->assertFalse($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => '022334590'],
            ['myparam' => 'ec_telephone_local']
        );
    
        $validator = Validator::make(
            ['myparam' => '59342334590'],
            ['myparam' => 'ec_telephone_national']
        );
    
        $this->assertFalse($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => '022334590'],
            ['myparam' => 'ec_telephone_international']
        );
    
        $this->assertFalse($validator->passes());
    }

    public function test_valid_telephone()
    {
        $validator = Validator::make(
            ['myparam' => '2334590'],
            ['myparam' => 'ec_telephone']
        );
    
        $this->assertTrue($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => '022334590'],
            ['myparam' => 'ec_telephone']
        );
    
        $this->assertTrue($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => '59322334590'],
            ['myparam' => 'ec_telephone']
        );
    
        $this->assertTrue($validator->passes());   
    }

    public function test_valid_local_telephone()
    {
        $validator = Validator::make(
            ['myparam' => '2334590'],
            ['myparam' => 'ec_telephone_local']
        );
    
        $this->assertTrue($validator->passes());
    }

    public function test_valid_national_telephone()
    {
        $validator = Validator::make(
            ['myparam' => '022334590'],
            ['myparam' => 'ec_telephone_national']
        );
    
        $this->assertTrue($validator->passes());
    }

    public function test_valid_international_telephone()
    {
        $validator = Validator::make(
            ['myparam' => '59322334590'],
            ['myparam' => 'ec_telephone_international']
        );
    
        $this->assertTrue($validator->passes());
    }
}
