<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Model\Campaign;
use App\Model\Category;
use App\Model\Marketplace;
use App\Model\Camimage;
use App\Model\Transaction;

use Razorpay\Api\Api;

use Session;
use Stripe\Stripe;
use Stripe\Charge;
use App\Model\Fee;
use App\Model\Order;
use App\Model\Wallet;

use App\Charts\CalcChart;
use App\User;

class CampaignsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $notif;
    private $razor_api;

    public function __construct()
    {
        $api_key=config('services.razor.key');
        $api_secret=config('services.razor.secret');
        $this->razor_api = new Api($api_key, $api_secret);

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
        $campaigns=Campaign::where('user_id', $user_id)->orderby('updated_at','DESC')->get();

        $online=Campaign::where('permission','online')->where('user_id', $user_id)->count();
        $all=Campaign::where('user_id', $user_id)->count();
        $offline=Campaign::where('permission','offline')->where('user_id', $user_id)->count();
        $ready=Campaign::where('permission','ready')->where('user_id', $user_id)->count();
        $pending=Campaign::where('permission','pending')->where('user_id', $user_id)->count();
        $incomplete=Campaign::where('permission','incomplete')->where('user_id', $user_id)->count();
        $completed=Campaign::where('permission','completed')->where('user_id', $user_id)->count();
        $cancelled=Campaign::where('permission','cancelled')->where('user_id', $user_id)->count();

        $notif=$this->notif;
        return view('backend.seller.campaigns',
            compact('role','campaigns','online','all','offline','ready','pending','incomplete','completed','cancelled','notif'));
    }

    public function add(){
        $categories=Category::all();
        $markets=Marketplace::all();
        $notif=$this->notif;

        return view('backend.seller.create-campa.create-campaign', compact('categories','markets','notif'));
    }

    //create start
    public function createCampaign(Request $request){

        $camp=new Campaign($request->all());
        $user_id=auth()->user()->id;
        $camp->permission="incomplete";
        $camp->favorite=0;
        $camp->wallet=0;
        $camp->user_id=$user_id;
        $camp->save();
        $msg=" Your campaign has been created, please add now pictures.";

        $notif=$this->notif;

        return view('backend.seller.create-campa.campaign-pictures', compact('camp','msg','notif'));
    }

    public function camPicStore(Request $request, $cam_id){
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);

        $camimage = new Camimage();
        $camimage->cam_id=$cam_id;
        $camimage->image_path = $imageName;
        $camimage->save();

        $images=Camimage::where('cam_id',$cam_id)->get();

        return response()->json(['success'=>$images, 'message' => 'Your campaign has been updated.']);
    }

    public function camPicDestroy(Request $request){
        $filename =  $request->get('filename');
        Camimage::where('image_path',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function camPicDelete(Request $request){
        $del_id=$request->del_id;
        Camimage::destroy($del_id);

        $cam_id=$request->camp_id;
        $images=Camimage::where('cam_id',$cam_id)->get();
        return response()->json(['success'=>$images, 'message' => 'Your campaign has been deleted.']);

    }

    public function picSave(Request $request){
        $camp_id=$request->camp_id;
        $camp=Campaign::FindOrFail($camp_id);

        $notif=$this->notif;

        return view('backend.seller.create-campa.campaign-set',compact('camp','notif'));
    }

    public function campaignSet(Request $request){



        $camp_id=$request->camp_id;
        $camp=Campaign::FindOrFail($camp_id);

        $camp->price=$request->price;
        $camp->rebate_price=$request->rebate_price;
        $camp->start_date=$request->start_date;
        $camp->start_time=$request->start_time;
        $camp->daily_rebates=$request->max_intents_daily;
        $camp->total_rebates=$request->max_intents_total;
        $camp->product_url=$request->product_url;
        $camp->keyword1=$request->keyword1;
        $camp->keyword2=$request->keyword2;
        $camp->keyword3=$request->keyword3;
        $camp->private_status=$request->private_status;
        $camp->free_status=$request->free_status;

        $camp->total_count=0;

        $camp->price_rebate_price=$request->price-$request->rebate_price;

        $camp->save();

        $images=Camimage::where('cam_id', $camp_id)->get();
        $msg="Your campaign settings have been saved.";

        $notif=$this->notif;

        return view('backend.seller.create-campa.campaign-preview', compact('camp','images','msg','notif'));
    }

    function generateTransactionNum(){
        $num=date('ymdhis');
        $num=$num.strval(random_int(1000, 9999));
        return $num;
    }



    public function preview(Request $request){
        $camp_id=$request->camp_id;
        $camp=Campaign::FindOrFail($camp_id);
        $fee=Fee::first();

        $wallet_amount=Wallet::where('user_id',auth()->user()->id)->where('operation','general charge')->sum('amount');

        $notif=$this->notif;


        // Orders generate
        $api=$this->razor_api;
        $amount=round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates)*(100+$fee->paypal_fee));
        $receipt= random_int(1000, 9999);
        $order  = $api->order->create(array('receipt' => $receipt, 'amount' => $amount, 'currency' => 'INR')); // Creates order
        $order_id = $order['id']; // Get the created Order ID
        return view('backend.seller.create-campa.payment', compact('camp','fee','wallet_amount','notif','order_id','amount'));
    }

    public function walletCharge(Request $request){
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

        // $wallet_admin=new Wallet();
        // $wallet_admin->user_id=1;
        // $wallet_admin->date=date('yy-m-d h:i:s');
        // $wallet_admin->description=$description;
        // $wallet_admin->amount=round($request->amount*$fee)/100;
        // $wallet_admin->save();

        $wallet= new Wallet();
        $wallet->user_id=auth()->user()->id;
        $wallet->date=date('yy-m-d h:i:s');
        $wallet->description=$description;

        $last_card=$charge->payment_method_details['card']['last4'];
        $payment_type=$charge->payment_method_details['type'];
        $wallet->payment_method=$payment_type.' **** **** ****'.$last_card;

        $wallet->amount=$request->amount;

        $wallet->fee_amount=round($request->amount*$fee)/100;
        $wallet->operation='general charge';
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

        $camp=Campaign::Find($request->camp_id);

        $msg="Payment successful!";

        $wallet_amount=Wallet::where('user_id',auth()->user()->id)->where('operation','general charge')->sum('amount');

        $fee=Fee::first();
        $notif=$this->notif;
        return view('backend.seller.create-campa.payment', compact('camp','fee','msg','wallet_amount','notif'));
    }



    // public function stripePayment(Request $request){

    //     $camp=Campaign::Find($request->camp_id);
    //     $fee=Fee::first()->paypal_fee;


    //     $wallet= new Wallet();
    //     $transaction=new Transaction();


    //     if($request->pay_type == 'stripe'){

    //         Stripe::setApiKey(config('services.stripe.secret'));
    //         $token = request('stripeToken');

    //         $description='Pay for'.$camp->product_name.' with Stripe';

    //         $amount=$request->amount*($fee/100+1);

    //         $charge = Charge::create([
    //                 "amount" => round($amount * 100),
    //                 "currency" => "INR",
    //                 'description' => $description,
    //                 'source' => $token,
    //         ]);
    //         // $wallet_admin=new Wallet();
    //         // $wallet_admin->user_id=1;
    //         // $wallet_admin->date=date('yy-m-d h:i:s');
    //         // $wallet_admin->description=$description;
    //         // $wallet_admin->amount=round($request->amount*$fee)/100;
    //         // $wallet_admin->save();

    //         $wallet->user_id=auth()->user()->id;
    //         $wallet->camp_id=$request->camp_id;
    //         $wallet->date=date('yy-m-d h:i:s');
    //         $wallet->description=$description;

    //         $last_card=$charge->payment_method_details['card']['last4'];
    //         $payment_type=$charge->payment_method_details['type'];
    //         $wallet->payment_method=$payment_type.' **** **** ****'.$last_card;

    //         $wallet->amount=$request->amount;

    //         $wallet->fee_amount=round($request->amount*$fee)/100;
    //         $wallet->operation=$charge->object;
    //         $wallet->save();



    //         $transaction->payment_method='charge';

    //     }else{

    //         $wallet_amount=Wallet::where('user_id',auth()->user()->id)->where('operation','general charge')->sum('amount');
    //         if($wallet_amount > $request->amount){
    //             $description='Pay for '.$camp->product_name.' with Wallet';

    //             $wallet->user_id=auth()->user()->id;
    //             $wallet->camp_id=$request->camp_id;
    //             $wallet->date=date('yy-m-d h:i:s');
    //             $wallet->description=$description;
    //             $wallet->amount=0-$request->amount;
    //             $wallet->operation='general charge';
    //             $wallet->save();

    //             $wallet_camp= new Wallet();
    //             $wallet_camp->user_id=auth()->user()->id;
    //             $wallet_camp->camp_id=$request->camp_id;
    //             $wallet_camp->date=date('yy-m-d h:i:s');
    //             $wallet_camp->description=$description;
    //             $wallet_camp->amount=$request->amount;
    //             $wallet_camp->operation='charge campaign with wallet';
    //             $wallet_camp->save();


    //             // camp wallet charge
    //             $camp->wallet=$request->amount;
    //             $camp->save();
    //             // end

    //             $transaction->payment_method='discharge';
    //         }else{
    //             $fee=Fee::first();
    //             $error="Your wallet amount is not enough. You should charge wallet.";


    //             $wallet_amount=Wallet::where('user_id',auth()->user()->id)->where('operation','general charge')->sum('amount');
    //             $notif=$this->notif;

    //             return view('backend.seller.create-campa.payment', compact('camp','fee','error','wallet_amount','notif'));
    //             // return redirect()->route('campaign-preview')->with('faild','Your wallet amount is not enough. You should charge wallet.');
    //         }
    //     }

    //     $msg='Payment successful!';
    //     $camp->permission="pending";
    //     // camp wallet charge
    //     $camp->wallet=$camp->wallet+$request->amount;
    //     // end
    //     $camp->save();


    //     $transaction->wallet_id=$wallet->id;
    //     $transaction->user_id=auth()->user()->id;
    //     $transaction->transaction_num=$this->generateTransactionNum();
    //     $transaction->date=date('yy-m-d h:i:s');
    //     $transaction->amount=$wallet->amount;
    //     $transaction->camp_id=$wallet->camp_id;
    //     $transaction->status='for campaign create';
    //     $transaction->save();

    //     $images=Camimage::where('cam_id',$camp->id)->get();

    //     $notif=$this->notif;


    //     return view('backend.seller.create-campa.camp_submit', compact('camp','images','msg','notif'));

    // }



    //pay campaign amount with general wallet
    public function stripePayment(Request $request){
        $camp=Campaign::Find($request->camp_id);
        $fee=Fee::first()->paypal_fee;
        $wallet= new Wallet();
        $transaction=new Transaction();

        $wallet_amount=Wallet::where('user_id',auth()->user()->id)->where('operation','general charge')->sum('amount');

        if($wallet_amount > $request->amount){
            $description='Pay for '.$camp->product_name.' with Wallet';

            $wallet->user_id=auth()->user()->id;
            $wallet->camp_id=$request->camp_id;
            $wallet->date=date('yy-m-d h:i:s');
            $wallet->description=$description;
            $wallet->amount=0-$request->amount;
            $wallet->operation='general charge';
            $wallet->save();

            // $wallet_camp= new Wallet();
            // $wallet_camp->user_id=auth()->user()->id;
            // $wallet_camp->camp_id=$request->camp_id;
            // $wallet_camp->date=date('yy-m-d h:i:s');
            // $wallet_camp->description=$description;
            // $wallet_camp->amount=$request->amount;
            // $wallet_camp->operation='charge campaign with wallet';
            // $wallet_camp->save();



            $transaction->payment_method='discharge';
        }else{
            $fee=Fee::first();
            $error="Your wallet amount is not enough. You should charge wallet.";


            $wallet_amount=Wallet::where('user_id',auth()->user()->id)->where('operation','general charge')->sum('amount');
            $notif=$this->notif;
            // Orders generate
            $api=$this->razor_api;
            $amount=round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates)*(100+$fee->paypal_fee));
            $receipt= random_int(1000, 9999);
            $order  = $api->order->create(array('receipt' => $receipt, 'amount' => $amount, 'currency' => 'INR')); // Creates order
            $order_id = $order['id']; // Get the created Order ID

            return view('backend.seller.create-campa.payment', compact('camp','fee','error','wallet_amount','notif','order_id','amount'));
        }

        $msg='Payment successful!';
        $camp->permission="pending";
        // camp wallet charge
        $camp->wallet=$camp->wallet+$request->amount;
        // end
        $camp->save();


        $transaction->wallet_id=$wallet->id;
        $transaction->user_id=auth()->user()->id;
        $transaction->transaction_num=$this->generateTransactionNum();
        $transaction->date=date('yy-m-d h:i:s');
        $transaction->amount=$wallet->amount;
        $transaction->camp_id=$wallet->camp_id;
        $transaction->status='for campaign create';
        $transaction->save();

        $images=Camimage::where('cam_id',$camp->id)->get();

        $notif=$this->notif;


        return view('backend.seller.create-campa.camp_submit', compact('camp','images','msg','notif'));
    }


    public function dopayment(Request $request) {
        try {
            $api=$this->razor_api;
            $orderId=$request->razorpay_order_id;
            $payment_id=$request->razorpay_payment_id;
            $sign_id=$request->razorpay_signature;

            $attributes  = array('razorpay_signature'  => $sign_id,  'razorpay_payment_id'  => $payment_id ,  'razorpay_order_id' => $orderId);

            $order = $api->utility->verifyPaymentSignature($attributes);
            $payment = $api->payment->fetch($payment_id);
            $card = $api->card->fetch($payment->card_id);
            $last_card=$card->last4;

            $description=$payment->description;

            $amount=$request->amount;

            $camp=Campaign::Find($request->camp_id);
            $fee=Fee::first()->paypal_fee;

            $wallet= new Wallet();
            $transaction=new Transaction();
            $wallet->user_id=auth()->user()->id;
            $wallet->camp_id=$request->camp_id;
            $wallet->date=date('yy-m-d h:i:s');
            $wallet->description=$description;

            $wallet->payment_method=$description.' **** **** ****'.$last_card;

            $wallet->amount=$amount;

            $wallet->fee_amount=round(($amount*$fee)/(100+$fee));
            $wallet->operation=$description;
            $wallet->save();

            $transaction->payment_method='charge';

            $msg='Payment successful!';
            $camp->permission="pending";
            // camp wallet charge
            $camp->wallet=$camp->wallet+$amount;
            // end
            $camp->save();

            $transaction->wallet_id=$wallet->id;
            $transaction->user_id=auth()->user()->id;
            $transaction->transaction_num=$this->generateTransactionNum();
            $transaction->date=date('yy-m-d h:i:s');
            $transaction->amount=$wallet->amount;
            $transaction->fee=$wallet->fee_amount;
            $transaction->camp_id=$wallet->camp_id;
            $transaction->status='for campaign create';
            $transaction->save();

            $images=Camimage::where('cam_id',$camp->id)->get();

            $notif=$this->notif;

            if (round(($amount*$fee)/(100+$fee)) > 0) {
                $admin_wallet= new Wallet();
                $admin_wallet->user_id=1;
                $admin_wallet->camp_id=$request->camp_id;
                $admin_wallet->date=date('yy-m-d h:i:s');
                $admin_wallet->description='Razorpay fees credited to admin general wallet for transaction done by seller before submitting Campaign';
                $admin_wallet->payment_method=$description.' **** **** ****'.$last_card;
                $admin_wallet->amount=round(($amount*$fee)/(100+$fee));
                $admin_wallet->operation='Razorpay fees credited to admin';
                $admin_wallet->save();
            }

            return view('backend.seller.create-campa.camp_submit', compact('camp','images','msg','notif'));

        } catch (Exception $e) {
            return redirect()->back()->with('status','Payment method is Failed.');
        }

    }


    public function campSubmit(Request $request){

        $camp=Campaign::Find($request->camp_id);

        $camp->permission="pending";

        $start_date =strtotime($camp->start_date);

        $today=strtotime(date('yy-m-d'));

        if($start_date > $today){
            $camp->permission="ready";
        }

        $camp->daily_count=0;

        $camp->count_time=date('yy-m-d');

        $camp->save();

        return redirect()->route('seller.campaigns');
    }




    public function campDelete($del_id){
        $campaign=Campaign::destroy($del_id);
        $wallet=Wallet::where('camp_id',$del_id)->where('operation','charge campaign with wallet')->delete();
        return redirect()->back()->with('status', 'Your campaign has been deleted.');
    }

    public function campCancel($camp_id){
        $camp=Campaign::Find($camp_id);
        $camp->permission='cancelled';

        $wallet=new Wallet();
        $wallet->user_id=auth()->user()->id;
        $wallet->camp_id=$camp_id;
        $wallet->date=date('yy-m-d h:i:s');
        $wallet->description='from cancelled campaign';
        $wallet->amount=$camp->wallet;
        $wallet->operation='general charge';
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

        $wallet_camp=new Wallet();
        $wallet_camp->user_id=auth()->user()->id;
        $wallet_camp->camp_id=$camp_id;
        $wallet_camp->date=date('yy-m-d h:i:s');
        $wallet_camp->description='from cancelled campaign';
        $wallet_camp->amount=0-$camp->wallet;
        $wallet_camp->operation='campaign cancell';
        $wallet_camp->save();

        $transaction_camp=new Transaction();
        $transaction_camp->payment_method='charge';
        $transaction_camp->wallet_id=$wallet_camp->id;
        $transaction_camp->user_id=auth()->user()->id;
        $transaction_camp->transaction_num=$this->generateTransactionNum();
        $transaction_camp->date=date('yy-m-d h:i:s');
        $transaction_camp->amount=$wallet_camp->amount;
        $transaction_camp->camp_id=$wallet_camp->camp_id;
        $transaction_camp->status='for wallet charge';
        $transaction_camp->save();


        $camp->wallet=0;
        $camp->save();

        return redirect()->back();
    }

    public function campEdit($edit_id){
        $camp=Campaign::FindOrFail($edit_id);
        $categories=Category::all();
        $markets=Marketplace::all();
        $notif=$this->notif;

        return view('backend.seller.create-campa.create-campaign', compact('camp','categories','markets','notif'));
    }

    //update_start
    public function updateCampaign(Request $request){
        $camp_id=$request->camp_id;
        $camp=Campaign::FindOrFail($camp_id);
        $camp->product_name=$request->product_name;
        $camp->description=$request->description;
        $camp->category=$request->category;
        $camp->marketplace=$request->marketplace;
        $camp->amazon_id=$request->amazon_id;
        $camp->brand_name=$request->brand_name;
        $camp->product_id=$request->product_id;


        $camp->save();
        $update_msg="Your campaign has been updated.";
        $notif=$this->notif;

        return view('backend.seller.create-campa.campaign-pictures', compact('camp','update_msg','notif'));
    }



    //Clone
    public function campClone($clone_id){
        $old_camp=Campaign::FindOrFail($clone_id);
        $camp=new Campaign();

        $camp->user_id=$old_camp->user_id;
        $camp->product_name=$old_camp->product_name;
        $camp->description=$old_camp->description;
        $camp->category=$old_camp->category;
        $camp->marketplace=$old_camp->marketplace;
        $camp->amazon_id=$old_camp->amazon_id;
        $camp->brand_name=$old_camp->brand_name;
        $camp->product_id=$old_camp->product_id;
        $camp->picture=$old_camp->picture;
        $camp->price=$old_camp->price;
        $camp->rebate_price=$old_camp->rebate_price;
        $camp->start_date=$old_camp->start_date;
        $camp->start_time=$old_camp->start_time;
        $camp->daily_rebates=$old_camp->daily_rebates;
        $camp->total_rebates=$old_camp->total_rebates;
        $camp->product_url=$old_camp->product_url;
        $camp->keyword1=$old_camp->keyword1;
        $camp->keyword2=$old_camp->keyword2;
        $camp->keyword3=$old_camp->keyword3;
        $camp->private_status=$old_camp->private_status;
        $camp->chrome_status=$old_camp->chrome_status;
        $camp->free_status=$old_camp->free_status;
        $camp->permission='incomplete';
        $camp->wallet=$old_camp->wallet;

        $camp->save();

        $categories=Category::all();
        $markets=Marketplace::all();
        $notif=$this->notif;

        return view('backend.seller.create-campa.create-campaign', compact('camp','categories','markets','notif'));
    }

    public function campComplete($com_id){
        $camp=Campaign::FindOrFail($com_id);
        $camp->permission='completed';
        $camp->complete_date=date('yy-m-d');
        $camp->save();
        return redirect()->back()->with('status', 'Your campaign has been completed.');
    }


    public function campForms($camp_id, $page){
        $camp=Campaign::Find($camp_id);
        $categories=Category::all();
        $markets=Marketplace::all();
        $images=Camimage::where('cam_id', $camp_id)->get();
        $msg="Your campaign settings have been saved.";
        $fee=Fee::first();
        $wallet_amount=Wallet::where('user_id',auth()->user()->id)->where('operation','general charge')->sum('amount');

        $page_name="";
        switch ($page) {
            case 'basics':
                $page_name="backend.seller.create-campa.create-campaign";
                break;
            case 'pic':
                $page_name="backend.seller.create-campa.campaign-pictures";
                break;
            case 'set':
                $page_name="backend.seller.create-campa.campaign-set";
                break;
            case 'preview':
                $page_name="backend.seller.create-campa.campaign-preview";
                break;
            case 'payment':
                $page_name="backend.seller.create-campa.payment";
                break;

            default:
                return redirect()->back();
                break;
        }
        $notif=$this->notif;

        // Orders generate
        $api=$this->razor_api;
        $amount=round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates)*(100+$fee->paypal_fee));
        $receipt= random_int(1000, 9999);
        $order  = $api->order->create(array('receipt' => $receipt, 'amount' => $amount, 'currency' => 'INR')); // Creates order
        $order_id = $order['id']; // Get the created Order ID

        return view($page_name,compact('camp','categories','markets','images','msg','fee','wallet_amount','notif', 'order_id','amount'));

    }

    public function summary($camp_id){

        $camp=Campaign::Find($camp_id);

        $total_rebate=Order::where('camp_id',$camp_id)->count();
        $app=Order::where('camp_id',$camp_id)->where('status','Approve')->count();
        $declined=Order::where('camp_id',$camp_id)->where('status','Declined')->count();

        $campChart=new CalcChart;
        $start_date=$camp->start_date;

        $label=[];
        $total_graph=[];
        $app_graph=[];
        $declined_graph=[];
        $start_g = date('Y-m-d',strtotime("-1 day", strtotime($start_date)));
        while ($start_g < $camp->complete_date) {
            $start_g = date('Y-m-d',strtotime("1 day", strtotime($start_g)));
            $label[]=$start_g;
            $total_g=Order::where('start_time', 'like' ,'%'.$start_g.'%')->where('camp_id',$camp_id)->count();
            $app_g=Order::where('start_time','like','%'.$start_g.'%')->where('camp_id',$camp_id)->where('status','Approve')->count();
            $declined_g=Order::where('start_time','like','%'.$start_g.'%')->where('camp_id',$camp_id)->where('status','Declined')->count();

            $total_graph[]=$total_g;
            $app_graph[]=$app_g;
            $declined_graph[]=$declined_g;
        }

        $campChart->labels($label);
        $campChart->dataset('Campaigns', 'line', $total_graph)
                ->color("#3333ff")
                ->backgroundcolor("#3333ff")
                ->fill(true)
                ->linetension(0.1)
                ->dashed([3]);

        $campChart->dataset('Campaigns', 'line', $app_graph)
                ->color("#99e600")
                ->backgroundcolor("#ccff66")
                ->fill(true)
                ->linetension(0.1)
                ->dashed([3]);

        $campChart->dataset('Campaigns', 'line', $declined_graph)
                ->color("#f4390b")
                ->backgroundcolor("#f77555")
                ->fill(true)
                ->linetension(0.1)
                ->dashed([3]);
        $notif=$this->notif;

        return view('backend.seller.camp-summary', compact('camp','total_rebate','app','declined','campChart','notif'));
    }

    public function rebates($status, $camp_id){
        $camp=Campaign::Find($camp_id);
        switch ($status) {
            case 'app':
                $rebates=Order::where('camp_id',$camp_id)->where('status','approved')->get();
                $count=Order::where('camp_id',$camp_id)->where('status','Approve')->count();
                break;
            case 'declined':
                $rebates=Order::where('camp_id',$camp_id)->where('status','Declined')->get();
                $count=Order::where('camp_id',$camp_id)->where('status','Declined')->count();
                break;

            default:
                $rebates=Order::where('camp_id',$camp_id)->get();
                $count=Order::where('camp_id',$camp_id)->count();
                break;
        }
        $notif=$this->notif;

        return view('backend.seller.rebate',compact('rebates','camp','count','notif'));
    }

    public function campWallet($camp_id){
        $camp=Campaign::Find($camp_id);
        $wallets=Wallet::where('camp_id',$camp_id)->get();
        $wallet_sum=Wallet::where('camp_id',$camp_id)->sum('amount');

        $notif=$this->notif;

        return view('backend.seller.camp-wallet',compact('camp','wallets','wallet_sum','notif'));
    }

    public function campLanding($camp_id){
        $camp=Campaign::Find($camp_id);
        if(Campaign::where('permission','online')->count() > 3){
            $camps=Campaign::where('permission','online')->get()->random(3);
        }
        $camps=Campaign::where('permission','online')->get();

        $notif=$this->notif;

        return view('backend.seller.camp-landing',compact('camp','camps','notif'));
    }
}
