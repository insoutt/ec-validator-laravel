<?php

use Illuminate\Support\Facades\Validator;

it('Invalid Telephone', function () {
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
});

it('Valid Telephone', function () {
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
});

it('Valid local cellphone', function () {
    $validator = Validator::make(
        ['myparam' => '2334590'], 
        ['myparam' => 'ec_telephone_local']
    );

    $this->assertTrue($validator->passes());
});

it('Valid national cellphone', function () {
    $validator = Validator::make(
        ['myparam' => '022334590'], 
        ['myparam' => 'ec_telephone_national']
    );

    $this->assertTrue($validator->passes());
});

it('Valid international Telephone', function () {
    $validator = Validator::make(
        ['myparam' => '59322334590'], 
        ['myparam' => 'ec_telephone_international']
    );

    $this->assertTrue($validator->passes());
});