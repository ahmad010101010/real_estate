<?php

namespace App\Services\V1;

use App\Services\ApiFillter;

class InvoiceFillter extends ApiFillter {

    protected $allowedParms = [
        'customerId'=>['eq'],
        'amount'=>['eq','lt','gt','lte','gte'],
        'status'=>['eq','ne'],
        'billedDate'=>['eq','lt','gt','lte','gte'],
        'paidDate'=>['eq','lt','gt','lte','gte'],
    ];

    protected $columnMap = [
        'customerId'=>'customer_id',
        'paidDate'=>'paid_date',
        'billedDate'=>'billed_date'

    ];

    protected $operatorMap = [
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
        'ne'=>'!='
    ];



}
