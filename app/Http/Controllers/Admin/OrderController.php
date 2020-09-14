<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

 use App\Model\Order;
 use App\Model\Message;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


use App\Model\Campaign;
use App\Model\Wallet;
use App\Model\Transaction;
use App\Model\Fee;
use App\Model\Service;
use App\User;

class OrderController extends Controller
{
    public function index(){
        $preapps=Order::where('status','pre_approved')->orderby('updated_at','DESC')->get();
    	$apps=Order::where('status','approved')->orderby('updated_at','DESC')->get();
        $paidouts=Order::where('status','paidout')->orderby('updated_at','DESC')->get();
    	$disputes=Order::where('status', 'disputed')->orderby('updated_at','DESC')->get();

        $declines=Order::where('status', 'Declined')->orderby('updated_at','DESC')->get();

        $paid_com=Order::where('status', 'paid completed')->orderby('updated_at','DESC')->get();
        $cancelled=Order::where('status', 'Cancelled')->orwhere('status', 'Expired')->orderby('updated_at','DESC')->get();

        $resolves=Order::where('status','vic_buyer')
            ->orwhere('status','vic_seller')
            ->orderby('updated_at','DESC')
            ->get();
    	return view('backend.admin.order_manage',
            compact('preapps','declines','apps','paid_com','paidouts','disputes','resolves','cancelled'));
    }

    public function disputeManage(Request $request){
    	$order_id=$request->msg_order_id;
    	$to_user =$request->msg_to_user;
    	//($to_user);
        $msg= new Message();
        $msg->to_user=$to_user;
        $msg->user_id =1;
        $msg->order_id=$order_id;
        $msg->date=date('yy-m-d h-m-d');
        $msg->message=$request->message;
        if($request->msg_type == 'buyer'){
        	$msg->type=2;  //buyer
        }else{
        	$msg->type=3;  //seller
        }
        $msg->msg_status = 0;
        $msg->save();

        return redirect()->back()->with('status','The message was sent successfully.');
    }
 function generateTransactionNum()
    {
        $num = date('ymdhis');
        $num = $num . strval(random_int(1000, 9999));
        return $num;
    }
    public function disputeResolve($order_id, $status){
        $rebate_fee = Fee::first()->rebate_fee;
        $order=Order::Find($order_id);
         $order->status = $status;
        if ($status == 'vic_seller') {
            $camp = Campaign::find($order->camp_id);
            
            $order->approved_date = date('yy-m-d h:i:s');

            $seller = User::Find($camp->user_id);

            $wallet_seller = new Wallet();
            
            $wallet_seller->amount =  $camp->price_rebate_price + $rebate_fee;
            $wallet_seller->user_id = $seller->id;
            $wallet_seller->camp_id = $camp->id;
            $wallet_seller->order_id = $order_id;
            $wallet_seller->date = date('yy-m-d h:i:s');
            $wallet_seller->description = 'Win the Dispute';
            $wallet_seller->operation = 'Return in wallet';
            $wallet_seller->save();
            

            $transaction = new Transaction();
            
            $transaction->wallet_id = $wallet_seller->id;
            $transaction->order_id = $order_id;
            $transaction->user_id = $camp->user_id;
            $transaction->transaction_num = $this->generateTransactionNum();
            $transaction->amount = $camp->price_rebate_price;
            $transaction->date = date('yy-m-d h:i:s');
            $transaction->payment_method = 'Win the Dispute';
            $transaction->fee = 0;
            $transaction->status = $status;
            $transaction->camp_id = $camp->id;
            $transaction->save();

            $wallet_admin = new Wallet();
            
            $wallet_admin->amount = 0 - ($camp->price_rebate_price+ $rebate_fee);
            $wallet_admin->user_id = 1;
            $wallet_admin->camp_id = $camp->id;
            $wallet_admin->date = date('yy-m-d h:i:s');
            $wallet_admin->order_id = $order_id;
            $wallet_admin->description = 'pay for approved';
            $wallet_seller->operation = 'Return in Seller wallet';
            $wallet_admin->save();
        }
        else if ($status == 'vic_buyer') {
            $camp = Campaign::find($order->camp_id);
            
            $order->approved_date = date('yy-m-d h:i:s');

            $buyer = User::Find($order->buyer_id);

            $wallet_buyer = new Wallet();
            
            $wallet_buyer->amount =  $camp->price_rebate_price;
            $wallet_buyer->user_id = $buyer->id;
            $wallet_buyer->camp_id = $camp->id;
            $wallet_buyer->order_id = $order_id;
            $wallet_buyer->date = date('yy-m-d h:i:s');
            $wallet_buyer->description = 'Win the Dispute';
            $wallet_buyer->operation = 'Return in wallet';
            $wallet_buyer->save();
            

            $transaction = new Transaction();
            
            $transaction->wallet_id = $wallet_buyer->id;
            $transaction->order_id = $order_id;
            $transaction->user_id = $camp->user_id;
            $transaction->transaction_num = $this->generateTransactionNum();
            $transaction->amount = $camp->price_rebate_price;
            $transaction->date = date('yy-m-d h:i:s');
            $transaction->payment_method = 'Win the Dispute';
            $transaction->fee = 0;
            $transaction->status = $status;
            $transaction->camp_id = $camp->id;
            $transaction->save();

            $wallet_admin = new Wallet();
            
            $wallet_admin->amount = 0 - ($camp->price_rebate_price);
            $wallet_admin->user_id = 1;
            $wallet_admin->camp_id = $camp->id;
            $wallet_admin->date = date('yy-m-d h:i:s');
            $wallet_admin->order_id = $order_id;
            $wallet_admin->description = 'pay for approved';
            $wallet_buyer->operation = 'Return in Buyer  wallet';
           // dd($wallet_admin);
            $wallet_admin->save();
        }
        
        $order->save();

        return redirect()->back()->with('status', 'The dispute was resolved.');
    }

