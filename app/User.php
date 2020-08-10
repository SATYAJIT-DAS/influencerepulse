<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'brandname',
        'email',
        'role_id',
        'password',
        'address1',
        'address2',
        'zip_code',
        'country',
        'state',
        'city',
        'time_zone',
        'image',
        'key_update_status',
        'claimed_status',
        'approval_status',
        'lastet_status',
        'purchase_status',
        'status',
        'mail_verify',
        'created_at',
        'email_claimed',
        'email_approval',
        'invoice1',
        'invoice2',
        'invoice3',
        'invoice4',
        'phone',
        'phone_verify',
        'phone_code',
        'registration_type',
        'signup_token',
        'token_expiry',
        'refresh_token'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function wallet(){
        return $this->hasMany('App\Model\Wallet','user_id','id');
    }

    public function getMsgFrom(){
        return $this->hasMany('App\Model\Message','user_id','id');
    }

    public function getMsgTo(){
        return $this->hasMany('App\Model\Message','to_user','id');
    }


}
