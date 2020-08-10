<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Coupon;
use App\Model\Category;
use App\Model\Marketplace;

class CouponmanageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=Coupon::paginate(6);
        return view('backend.admin.coupon_manage', compact('coupons'));
    }


    public function changeState($id, $state){
        $coupon = Coupon::FindOrFail($id);
        $coupon->permission=$state;
        $coupon->save();
        return redirect()->route('coupon_manage.index')->with('status','Coupon status is '.$state);
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

        $coupon=Coupon::FindOrFail($id);
        $categories=Category::all();
        $markets=Marketplace::all();
        return view('backend.admin.coupon_info', compact('coupon','categories','markets'));

        

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
        $coupon=Coupon::FindOrFail($id);

        $coupon->market_place=$request->market_place;
        $coupon->product_id=$request->product_id;
        $coupon->product_name=$request->product_name;
        $coupon->description=$request->description;
        $coupon->category=$request->category;
        $coupon->brand_name=$request->brand_name;

        $coupon->permission=$request->permission;


        $coupon->price=$request->price;
        $coupon->off_per=$request->off_per;
        $coupon->coupon_code=$request->coupon_code;
        $coupon->start_date=$request->start_date;
        $coupon->end_date=$request->end_date;
        $coupon->product_url=$request->product_url;
        $coupon->keyword1=$request->keyword1;
        $coupon->keyword2=$request->keyword2;
        $coupon->keyword3=$request->keyword3;
        $coupon->free_status=$request->free_status;
        $coupon->save();

        return redirect()->route('coupon_manage.index')->with('status','The coupon has been updated.');

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
