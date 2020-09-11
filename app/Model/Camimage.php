<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Camimage extends Model
{
    protected $fillable=[
        'id',
        'cam_id',
        'image_path',
    ];
}
