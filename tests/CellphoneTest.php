<?php

use Illuminate\Support\Facades\Validator;
use Insoutt\EcValidatorLaravel\Tests\TestCase;

class CellphoneTest extends TestCase {
    public function test_invalid_cellphone()
    {
        $validator = Validator::make(
            ['myparam' => '09809'],
            ['myparam' => 'ec_cellphone']
        );
        $this->assertFalse($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => '593947888421'],
            ['myparam' => 'ec_cellphone_national']
        );
    
        $this->assertFalse($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => '0947888421'],
            ['myparam' => 'ec_cellphone_with_code']
        );
    
        $this->assertFalse($validator->passes());
    }

    public function test_valid_cellphone()
    {
        $validator = Validator::make(
            ['myparam' => '0947888421'],
            ['myparam' => 'ec_cellphone']
        );
    
        $this->assertTrue($validator->passes());
    
        $validator = Validator::make(
            ['myparam' => '593947888421'],
            ['myparam' => 'ec_cellphone']
        );
    
        $this->assertTrue($validator->passes());   
    }

    public function test_valid_national_cellphone()
    {
        $validator = Validator::make(
            ['myparam' => '0947888421'],
            ['myparam' => 'ec_cellphone_national']
        );
    
        $this->assertTrue($validator->passes());
    }

    public function test_valid_international_cellphone()
    {
        $validator = Validator::make(
            ['myparam' => '593947888421'],
            ['myparam' => 'ec_cellphone_with_code']
        );
    
        $this->assertTrue($validator->passes());   
    }
}