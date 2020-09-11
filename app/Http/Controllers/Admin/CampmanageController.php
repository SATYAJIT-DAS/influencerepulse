<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Campaign;
use App\Model\Category;
use App\Model\Marketplace;
use App\Model\Order;
use App\Model\Wallet;
use App\Model\Transaction;

class CampmanageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns= Campaign::orderby('updated_at','DESC')->get();

        $all=Campaign::count();

        $online=Campaign::where('permission','online')->count();
        $offline=Campaign::where('permission','offline')->count();
        $ready=Campaign::where('permission','ready')->count();
        $pending=Campaign::where('permission','pending')->count();
        $incomplete=Campaign::where('permission','incomplete')->count();
        $completed=Campaign::where('permission','completed')->count();
        $cancelled=Campaign::where('permission','cancelled')->count();


        return view("backend.admin.campaigns", compact('campaigns','online','all','offline','ready','pending','incomplete','completed','cancelled'));
    }

    function generateTransactionNum(){
        $num=date('ymdhis');
        $num=$num.strval(random_int(1000, 9999));
        return $num;
    }

    public function changeState($id, $state){
        $camp = Campaign::FindOrFail($id);
        $camp->permission=$state;
        if($state == 'cancelled'){
            $camp=Campaign::Find($id);
            $camp->permission='cancelled';
            $user_id=$camp->user_id;

            $wallet=new Wallet();
            $wallet->user_id=$user_id;
            $wallet->camp_id=$id;
            $wallet->date=date('yy-m-d h:i:s');
            $wallet->description='from cancelled campaign';
            $wallet->amount=$camp->wallet;
            $wallet->operation='general charge';
            $wallet->save();

            $transaction=new Transaction();
            $transaction->payment_method='charge';
            $transaction->wallet_id=$wallet->id;
            $transaction->user_id=$user_id;
            $transaction->transaction_num=$this->generateTransactionNum();
            $transaction->date=date('yy-m-d h:i:s');
            $transaction->amount=$wallet->amount;
            $transaction->camp_id=$wallet->camp_id;
            $transaction->status='for wallet charge';
            $transaction->save();

            $wallet_camp=new Wallet();
            $wallet_camp->user_id=$user_id;
            $wallet_camp->camp_id=$id;
            $wallet_camp->date=date('yy-m-d h:i:s');
            $wallet_camp->description='from cancelled campaign';
            $wallet_camp->amount=0-$camp->wallet;
            $wallet_camp->operation='campaign cancell';
            $wallet_camp->save();

            $transaction_camp=new Transaction();
            $transaction_camp->payment_method='charge';
            $transaction_camp->wallet_id=$wallet_camp->id;
            $transaction_camp->user_id=$user_id;
            $transaction_camp->transaction_num=$this->generateTransactionNum();
            $transaction_camp->date=date('yy-m-d h:i:s');
            $transaction_camp->amount=$wallet_camp->amount;
            $transaction_camp->camp_id=$wallet_camp->camp_id;
            $transaction_camp->status='for wallet charge';
            $transaction_camp->save();


            $camp->wallet=0;
        }
        $camp->save();
        return redirect()->route('camp_manage.index')->with('status','Campaign status is '.$state);
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
        $camp=Campaign::FindOrFail($id);
        $categories=Category::all();
        $markets=Marketplace::all();
        return view('backend.admin.camp_info', compact('camp','categories','markets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camp=Campaign::Find($id);
        return view('backend.admin.campaign-set',compact('camp'));
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

        $camp=Campaign::FindOrFail($id);
        // $camp=$request->all();
        $camp->product_name=$request->product_name;
        $camp->description=$request->description;
        $camp->category=$request->category;
        $camp->marketplace=$request->marketplace;
        $camp->permission=$request->permission;
        $camp->brand_name=$request->brand_name;
        $camp->amazon_id=$request->amazon_id;

        $camp->price=$request->price;
        $camp->rebate_price=$request->rebate_price;
        $camp->start_date=$request->start_date;
        $camp->start_time=$request->start_time;
        $camp->daily_rebates=$request->daily_rebates;
        $camp->total_rebates=$request->total_rebates;
        $camp->product_url=$request->product_url;
        $camp->keyword1=$request->keyword1;
        $camp->keyword2=$request->keyword2;
        $camp->keyword3=$request->keyword3;
        $camp->private_status=$request->private_status;
        $camp->free_status=$request->free_status;

        $camp->save();
        return redirect()->route('camp_manage.index')->with('status','The campaign has been updated.');
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

    public function orders($status, $camp_id){
        $camp=Campaign::Find($camp_id);
        switch ($status) {
            case 'app':
                $rebates=Order::where('camp_id',$camp_id)->where('status','approved')->get();
                $count=Order::where('camp_id',$camp_id)->where('status','Approve')->count();
                break;
            case 'declined':
                $rebates=Order::where('camp_id',$camp_id)->where('status','Declined')->get();
                $count=Order::where('camp_id',$camp_id)->where('status','Declined')->count();
                break;

            default:
                $rebates=Order::where('camp_id',$camp_id)->get();
                $count=Order::where('camp_id',$camp_id)->count();
                break;
        }
        return view('backend.admin.camp-orders',compact('rebates','camp','count'));
    }
}
