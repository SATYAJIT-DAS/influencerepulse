<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Wallet;

class WalletController extends Controller
{
    public function index(){
        $role=auth()->user()->role->name;
        $user_id=auth()->user()->id;

        $wallets=Wallet::where('user_id',$user_id)->orderby('updated_at','DESC')->get();
        $wallet_sum=Wallet::where('user_id',$user_id)->sum('amount');

        return view('backend.buyer.wallet',compact('wallets', 'wallet_sum'));
    }
}
