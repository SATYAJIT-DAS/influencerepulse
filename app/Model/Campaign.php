<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable=[
        'id',
        'user_id',
        'product_name',
        'description',
        'category',
        'marketplace',
        'amazon_id',
        'brand_name',
        'product_id',
        'picture',
        'price',
        'rebate_price',
        'start_date',
        'start_time',
        'daily_rebates',
        'total_rebates',
        'product_url',
        'keyword1',
        'keyword2',
        'keyword3',
        'private_status',
        'chrome_status',
        'free_status',
        'permission',
        'favorite',
        'wallet',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function market(){
        return $this->belongsTo('App\Model\Marketplace','marketplace','id');
    }

    public function getCategory(){
        return $this->belongsTo('App\Model\Category','category','id');
    }

    public function pic(){
        return $this->hasMany('App\Model\Camimage','cam_id','id');
    }

    public function getOrder(){
        return $this->hasMany('App\Model\Order','camp_id','id');
    }
}
