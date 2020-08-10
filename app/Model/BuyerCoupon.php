<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuyerCoupon extends Model
{
    protected $fillable=[
        'id',
        'buyer_id',
        'coupon_id',
    ];

    public function getCoupon(){
        return $this->belongsToMany('App\Model\Coupon','coupon_id','id');
    }
}
