<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Order;
use App\Model\Message;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

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
    	$order_id=$request->order_id;
        $msg= new Message();

        $msg->order_id=$order_id;
        $msg->date=date('yy-m-d h-m-d');
        $msg->message=$request->message;
        if($request->msg_type == 'buyer'){
        	$msg->type=2;  //buyer
        }else{
        	$msg->type=3;  //seller
        }
        $msg->msg_status=0;
        $msg->save();

        return redirect()->back()->with('status','The message was sent successfully.');
    }

    public function disputeResolve($order_id, $status){
        $order=Order::Find($order_id);
        $order->status=$status;
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
