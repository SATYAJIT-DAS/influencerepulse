<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Coupon;
use App\Model\Campaign;

class FavoritesController extends Controller
{
    public function index(){
        $role=auth()->user()->role->name;

        $camps=Campaign::where('permission', 'online')->where('favorite',1)->orderby('updated_at','DESC')->get();
        $coupons=Coupon::where('permission', 'online')->where('favorite',1)->orderby('updated_at','DESC')->get();

        return view('backend.buyer.favorites',compact('camps','coupons'));
    }
}

