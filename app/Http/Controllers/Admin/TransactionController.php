<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Transaction;
use App\Model\Order;
use App\Model\Campaign;
use App\Model\Wallet;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions=Transaction::orderby('updated_at','DESC')->get();
        return view('backend.admin.transaction-history', compact('transactions'));
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

    function generateTransactionNum(){
        $num=date('ymdhis');
        $num=$num.strval(random_int(1000, 9999));
        return $num;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        $camp_id=Order::Find($request->order_id)->camp_id;
        $order=Order::Find($request->order_id);
        $order->status="paid completed";
        $order->save();

        $wallet=new Wallet();
        $wallet->user_id=Order::Find($request->order_id)->buyer_id;
        $wallet->camp_id=$camp_id;
        $wallet->order_id=$request->order_id;
        $wallet->date=date('yy-m-d h:i:s');
        $wallet->description='Pay for Approved';
        $wallet->operation='discharge';
        $wallet->amount=0-$request->amount;
        $wallet->payment_method=$request->payment_method;
        $wallet->save();

        $transaction=new Transaction($request->all());
        $transaction->transaction_num=$this->generateTransactionNum();

        $transaction->wallet_id=$wallet->id;
        $transaction->camp_id=$camp_id;
        $transaction->date=date('yy-m-d h:i:s');
        $transaction->status=Order::Find($request->order_id)->status;
        $transaction->user_id=Order::Find($request->order_id)->buyer_id;
        $transaction->save();

        // $wallet_admin=new Wallet();
        // $wallet_admin->user_id=1;
        // $wallet_admin->date=date('yy-m-d h:i:s');
        // $wallet_admin->description='Pay for Approved';
        // $wallet_admin->amount=$request->amount;
        // $wallet_admin->save();


        return redirect()->back()->with('status','The transaction was successful.');
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
