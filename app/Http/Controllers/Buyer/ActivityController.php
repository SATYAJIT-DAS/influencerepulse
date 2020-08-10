<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Order;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index(){

        $role=auth()->user()->role->name;

        $buyer_id=auth()->user()->id;
        $orders=Order::where('buyer_id',$buyer_id)->where('status','Waiting for purchase')
            ->orwhere('status','Expired')
            ->orderby('updated_at','ASC')->get();
        $activety="activety";
        $current=date('yy-m-d h:i:s');
        $purcha_count=Order::where('buyer_id',$buyer_id)->where('status','Waiting for purchase')->count();
        $dispute_count=Order::where('buyer_id',$buyer_id)->where('status','disputes')->count();
        $msg_count=DB::select("
            SELECT messages.order_id
            FROM messages
            LEFT JOIN orders ON orders.id=messages.order_id
            WHERE orders.buyer_id=:id",['id' => $buyer_id]);
        // return view('backend.buyer.activity',compact('role','orders','activety'));
        return view('backend.buyer.confirm_redirect',compact('role','orders','activety','current','purcha_count','dispute_count','msg_count'));
    }
}
