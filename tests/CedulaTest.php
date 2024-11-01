<?php

use Illuminate\Support\Facades\Validator;

it('Invalid Cedula', function () {
    /** @var \TestCase\TestCase $this */
    $validator = Validator::make(
        ['myparam' => '1400724651'],
        ['myparam' => 'ec_cedula']
    );
    $this->assertFalse($validator->passes());
});

it('Valid Cedula', function () {
    /** @var \TestCase\TestCase $this */
    $validator = Validator::make(
        ['myparam' => '1400724652'],
        ['myparam' => 'ec_cedula']
    );
    $this->assertTrue($validator->passes());
});
