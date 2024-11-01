<?php

use Illuminate\Support\Facades\Validator;

it('Invalid Placa', function () {
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
});

it('Valid Placa', function () {
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
});

it('Valid car placa', function () {
    $validator = Validator::make(
        ['myparam' => 'TBB7233'],
        ['myparam' => 'ec_placa_car']
    );

    $this->assertTrue($validator->passes());
});

it('Valid moto Placa', function () {
    $validator = Validator::make(
        ['myparam' => 'IX617C'],
        ['myparam' => 'ec_placa_moto']
    );

    $this->assertTrue($validator->passes());
});
