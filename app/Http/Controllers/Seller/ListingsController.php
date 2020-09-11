<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Campaign;
use App\Model\Category;
use App\Model\Marketplace;
use App\Model\Coupon;
use App\Model\Couponimage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ListingsController extends Controller
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
        $user_id=auth()->user()->id;
        $coupons=Coupon::where('user_id',$user_id)->get();

        $online=Coupon::where('permission','online')->where('user_id', $user_id)->count();
        $all=Coupon::where('user_id', $user_id)->count();
        $offline=Coupon::where('permission','offline')->where('user_id', $user_id)->count();
        $ready=Coupon::where('permission','ready')->where('user_id', $user_id)->count();
        $pending=Coupon::where('permission','Pending approval')->where('user_id', $user_id)->count();
        $incomplete=Coupon::where('permission','incomplete')->where('user_id', $user_id)->count();
        $completed=Coupon::where('permission','completed')->where('user_id', $user_id)->count();
        $cancelled=Coupon::where('permission','cancelled')->where('user_id', $user_id)->count();

        $notif=$this->notif;
        
        return view('backend.seller.listings',
        compact('role','coupons','online','all','offline','ready','pending','incomplete','completed','cancelled','notif'));
    }

    public function couponDelete($del_id){
        $coupon=Coupon::destroy($del_id);
        return redirect()->back()->with('status', 'Your campaign has been deleted.');
    }

    public function couponEdit($edit_id){
        $coupon=Coupon::FindOrFail($edit_id);
        $categories=Category::all();
        $markets=Marketplace::all();
        $notif=$this->notif;

        return view('backend.seller.create-coupon.basic', compact('coupon','categories','markets','notif'));
    }

    public function updateCoupon(Request $request){
        $coupon_id=$request->coupon_id;
        $coupon=Coupon::FindOrFail($coupon_id);
        $coupon->save();
        $msg="Your coupon has been updated.";
        $notif=$this->notif;

        return view('backend.seller.create-coupon.pic', compact('coupon','msg','notif'));
    }

    public function createCoupon(){
        $categories=Category::all();
        $markets=Marketplace::all();
        $notif=$this->notif;

        return view('backend.seller.create-coupon.basic', compact('categories','markets','notif'));
    }

    public function basicCoupon(Request $request){
        $coupon=new Coupon($request->all());
        $coupon->favorite=0;
        $coupon->permission="incomplete";
        $coupon->save();
        $msg="Your coupon has been created, please verify everything is fine below.";
        $notif=$this->notif;

        return view('backend.seller.create-coupon.pic', compact('coupon','msg','notif'));
    }

    public function picCoupon(Request $request){

        $coupon=Coupon::FindOrFail($request->coupon_id);
        $notif=$this->notif;

        return view('backend.seller.create-coupon.set', compact('coupon','notif'));
    }

    public function setCoupon(Request $request){
        $coupon=Coupon::FindOrFail($request->coupon_id);
        
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

        $images=Couponimage::where('coupon_id', $coupon->id)->get();
        $msg="Your coupon settings have been saved.";
        $notif=$this->notif;

        return view('backend.seller.create-coupon.preview', compact('coupon','images','msg','notif'));
    }

    public function previewCoupon(Request $request){
        $coupon=Coupon::FindOrFail($request->coupon_id);
        $images=Couponimage::where('coupon_id', $coupon->id)->get();
        $notif=$this->notif;

        return view('backend.seller.create-coupon.submit',compact('coupon', 'images','notif'));
    }

    public function submitCoupon(Request $request){
        $coupon=Coupon::FindOrFail($request->coupon_id);


        $start_date =strtotime($coupon->start_date);

        $coupon->permission="Pending approval";
        $coupon->save();
        return redirect()->route('seller.listings')->with("status","Your coupon will be reviewed by our team soon.");
    }

    //pic setting

    public function picStore(Request $request, $coupon_id){
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);        
        
        $coupon_image = new Couponimage();
        $coupon_image->coupon_id=$coupon_id;
        $coupon_image->image_path = $imageName;
        $coupon_image->save();

        $images=Couponimage::where('coupon_id',$coupon_id)->get();


        return response()->json(['success'=>$images, 'message' => 'Your campaign has been updated.']);
    }

    public function couponpicDestroy(Request $request){
        $filename =  $request->get('filename');
        Couponimage::where('image_path',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

    public function couponPicDelete(Request $request){
        $del_id=$request->del_id;
        Couponimage::destroy($del_id);
        
        $coupon_id=$request->coupon_id;
        $images=Couponimage::where('coupon_id',$coupon_id)->get();
        return response()->json(['success'=>$images, 'message' => 'Your campaign has been deleted.']);
    }

    //clone

    public function couponClone($clone_id){
        $coupon=Coupon::FindOrFail($clone_id);
        $new_coupon=new Coupon();

        $new_coupon->user_id=$coupon->user_id;
        $new_coupon->market_place=$coupon->market_place;
        $new_coupon->product_id=$coupon->product_id;
        $new_coupon->product_name=$coupon->product_name;
        $new_coupon->description=$coupon->description;
        $new_coupon->category=$coupon->category;
        $new_coupon->brand_name=$coupon->brand_name;
        $new_coupon->picture=$coupon->picture;
        $new_coupon->price=$coupon->price;
        $new_coupon->off_per=$coupon->off_per;
        $new_coupon->coupon_code=$coupon->coupon_code;
        $new_coupon->start_date=$coupon->start_date;
        $new_coupon->end_date=$coupon->end_date;
        $new_coupon->product_url=$coupon->product_url;
        $new_coupon->keyword1=$coupon->keyword1;
        $new_coupon->keyword2=$coupon->keyword2;
        $new_coupon->keyword3=$coupon->keyword3;
        $new_coupon->free_status=$coupon->free_status;
        $new_coupon->upload_status=$coupon->upload_status;
        $new_coupon->permission=$coupon->permission;
        $new_coupon->save();

        $categories=Category::all();
        $markets=Marketplace::all();
        $notif=$this->notif;

        
        return view('backend.seller.create-coupon.basic', compact('new_coupon','categories','markets','notif'));
    }

    public function couponComplete($com_id){
        $coupon=Coupon::FindOrFail($com_id);
        $coupon->permission='completed';
        $coupon->save();
        return redirect()->back()->with('status', 'Your campaign has been completed.');
    }
}