    public function orderSearch(Request $request){
        $search=$request->search;
        $tab=$request->tab_name;

        $preapps=Order::where('status','pre_approved')
                ->where('order_id','like','%'.$search.'%')
                ->orderby('updated_at','DESC')
                ->get();

        $apps=Order::where('status','approved')->where('order_id','like','%'.$search.'%')->orderby('updated_at','DESC')->get();
        $disputes=Order::where('status', 'disputed')->where('order_id','like','%'.$search.'%')->orderby('updated_at','DESC')->get();

        $paidouts=Order::where('status','paidout')->where('order_id','like','%'.$search.'%')->orderby('updated_at','DESC')->get();

        $paid_com=Order::where('status', 'paid completed')->where('order_id','like','%'.$search.'%')->orderby('updated_at','DESC')->get();

        $declines=Order::where('status', 'Declined')->where('order_id','like','%'.$search.'%')->orderby('updated_at','DESC')->get();


        $resolves=Order::where('status','vic_buyer')
            ->where('order_id','like','%'.$search.'%')
            ->orwhere('status','vic_seller')
            ->orderby('updated_at','DESC')
            ->get();
            
        return view('backend.admin.order_manage',compact('preapps','declines','apps','paidouts','paid_com','disputes','resolves', 'search', 'tab'));
    }

    public function orderShow($user_id){
        $orders=Order::where('buyer_id', $user_id)->get();

        return view('backend.admin.user-order', compact('orders'));
    }

    public function timeDelay(Request $request){
        $left_time=$request->left_time;  //1h, 2h ...5h
        $order=Order::Find($request->order_id);

        $order->status='Waiting for purchase';
        //get new start time 
        $current=date('yy-m-d h:i:s');
        $new_time=strtotime($current)+($left_time-1)*3600;
        $new_time=date('yy-m-d h:i:s',$new_time);
        $order->start_time=$new_time;
        $order->save();
        return redirect()->back()->with('status','The remaining time is '.$left_time.'h');
    }

}
