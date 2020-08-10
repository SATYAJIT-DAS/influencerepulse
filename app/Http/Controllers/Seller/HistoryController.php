<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Model\Wallet;
use App\Model\Order;
use App\Model\Campaign;
use App\Model\Fee;

class HistoryController extends Controller
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
        $notif=$this->notif;

        $total_charge=Wallet::where('user_id', auth()->user()->id)->where('operation','<>','discharge')->sum('amount');
        $total_refund=Wallet::where('user_id', auth()->user()->id)->where('operation','discharge')->sum('amount');

        $camps_amount=Campaign::where('user_id', auth()->user()->id)->sum('wallet');
      
        $wallet_amount=Wallet::where('user_id', auth()->user()->id)->where('operation','general charge')->sum('amount');

        $deal_amount=DB::table('orders')
                    ->select('campaigns.price')
                    ->join('campaigns','campaigns.id','=','orders.camp_id')
                    ->where('campaigns.user_id',auth()->user()->id)
                    ->sum('price');
        $camp_amount=$deal_amount+$camps_amount;

        return view('backend.seller.history',compact('role','notif', 'total_charge', 'total_refund', 'camp_amount', 'wallet_amount', 'deal_amount'));
    }
    
}
