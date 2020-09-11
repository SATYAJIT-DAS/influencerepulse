<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Wallet;

class WalletController extends Controller
{
    public function index(){
    	$wallets=Wallet::where('user_id',1)->orderby('updated_at','DESC')->get();
    	$wallet_sum=Wallet::where('user_id',1)->sum('amount');
    	return view('backend.admin.wallet', compact('wallets', 'wallet_sum'));
    }
}
