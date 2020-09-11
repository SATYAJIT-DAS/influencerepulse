<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable=[
        'id',
        'user_id',
        'market_place',
        'product_id',
        'product_name',
        'description',
        'category',
        'brand_name',
        'picture',
        'price',
        'off_per',
        'coupon_code',
        'start_date',
        'end_date',
        'product_url',
        'keyword1',
        'keyword2',
        'keyword3',
        'free_status',
        'upload_status',
        'favorite',
        'permission',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function market(){
        return $this->belongsTo('App\Model\Marketplace','market_place','id');
    }

    public function category(){
        return $this->belongsTo('App\Model\Category','category','id');
    }

    public function coupon_image(){
        return $this->hasMany('App\Model\Couponimage','coupon_id','id');
    }
    
}
