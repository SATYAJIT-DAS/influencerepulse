<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Model\Message;
use App\Model\Order;
use Illuminate\Support\Facades\DB;

class MsgController extends Controller
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
            $notif_order = DB::table('orders')
                ->join('campaigns', 'campaigns.id', '=', 'orders.camp_id')
                ->where('campaigns.user_id', $user_id)
                ->where('status', 'pre_approved')
                ->count();
            $this->notif = $notif_order;
            return $next($request);
        });
    }

    public function index()
    {
        $role = auth()->user()->role->name;

        $msgs = Message::orderby('updated_at', 'DESC')->get();
        $notif = $this->notif;

        return view('backend.seller.msg', compact('msgs', 'notif'));
    }

    public function store(Request $request)
    {
        $order_id = $request->order_id;
        // $request->validate([
        //     'pic_title' => 'required',
        //     'pic_path' => 'required|image'
        // ]);

        $to_user = Order::Find($order_id)->buyer_id;

        $msg = new Message();

        $file = $request->file('attachment');
        if ($file) {
            $file_path = $file->store('public/files');
            $file_title = $msg->order_id . $file->getClientOriginalName();
            $msg->file_title = $file_title;
            $msg->file_path = $file_path;
        }
        $msg->to_user = $to_user;
        $msg->user_id = Auth()->user()->id;
        $msg->order_id = $order_id;
        $msg->date = date('yy-m-d h-m-d');
        $msg->message = $request->message;
        $msg->type = 1;
        $msg->msg_status = 0;
        $msg->save();

        return redirect()->route('seller.msg');
    }

    public function discussion($order_id)
    {
        $order = Order::Find($order_id);
        $msgs = Message::where('order_id', $order_id)->get();
        $notif = $this->notif;


        return view('backend.seller.discussion', compact('order', 'msgs', 'notif'));
    }

    public function msgRead(Request $request)
    {
        $msgs = Message::where('type', 0)->orwhere('type', 3)->get();
        foreach ($msgs as $key => $msg) {
            $msg->msg_status = 1;
            $msg->save();
        }
        return json_encode('success');
    }
}
