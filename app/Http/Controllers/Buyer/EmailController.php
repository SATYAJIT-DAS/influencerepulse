<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class EmailController extends Controller
{
    public function index(){
        $role=auth()->user()->role->name;
        $user_id=auth()->user()->id;
        $user=User::Find($user_id);
        return view('backend.buyer.email',compact('role','user'));
    }

    
}
