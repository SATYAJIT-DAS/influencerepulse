<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use app\User;
use CountryState;
use DateTimeZone;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $notif;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user_id = Auth::user()->id;
            $notif_order=DB::table('orders')
                    ->join('campaigns','campaigns.id','=','orders.camp_id')
                    ->where('campaigns.user_id', $user_id)
                    ->where('status','pre_approved')
                    ->count();
            $this->notif=$notif_order;
        return $next($request);
       });
    }

    public function index(){
        $role=auth()->user()->role->name;
        $user_id=auth()->user()->id;


        $user=User::Find($user_id);
        $countries = CountryState::getCountries();
        $states = CountryState::getStates('AW');
        if($user->country){
        	$states = CountryState::getStates($user->country);
        }
        $timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        $notif=$this->notif;


        return view('backend.seller.profile',compact('role','user','countries','states','timezones','notif'));
    }

    public function profileUpdate(Request $request){
        $user_id=Auth()->user()->id;
        $user=User::Find($user_id);
        $user->name=$request->name;
        $user->brandname=$request->public_name;
        $user->address1=$request->address1;
        $user->address2=$request->address2;
        $user->zip_code=$request->zip_code;
        $user->country=$request->country;
        $user->state=$request->state_id;
        $user->city=$request->city;
        $user->time_zone=$request->timezone;
        $user->phone=$request->phone;

        $user->save();

        return redirect()->back()->with('status','Your profile has been successfully updated.');
    }

    public function invoiceInput(Request $request){
    	$user_id=Auth()->user()->id;
        $user=User::Find($user_id);
    	$user->invoice1=$request->invoice_line_1;
    	$user->invoice2=$request->invoice_line_2;
    	$user->invoice3=$request->invoice_line_3;
    	$user->invoice4=$request->invoice_line_4;
    	$user->save();
    	return redirect()->back()->with('status','Your profile has been successfully updated.');
    }

}
