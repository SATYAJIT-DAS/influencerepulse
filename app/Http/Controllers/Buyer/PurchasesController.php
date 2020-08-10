<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Order;
use App\Model\Message;

class PurchasesController extends Controller
{
    public function index(){
        $role=auth()->user()->role->name;

        $buyer_id=auth()->user()->id;

        $orders=Order::where('buyer_id', $buyer_id)->orderby('updated_at','DESC')->get();
        $current=date('yy-m-d h:i:s');
        foreach ($orders as $key => $order) {

            
            $left_time=strtotime($current)-strtotime($order->start_time);
            $left_time=3599-$left_time;

            if($left_time <=0 && $order->status == 'Waiting for purchase'){
                $order->status='Expired';
                $order->save();
            }
        }

        $unclaimed=Order::where('status','Waiting for purchase')->where('buyer_id', $buyer_id)->count();
        $pre_approved=Order::where('status','pre_approved')->where('buyer_id', $buyer_id)->count();
        $approved=Order::where('status','approved')->where('buyer_id', $buyer_id)->count();
        $disputes=Order::where('status','disputed')->where('buyer_id', $buyer_id)->count();
        $payout=Order::where('status','paidout')->where('buyer_id', $buyer_id)->count();
        $paid_com=Order::where('status', 'paid completed')->where('buyer_id', $buyer_id)->count();
        $declined=Order::where('status','declined')->where('buyer_id', $buyer_id)->count();
        $cancelled=Order::where('status','Expired')->orwhere('status','Cancelled')->where('buyer_id', $buyer_id)->count();

        $resolves=Order::where('buyer_id', $buyer_id)->where('status','vic_buyer')
            ->orwhere('status','vic_seller')
            ->get();


        return view('backend.buyer.purchases',compact('orders', 'unclaimed',
        'pre_approved', 'approved','disputes', 'payout','declined', 'cancelled','resolves','current','paid_com'));
    }
    public function Discussion($order_id){
        $order=Order::Find($order_id);
        $msgs=Message::where('order_id',$order_id)->get();

        return view('backend.buyer.discussion', compact('order','msgs'));
    }

    public function dispute(Request $request){
        $order=Order::Find($request->order_id);
        $order->status="disputed";
        $order->disputed_date=date('yy-m-d h:i:s');
        $order->dis_reason=$request->reason;
        $order->save();
        return redirect()->route('buyer.purchases')->with('status','Order status is dispute.');
    }

}
