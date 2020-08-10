<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=[
    	'id',
    	'order_id',
    	'camp_id',
        'transaction_num',
        'amount',
        'payment_method',
    ];

    public function getOrder(){
    	return $this->belongsTo('App\Model\Order','order_id','id');
    }

    public function getCamp(){
    	return $this->belongsTo('App\Model\Campaign','camp_id','id');
    }
}
