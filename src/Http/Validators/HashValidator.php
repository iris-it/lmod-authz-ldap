<?php

namespace Irisit\AuthzLdap\Http\Validators;


use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class HashValidator extends Validator
{

    /**
     * For using hash: value in requests
     *
     */
    public function validateHash($attribute, $value, $parameters)
    {
        return Hash::check($value, $parameters[0]);
    }

}