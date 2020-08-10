<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Couponimage extends Model
{
    protected $fillable=[
        'id',
        'coupon_id',
        'image_path',
    ];
}
