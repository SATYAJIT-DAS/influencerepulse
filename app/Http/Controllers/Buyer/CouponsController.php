<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Category;
use App\Model\Coupon;
use App\Model\Campaign;

class CouponsController extends Controller
{
    public function index(){
        $role=auth()->user()->role->name;

        $categories=Category::all();

        $camps=Campaign::where('permission', 'online')->orderby('updated_at','DESC')->get();
        $coupons=Coupon::where('permission', 'online')->orderby('updated_at','DESC')->get();

        
        return view('backend.buyer.coupons',compact('role', 'camps','categories','coupons'));
    }
}
