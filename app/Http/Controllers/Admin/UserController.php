<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;


use App\User;
use App\Model\Wallet;
use App\Model\Transaction;
use App\Model\Message;
use App\Model\Campaign;
use App\Model\Order;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use CountryState;
use DateTimeZone;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers=User::where('role_id',2)->get();
        $sellers=User::where('role_id',3)->get();
        return view('backend.admin.user_manage',compact('buyers','sellers'));
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
        $user=User::find($id);
        $user_type=$user->role_id;

        $msgs=Message::where('user_id',$id)->get();
        $camps=Campaign::where('user_id',$id)->get();
        if($user_type==2){  //buyer
            $orders=Order::where('buyer_id', $id)->get();
        }else{  //seller
            $orders=DB::table('orders')
                    ->select("*", "orders.status AS status","campaigns.product_name AS product_name","camimages.image_path AS image","users.name AS name")
                    ->join('campaigns','campaigns.id','=','orders.camp_id')
                    ->join('users','orders.buyer_id','=','users.id')
                    ->join('camimages','camimages.cam_id','=','campaigns.id')
                    ->where('campaigns.user_id',$id)
                    ->get();
        }
        $countries = CountryState::getCountries();
        $states = CountryState::getStates('AW');
        if($user->country){
            $states = CountryState::getStates($user->country);
        }
        $timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);


        $wallet_amount=Wallet::where('user_id',$id)->where('operation','general charge')->sum('amount');


        return view('backend.admin.user_info', 
            compact('user','countries','states','timezones','wallet_amount','camps','orders','msgs'));
    }

//     $query = DB::table('users');

// foreach($names as $name){
//     $query->orWhere('name', 'LIKE', $name.'%');
// }

// $result = $query->get();

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

    function generateTransactionNum(){
        $num=date('ymdhis');
        $num=$num.strval(random_int(1000, 9999));
        return $num;
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
        $user=User::Find($id);
        $user->name=$request->name;
        $user->brandname=$request->brandname;
        $user->address1=$request->address1;
        $user->address2=$request->address2;
        $user->zip_code=$request->zip_code;
        $user->country=$request->country;
        $user->state=$request->state_id;
        $user->city=$request->city;
        $user->time_zone=$request->timezone;
        $user->phone=$request->phone;
        $user->save();

        $wallet_amount=Wallet::where('user_id',$id)->where('operation','general charge')->sum('amount');
        $changed_amount=$request->wallet_amount-$wallet_amount;

        $wallet=new Wallet();
        $wallet->user_id=$id;
        $wallet->date=date('yy-m-d h:i:s');
        $wallet->description="Admin action";
        $wallet->operation='general charge';
        $wallet->amount=$changed_amount;
        $wallet->save();

        $transaction=new Transaction();
        $transaction->transaction_num=$this->generateTransactionNum();
        $transaction->amount=abs($changed_amount);
        $transaction->transaction_num=$changed_amount >0 ? 'charge':'discharge';
        $transaction->user_id=$id;
        $transaction->date=date('yy-m-d h:i:s');
        $transaction->wallet_id=$wallet->id;
        $transaction->status='Admin action';
        $transaction->save();

        return redirect()->back()->with('status','User profile has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }

    public function suspend($id){
        $user=User::find($id);
        $user->status="suspended";
        $user->save();
        return redirect()->route('users.index');
    }

    public function userSearch(Request $request){
        $username=$request->search;
        $buyers=User::where('role_id',2)->where('name','like','%'.$username.'%')->get();
        $sellers=User::where('role_id',3)->where('name','like','%'.$username.'%')->get();
        return view('backend.admin.user_manage',compact('buyers','sellers','username'));

    }

    public function export(){
        $users=new UsersExport();
        $file_name='Users Email and Phone.xlsx';
        return Excel::download($users, $file_name);
    }
}
