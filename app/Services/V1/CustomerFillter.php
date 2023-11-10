<?php

namespace App\Services\V1;

use App\Services\ApiFillter;

class CustomerFillter extends ApiFillter {

    protected $allowedParms = [
        'name'=>['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'state'=>['eq'],
        'postalCode'=>['eq','gt','lt'],
    ];

    protected $columnMap = [
        'postalCode'=>'postal_code'
    ];

    protected $operatorMap = [
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
    ];



}
