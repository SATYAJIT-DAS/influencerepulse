<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Model\Campaign;
use App\Model\Order;
use App\User;
use App\Model\Service;
use App\Model\Coupon;

use App\Charts\CalcChart;
use App\Model\Fee;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mail_verify=auth()->user()->mail_verify; 

        $camps=Campaign::all()->count();
        $coupons=Coupon::all()->count();
        $orders=Order::all()->count();
        
        $buyers=User::where('role_id',2)->count();
        $sellers=User::where('role_id',3)->count();
        $services=Service::where('status','unread')->count();
        $disputes=Order::where('status','disputed')->count();
        $uncamps=Campaign::where('permission','pending')->count();

        $buyerChart=new CalcChart;
        $today=date('yy-m-d');

        $label=[];
        $buyer_graph=[];

        for ($i=28; $i >-2 ; $i--) { 
            $d = strtotime(-$i." Days");
            $date=date("Y-m-d", $d);
            $label[]=date('m-d', strtotime($date));
            // $label[]=date('F j', strtotime($date));
            $buy=User::where('created_at','<=',$date)->where('role_id',2)->count();
            $buyer_graph[]=$buy; 
        }

        $buyerChart->labels($label);
        $buyerChart->dataset('Buyers', 'line', $buyer_graph)
                ->color("blue")
                ->backgroundcolor("#6cb2eb")
                ->fill(true)
                ->linetension(0.1)
                ->dashed([3]);


        $sellerChart=new CalcChart;
        $today=date('yy-m-d');

        $label=[];
        $seller_graph=[];

        for ($i=28; $i >-2 ; $i--) { 
            $d = strtotime(-$i." Days");
            $date=date("Y-m-d", $d);
            $label[]=date('m-d', strtotime($date));
            $seller=User::where('created_at','<=',$date)->where('role_id',3)->count();
            $seller_graph[]=$seller; 
        }

        $sellerChart->labels($label);
        $sellerChart->dataset('Sellers', 'line', $seller_graph)
                ->color("blue")
                ->backgroundcolor("#6cb2eb")
                ->fill(true)
                ->linetension(0.1)
                ->dashed([3]);


        $campChart=new CalcChart;
        $today=date('yy-m-d');

        $label=[];
        $camp_graph=[];

        for ($i=28; $i >-2 ; $i--) { 
            $d = strtotime(-$i." Days");
            $date=date("Y-m-d", $d);
            $label[]=date('m-d', strtotime($date));
            $buy=Campaign::where('created_at','<=',$date)->count();
            $camp_graph[]=$buy; 
        }

        $campChart->labels($label);
        $campChart->dataset('Campaigns', 'line', $camp_graph)
                ->color("blue")
                ->backgroundcolor("#6cb2eb")
                ->fill(true)
                ->linetension(0.1)
                ->dashed([3]);


        $couponChart=new CalcChart;
        $today=date('yy-m-d');

        $label=[];
        $coupon_graph=[];

        for ($i=28; $i >-2 ; $i--) { 
            $d = strtotime(-$i." Days");
            $date=date("Y-m-d", $d);
            $label[]=date('m-d', strtotime($date));
            $coupon=Coupon::where('created_at','<=',$date)->count();
            $coupon_graph[]=$coupon; 
        }

        $couponChart->labels($label);
        $couponChart->dataset('Coupons', 'line', $coupon_graph)
                ->color("blue")
                ->backgroundcolor("#6cb2eb")
                ->fill(true)
                ->linetension(0.1)
                ->dashed([3]);




        $fee=Fee::all()->first();

        

        return view('backend.admin.dashboard', 
        compact('mail_verify','camps','coupons','orders','buyers','sellers','services','disputes','uncamps','sellerChart','buyerChart','campChart','couponChart','fee'));
    }

    public function site_clear(Request $request){
        $user_id=auth()->user()->id;
        $user=User::Find($user_id);
        if(Hash::check($request->password, $user->password) == false){
           return redirect()->back()->with('faild','Admin password is not correct.');
        }

        Campaign::query()->delete();
        Order::query()->delete();
        Message::query()->delete();
        Wallet::query()->delete();
        Transaction::query()->delete();

        return redirect()->back()->with('status','Site was reset!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
