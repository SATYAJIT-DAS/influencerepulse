<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
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

        return view('backend.seller.faq',compact('role','notif'));
    }
}
