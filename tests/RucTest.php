<?php

use Illuminate\Support\Facades\Validator;

it('Invalid RUC', function () {
    $validator = Validator::make(
        ['myparam' => '3791248678001'], 
        ['myparam' => 'ec_ruc']
    );
    $this->assertFalse($validator->passes());
});

it('Valid RUC', function () {
    $validator = Validator::make(
        ['myparam' => '1791248678001'], 
        ['myparam' => 'ec_ruc']
    );
    $this->assertTrue($validator->passes());
});
