<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=[
    	'id',
    	'user_id',
    	'opinion',
    	'receive_time',
    	'response',
    	'response_time',
        'status',
    	'user_name',
	];

	public function user(){
		return $this->belongsTo('App\User');
	}
}
