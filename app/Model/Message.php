<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'id',
        'order_id',
        'date',
        'message',
        'msg_status',
        'type',
        'user_id',
        'to_user',
    ];

    public function getOrder(){
    	return $this->belongsTo('App\Model\Order','order_id','id');
    }

    public function getFrom(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function getTo(){
        return $this->belongsTo('App\User','to_user','id');
    }
}
