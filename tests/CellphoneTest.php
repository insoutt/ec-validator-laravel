<?php

use Illuminate\Support\Facades\Validator;

it('Invalid Cellphone', function () {
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
});

it('Valid Cellphone', function () {
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
});

it('Valid Cellphone with code', function () {
    $validator = Validator::make(
        ['myparam' => '593947888421'], 
        ['myparam' => 'ec_cellphone_with_code']
    );

    $this->assertTrue($validator->passes());
});


it('Valid national cellphone', function () {
    $validator = Validator::make(
        ['myparam' => '0947888421'], 
        ['myparam' => 'ec_cellphone_national']
    );

    $this->assertTrue($validator->passes());
});