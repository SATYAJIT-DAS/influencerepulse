<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable=[
    	'user_id',
        'camp_id',
        'date',
        'description',
        'operation',
        'amount',
        'fee_amount',
        'payment_method',
        'permission',

    ];

    public function getCamp(){
        return $this->belongsTo('App\Model\Campaign','camp_id','id');
    }
}
