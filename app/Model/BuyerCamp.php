<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuyerCamp extends Model
{
    protected $fillable=[
        'id',
        'buyer_id',
        'camp_id',
    ];

    public function getCamp(){
        return $this->belongsToMany('App\Model\Campaign','camp_id','id');
    }
}
