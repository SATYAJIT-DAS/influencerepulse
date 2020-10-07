<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'id',
        'order_id',
        'buyer_id',
        'camp_id',
        'start_time',
        'status',
    ];

    public function getBuyer(){
        return $this->belongsTo('App\User','buyer_id','id');
    }

    public function getCamp(){
        return $this->belongsTo('App\Model\Campaign','camp_id','id');
    }
    

    
}
