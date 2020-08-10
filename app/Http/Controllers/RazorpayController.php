<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Model\Camimage;
use App\Model\Fee;
use App\Model\Transaction;
use App\Model\Wallet;
use App\Model\Campaign;


class RazorpayController extends Controller
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

    function generateTransactionNum(){
        $num=date('ymdhis');
        $num=$num.strval(random_int(1000, 9999));
        return $num;
    }

    public function submit_order(Request $request) {
        // $api = new Api($api_key, $api_secret);
        // $attrbutes  = array(‘razorpay_signature’  => ‘23233’,  ‘razorpay_payment_id’  => ‘332’ ,  ‘razorpay_order_id’ => ‘12122’);
        // $order  = $api->utility->verifyPaymentSignature($attributes)
        //Input items of form

        // Orders generate
        $api_key=config('services.razor.key');
        $api_secret=config('services.razor.secret');
        $api=new Api($api_key, $api_secret);

        $amount=100*$request->amount;
        $receipt= random_int(1000, 9999);
        $order  = $api->order->create(array('receipt' => $receipt, 'amount' => $amount, 'currency' => 'INR')); // Creates order
        $order_id = $order['id']; // Get the created Order ID
        return json_encode($order_id);
    }

    public function razorWallet(Request $request){
        $fee=Fee::first()->paypal_fee;
        $amount=$request->amount*100/($fee+100);

        $wallet= new Wallet();
        $wallet->user_id=auth()->user()->id;
        $wallet->date=date('yy-m-d h:i:s');

        $api_key=config('services.razor.key');
        $api_secret=config('services.razor.secret');
        $api=new Api($api_key, $api_secret);

        $orderId=$request->razorpay_order_id;
        $payment_id=$request->razorpay_payment_id;
        $sign_id=$request->razorpay_signature;

        $attributes  = array('razorpay_signature'  => $sign_id,  'razorpay_payment_id'  => $payment_id ,  'razorpay_order_id' => $orderId);

        $order = $api->utility->verifyPaymentSignature($attributes);
        $payment = $api->payment->fetch($payment_id);
        $card = $api->card->fetch($payment->card_id);
        $last_card=$card->last4;

        $description=$payment->description;

        $wallet->payment_method="Charge Wallet with Card ".' **** **** ****'.$last_card;

        $wallet->amount=$amount;

        $wallet->fee_amount=round($amount*$fee)/100;
        $wallet->operation='general charge';
        $wallet->save();

        $transaction=new Transaction();
        $transaction->payment_method='charge';
        $transaction->wallet_id=$wallet->id;
        $transaction->user_id=auth()->user()->id;
        $transaction->transaction_num=$this->generateTransactionNum();
        $transaction->date=date('yy-m-d h:i:s');
        $transaction->amount=$wallet->amount;
        $transaction->status='for wallet charge';
        $transaction->save();

        $msg="Charge successful!";

        if (round($amount*$fee)/100 > 0) {
            $admin_wallet= new Wallet();
            $admin_wallet->user_id=1;
            $admin_wallet->date=date('yy-m-d h:i:s');
            $admin_wallet->description='Razorpay fees credited to admin general wallet for general charge transaction done by seller';
            $admin_wallet->payment_method=$description.' **** **** ****'.$last_card;
            $admin_wallet->amount=round($amount*$fee)/100;
            $admin_wallet->operation='Razorpay fees credit to Admin';
            $admin_wallet->save();
        }

        return redirect()->route('seller.wallet')->with('status', $msg);

        $role=auth()->user()->role->name;
        $user_id=auth()->user()->id;
        $wallets=Wallet::where('user_id',$user_id)->orderby('updated_at','DESC')->get();

        $wallet_sum=Wallet::where('user_id',$user_id)->sum('amount');

        $general_amount=Wallet::where('user_id',$user_id)->where('operation','general charge')->sum('amount');

        $offline=Campaign::where('user_id', $user_id)->where('permission','offline')->orderby('updated_at','DESC')->get();

        $camp_wallets=Campaign::where('user_id', $user_id)->orderby('updated_at','DESC')->get();

        $fee=Fee::first();
        $notif=$this->notif;

        // Orders generate
        $api_key=config('services.razor.key');
        $api_secret=config('services.razor.secret');
        $api=new Api($api_key, $api_secret);
        $amount=round((500*(100+$fee->paypal_fee)));
        $receipt= random_int(1000, 9999);
        $order  = $api->order->create(array('receipt' => $receipt, 'amount' => $amount, 'currency' => 'INR')); // Creates order
        $order_id = $order['id']; // Get the created Order ID


        return view('backend.seller.wallet',compact('role','wallets','wallet_sum','camp_wallets','offline','general_amount','fee','notif','order_id','amount','msg'));
    }
}
