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
        
        // wallet move
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
        if (auth()->user()->role->name == 'buyer') {
            return '';
        }
        return redirect()->back()->with('status', 'Order status is ' . $state);
    }

    public function dispute(Request $request)
    {
        $order = Order::Find($request->order_id);
        $order->status = "disputed";
        $order->dis_reason = $request->reason;
        $order->disputed_date = date('yy-m-d h:i:s');
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
