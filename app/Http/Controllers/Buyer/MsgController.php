<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Message;
use App\Model\Order;
use App\Model\Campaign;

class MsgController extends Controller
{
    public function index(){
        $role=auth()->user()->role->name;
        $user_id=Auth()->user()->id;
        // $msgs=Message::where('')
        $msgs=Message::orderby('updated_at','DESC')->get();
        return view('backend.buyer.msg',compact('role', 'msgs'));
    }

    public function store(Request $request){
        $order_id=$request->order_id;
        // $request->validate([
        //     'pic_title' => 'required',
        //     'pic_path' => 'required|image'
        // ]);
        $camp_id=Order::Find($order_id)->camp_id;
        $to_user=Campaign::Find($camp_id)->user_id;


        $msg= new Message();
        $file = $request->file('attachment');
        if($file){
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('files'), $fileName);
            $file_title=$msg->order_id.$fileName;

            $msg->file_title=$file_title;
            $msg->file_path=$fileName;
        }
        $msg->to_user=$to_user;
        $msg->user_id=Auth()->user()->id;
        $msg->order_id=$order_id;
        $msg->date=date('yy-m-d h-m-d');
        $msg->message=$request->message;
        $msg->type=0;
        $msg->msg_status=0;
        $msg->save();
        return redirect()->route('buyer.msg');
    }

    public function msgRead(Request $request){
        $msgs=Message::where('type',1)->orwhere('type',2)->get();
        foreach ($msgs as $key => $msg) {
            $msg->msg_status=1;
            $msg->save();
        }
        return json_encode('success');
    }
}

