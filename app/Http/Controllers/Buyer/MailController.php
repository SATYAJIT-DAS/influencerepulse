<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use CountryState;
use app\User;

class MailController extends Controller
{
    public function index(){
        $role=auth()->user()->role->name;
        $user_id=auth()->user()->id;


        $user=User::Find($user_id);

        $countries = CountryState::getCountries();
        $states = CountryState::getStates('AW');

        if($user->country){
        	$states = CountryState::getStates($user->country);
        }

        return view('backend.buyer.mail',compact('role','countries','states','user'));
    }

    public function mailStore(Request $request){
    	$user_id=auth()->user()->id;
        $user=User::Find($user_id);
        $user->name=$request->name;
        $user->address1=$request->address1;
        $user->address2=$request->address2;
        $user->zip_code=$request->zip_code;
        $user->country=$request->country;
        $user->state=$request->state_id;
        $user->city=$request->city;
        $user->phone=$request->phone;
        $user->save();
        return redirect()->back()->with('status','Your mail has been successfully updated.');
    }

    public function profileStore(Request $request){
    	$user_id=auth()->user()->id;
        $user=User::Find($user_id);
        $user->name=$request->name;
        $user->time_zone=$request->timezone;
        $user->save();
        return redirect()->back()->with('status','Your mail has been successfully updated.');
    }
}
