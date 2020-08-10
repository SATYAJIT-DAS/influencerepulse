<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use app\User;
use CountryState;
use DateTimeZone;

use App\Model\Wallet;
use App\Model\Transaction;
use App\Model\Fee;
use Stripe\Stripe;
use Stripe\Charge;

class ProfileController extends Controller
{
	function generateTransactionNum(){
        $num=date('ymdhis');
        $num=$num.strval(random_int(1000, 9999));
        return $num;
    }

    public function index(){
        $role=auth()->user()->role->name;

        $user_id=auth()->user()->id;


        $user=User::Find($user_id);

        $timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);

        return view('backend.buyer.profile',compact('role','timezones','user'));
    }

    public function payout(){

    	$wallet_sum=Wallet::where('user_id', auth()->user()->id)->sum('amount');
    	$wallets=Wallet::where('user_id', auth()->user()->id)->get();
    	$fee=Fee::first();

    	return view('backend.buyer.payout', compact('wallets','wallet_sum','fee'));
    }

    public function charge(Request $request){

    	Stripe::setApiKey(config('services.stripe.secret')); 
    	
        $token = request('stripeToken'); 
        $fee=Fee::first()->paypal_fee;
        $amount=$request->amount*($fee/100+1);
        $description=$request->desription;

        $charge = Charge::create([
                "amount" => round($amount * 100),
                "currency" => "INR",
                'description' => $description,
                'source' => $token,
        ]);   

        $wallet_admin=new Wallet();
        $wallet_admin->user_id=1;
        $wallet_admin->date=date('yy-m-d h:i:s');
        $wallet_admin->description=$description;
        $wallet_admin->amount=round($request->amount*$fee)/100;
        $wallet_admin->save();

        $wallet= new Wallet();
        $wallet->user_id=auth()->user()->id;
        $wallet->date=date('yy-m-d h:i:s');
        $wallet->description=$description;

        $last_card=$charge->payment_method_details['card']['last4'];
        $payment_type=$charge->payment_method_details['type'];
        $wallet->payment_method=$payment_type.' **** **** ****'.$last_card;

        $wallet->amount=$request->amount;
        
        $wallet->fee_amount=round($request->amount*$fee)/100;
        $wallet->operation=$charge->object;
        $wallet->save();

        $transaction=new Transaction();
        $transaction->payment_method='charge';
        $transaction->wallet_id=$wallet->id;
        $transaction->user_id=auth()->user()->id;
        $transaction->transaction_num=$this->generateTransactionNum();
        $transaction->date=date('yy-m-d h:i:s');
        $transaction->amount=$wallet->amount;
        $transaction->camp_id=$wallet->camp_id;
        $transaction->status='for wallet charge';
        $transaction->save();

        $msg="Payment successful!";

        return redirect()->back()->with('status','Payment successful!');
    }



}
