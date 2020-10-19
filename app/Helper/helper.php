<?php
use App\Model\Fee;

if (!function_exists('dynamicCurrency')) {
function dynamicCurrency(){
    
    $fee=Fee::Find(1);
    return $fee->currency;
}
}