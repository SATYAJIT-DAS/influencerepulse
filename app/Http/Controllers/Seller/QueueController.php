<?php
namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Campaign;
use App\Model\Order;
use App\Model\Wallet;
use App\Model\Transaction;
use App\Model\Message;
use App\Model\Fee;
use App\Model\Service;
use App\User;

class QueueController extends Controller
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
            $notif_order = DB::table('orders')->join('campaigns', 'campaigns.id', '=', 'orders.camp_id')
                ->where('campaigns.user_id', $user_id)
                ->where('status', 'pre_approved')
                ->count();
            $this->notif = $notif_order;
            return $next($request);
        });
    }

    public function index()
    {
        $role = auth()->user()->role->name;
        $user_id = auth()->user()->id;
        $need_apps = Order::where('status', 'pre_approved')->orderby('updated_at', 'DESC')->get();
        $disputes = Order::where('status', 'disputed')->orderby('updated_at', 'DESC')->get();
        $recents = Order::where('status', 'recent')->orderby('updated_at', 'DESC')->get();
        $approveds = Order::where('status', 'approved')->orderby('updated_at', 'DESC')->get();
        $paids = Order::where('status', 'paidout')->orderby('updated_at', 'DESC')->get();
        $declineds = Order::where('status', 'Declined')->orderby('updated_at', 'DESC')->get();
        $resolved = Order::where('status', 'vic_seller')->orWhere('status', 'vic_buyer')
            ->orderby('updated_at', 'DESC')
            ->get();

        $notif = $this->notif;

        return view('backend.seller.queue', compact('need_apps', 'disputes', 'recents', 'approveds', 'paids', 'declineds', 'resolved', 'notif'));
    }

    function generateTransactionNum()
    {
        $num = date('ymdhis');
        $num = $num . strval(random_int(1000, 9999));
        return $num;
    }

    public function orderChange($order_id, $state)
    {
        $rebate_fee = Fee::first()->rebate_fee;
        $order = Order::Find($order_id);
        $order->status = $state;
        // wallet moveDeclined
        if ($state == 'approved') {
            $camp = Campaign::find($order->camp_id);

            // decrement camp wallet
            $camp->wallet -= ($camp->price - $camp->rebate_price + $rebate_fee);
            // end

            $order->approved_date = date('yy-m-d h:i:s');

            $seller = User::Find($camp->user_id);

            $wallet_seller = new Wallet();
            $wallet_seller->amount = 0 - ($camp->price - $camp->rebate_price + $rebate_fee);
            $wallet_seller->user_id = $seller->id;
            $wallet_seller->camp_id = $camp->id;
            $wallet_seller->order_id = $order_id;
            $wallet_seller->date = date('yy-m-d h:i:s');
            $wallet_seller->description = 'pay for approved';
            $wallet_seller->operation = 'discharge';
            $wallet_seller->save();

            $transaction = new Transaction();
            $transaction->wallet_id = $wallet_seller->id;
            $transaction->order_id = $order_id;
            $transaction->user_id = $camp->user_id;
            $transaction->transaction_num = $this->generateTransactionNum();
            $transaction->amount = $camp->price;
            $transaction->date = date('yy-m-d h:i:s');
            $transaction->payment_method = 'discharge';
            $transaction->fee = $rebate_fee;
            $transaction->status = $state;
            $transaction->camp_id = $camp->id;
            $transaction->save();

            $wallet_admin = new Wallet();
            $wallet_admin->amount = $rebate_fee;
            $wallet_admin->user_id = 1;
            $wallet_admin->date = date('yy-m-d h:i:s');
            $wallet_admin->description = 'pay for approved';
            $wallet_admin->save();

            $buyer = User::Find($order->buyer_id);
            $wallet_buyer = new Wallet();
            $wallet_buyer->amount = $camp->price - $camp->rebate_price;
            $wallet_buyer->user_id = $buyer->id;
            $wallet_buyer->camp_id = $camp->id;
            $wallet_buyer->order_id = $order_id;
            $wallet_buyer->date = date('yy-m-d h:i:s');
            $wallet_buyer->description = 'pay for approved';
            $wallet_buyer->operation = 'charge';
            $wallet_buyer->save();

            $transaction_b = new Transaction();
            $transaction_b->wallet_id = $wallet_buyer->id;

            $transaction_b->order_id = $order_id;
            $transaction_b->user_id = $buyer->id;
            $transaction_b->transaction_num = $this->generateTransactionNum();
            $transaction_b->date = date('yy-m-d h:i:s');
            $transaction_b->amount = $camp->price - $camp->rebate_price;
            $transaction_b->fee = $rebate_fee;
            $transaction_b->payment_method = 'charge';
            $transaction_b->status = $state;
            $transaction_b->camp_id = $camp->id;
            $transaction_b->save();
            
            //just update the campaign if daily count is reached
            if ($camp->total_rebates == $camp->total_count) { // means completed
            	$camp->permission = "completed";
            } else if ($camp->daily_rebates == $camp->daily_count) {
            	$camp->permission = "offline";
            }
            $camp->save();

            // campaign wallet check
            // recurring process
            /*$seller_id = $camp->user_id;
            $general_amount = Wallet::where('user_id', $seller_id)->where('operation', 'general charge')->sum('amount');
            $wallet = new Wallet();
            $wallet_camp = new Wallet();

            // camp wallet checkdate(month, day, year) automatic pay from general wallet to campaign wallet
            $daily_amount = ($camp->price - $camp->rebate_price + $rebate_fee) * $camp->daily_rebates;
            $get_total_no_of_rebates_already_processed_or_in_progress = Order::where('camp_id', $camp->id)->whereIn('status', [
                'Waiting for purchase',
                'pre_approved',
                'approved',
                'paidout',
                'paid completed'
            ])->count();
            $already_processed_amount = ($camp->price - $camp->rebate_price + $rebate_fee) * $get_total_no_of_rebates_already_processed_or_in_progress;
            $total_amount = $camp->total_rebates * ($camp->price - $camp->rebate_price + $rebate_fee);
            $amount_remaining_to_be_processed = $total_amount - $already_processed_amount;

            $amount_to_be_considered_for_deduction_from_general_wallet = $daily_amount;

            if ($daily_amount > $amount_remaining_to_be_processed) {
                $amount_to_be_considered_for_deduction_from_general_wallet = $amount_remaining_to_be_processed;
            }

            if (($camp->permission == "online") && (round($camp->wallet * 100) / 100 < $camp->price - $camp->rebate_price + $rebate_fee)) {
                if ($amount_to_be_considered_for_deduction_from_general_wallet <= $general_amount) {
                    $wallet->user_id = $seller_id;
                    $wallet->camp_id = $order->camp_id;
                    $wallet->date = date('yy-m-d h:i:s');
                    $wallet->description = 'Charge for campaign with General wallet';
                    $wallet->operation = 'general charge';
                    $wallet->amount = 0 - $amount_to_be_considered_for_deduction_from_general_wallet;
                    $wallet->order_id = $order->id;
                    $wallet->save();

                    $wallet_camp->user_id = $seller_id;
                    $wallet_camp->camp_id = $order->camp_id;
                    $wallet_camp->date = date('yy-m-d h:i:s');
                    $wallet_camp->description = 'Charge for campaign with General wallet';
                    $wallet_camp->operation = 'Pay for campaign';
                    $wallet_camp->amount = $amount_to_be_considered_for_deduction_from_general_wallet;
                    $wallet_camp->order_id = $order->id;
                    $wallet_camp->save();
                    // transaction not
                    $camp->wallet += $amount_to_be_considered_for_deduction_from_general_wallet;

                    $camp->save();
                } else {
                    $camp->permission = "offline";
                    $camp->save();

                    $msg = new Message();
                    $msg->order_id = $order->id;
                    $msg->date = date('yy-m-d h:i:s');
                    $msg->message = `Campaign "` . $camp->product_name . `" has been stopped due to insufficient funds in General Wallet, to re-activate the campaign "test01" recharge your General wallet`;
                    $msg->to_user = $camp->user_id;
                    $msg->user_id = 1;
                    $msg->msg_status = 0;
                    $msg->type = 3;
                    $msg->save();
                }
            }*/
            // end
        }
        if ($state == 'disputed') {
            $camp = Campaign::find($order->camp_id);
            $order->disputed_date = date('yy-m-d h:i:s');
            $camp->wallet -= ($camp->price - $camp->rebate_price + $rebate_fee);
            $seller = User::Find($camp->user_id);

            $wallet_seller = new Wallet();
            $wallet_seller->amount = 0 - ($camp->price - $camp->rebate_price + $rebate_fee);
            $wallet_seller->user_id = $seller->id;
            $wallet_seller->camp_id = $camp->id;
            $wallet_seller->order_id = $order_id;
            $wallet_seller->date = date('yy-m-d h:i:s');
            $wallet_seller->description = 'In hold as dipute rise';
            $wallet_seller->operation = 'discharge';
            $wallet_seller->save();
            
            
            $transaction = new Transaction();
            $transaction->wallet_id = $wallet_seller->id;
            $transaction->order_id = $order_id;
            $transaction->user_id = $camp->user_id;
            $transaction->transaction_num = $this->generateTransactionNum();
            $transaction->amount = $camp->rebate_price + $rebate_fee;
            $transaction->date = date('yy-m-d h:i:s');
            $transaction->payment_method = 'discharge';
            $transaction->fee = $rebate_fee;
            $transaction->status = $state;
            $transaction->camp_id = $camp->id;
            $transaction->save();
            

            $wallet_admin = new Wallet();
            $wallet_admin->amount = $camp->price_rebate_price + $rebate_fee;
            $wallet_admin->user_id = 1;
            $wallet_admin->date = date('yy-m-d h:i:s');
            $wallet_admin->description = 'In hold as dipute rise';
            $wallet_admin->save();

            if ($camp->total_rebates == $camp->total_count) { // means completed
            	$camp->permission = "completed";
            } else if ($camp->daily_rebates == $camp->daily_count) {
            	$camp->permission = "offline";
            }
            $camp->save();

        }

        // notification to admin
        if ($state == 'paidout') {
            $service = new Service();
            $service->status = "unread";
            $service->user_id = auth()->user()->id;
            $service->opinion = "You should reset buyer's wallet.";
            $service->receive_time = date('yy-m-d h:i:s');
            $service->status = "unread";
            $service->save();
        }

        $order->save();
        return redirect()->back()->with('status', 'Order status is ' . $state);
    }

    public function dispute(Request $request)
    {
        $order = Order::Find($request->order_id);
        $order->status = "disputed";
        $order->dis_reason = $request->reason;
        
        
        $camp = Campaign::find($order->camp_id);
         
            $order->disputed_date = date('yy-m-d h:i:s');
            //$camp->wallet -= ($camp->price - $camp->rebate_price + $rebate_fee);
             $buyer = User::Find($order->buyer_id);
            $wallet_buyer = new Wallet();
            $wallet_buyer->amount =  - $camp->price_rebate_price;
            $wallet_buyer->user_id = $buyer->id;
            $wallet_buyer->camp_id = $camp->id;
            $wallet_buyer->order_id = $request->order_id;
            $wallet_buyer->date = date('yy-m-d h:i:s');
            $wallet_buyer->description = 'hold because seeler apply for dispute';
            $wallet_buyer->operation = 'discharge';
            $wallet_buyer->save();

            $transaction_b = new Transaction();
            $transaction_b->wallet_id = $wallet_buyer->id;

            $transaction_b->order_id = $request->order_id;
            $transaction_b->user_id = $buyer->id;
            $transaction_b->transaction_num = $this->generateTransactionNum();
            $transaction_b->date = date('yy-m-d h:i:s');
            $transaction_b->amount = 0 - $camp->price_rebate_price;
            $transaction_b->fee = 0;
            $transaction_b->payment_method = 'discharge';
            $transaction_b->status = "disputed";
            $transaction_b->camp_id = $camp->id;
            $transaction_b->save();
            

            $wallet_admin = new Wallet();
            $wallet_admin->amount = $camp->price_rebate_price;
            $wallet_admin->user_id = 1;
            $wallet_admin->date = date('yy-m-d h:i:s');
            $wallet_admin->description = 'In hold as dipute rise in aproved stage';
            $wallet_admin->save();

            if ($camp->total_rebates == $camp->total_count) { // means completed
            	$camp->permission = "completed";
            } else if ($camp->daily_rebates == $camp->daily_count) {
            	$camp->permission = "offline";
            }
            $camp->save();
            $order->save();
        return redirect()->route('seller.queue')->with('status','Order status is dispute.');
    }

    public function seller_resolve($order_id){
        $order=Order::Find($order_id);
        $order->status='vic_buyer';
        $order->save();

        return redirect()->back()->with('status', 'The dispute was resolved.');
    }

    public static function getCalcAmountConsideredTobeDeductedFromGeneralWallet($camp_id) {

        $rebate_fee = Fee::first()->rebate_fee;
        $camp = Campaign::find($camp_id);

        $daily_amount = ($camp->price - $camp->rebate_price + $rebate_fee) * $camp->daily_rebates;
        $get_total_no_of_rebates_already_processed_or_in_progress = Order::where('camp_id', $camp->id)->whereIn('status', [
            'Waiting for purchase',
            'pre_approved',
            'approved',
            'paidout',
            'paid completed'
        ])->count();

        $already_processed_amount = ($camp->price - $camp->rebate_price + $rebate_fee) * $get_total_no_of_rebates_already_processed_or_in_progress;
        $total_amount = $camp->total_rebates * ($camp->price - $camp->rebate_price + $rebate_fee);
        $amount_remaining_to_be_processed = $total_amount - $already_processed_amount;

        $amount_to_be_considered_for_deduction_from_general_wallet = $daily_amount;

        if ($daily_amount > $amount_remaining_to_be_processed) {
            $amount_to_be_considered_for_deduction_from_general_wallet = $amount_remaining_to_be_processed;
        }

        return $amount_to_be_considered_for_deduction_from_general_wallet;
    }

}
