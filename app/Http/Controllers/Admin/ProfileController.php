<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use User;

class ProfileController extends Controller
{
    public function change_pass(){
    	return view('backend.admin.pass_change');
    }

    public function change_post_pass(Request $request){
    	$old=$request->current_password;
    	$new=$request->new_password;

    }
}
