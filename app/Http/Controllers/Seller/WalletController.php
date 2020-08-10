<?php
namespace App\Http\Controllers\Seller;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Wallet;
use App\Model\Campaign;
use App\Model\Fee;
use App\Model\Transaction;
use Stripe\Stripe;
use Stripe\Charge;
use Razorpay\Api\Api;

class WalletController extends Controller
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
        $wallets = Wallet::where('user_id', $user_id)->orderby('updated_at', 'DESC')->get();

        $wallet_sum = Wallet::where('user_id', $user_id)->sum('amount');

        $general_amount = Wallet::where('user_id', $user_id)->where('operation', 'general charge')->sum('amount');

        $offline = Campaign::where('user_id', $user_id)->where('permission', 'offline')
            ->orderby('updated_at', 'DESC')
            ->get();

        $camp_wallets = Campaign::where('user_id', $user_id)->orderby('updated_at', 'DESC')->get();

        $fee = Fee::first();
        $notif = $this->notif;

        // Orders generate
        $api_key = config('services.razor.key');
        $api_secret = config('services.razor.secret');
        $api = new Api($api_key, $api_secret);

        $amount_100 = round((100 * (100 + $fee->paypal_fee)));
        $receipt = random_int(1000, 9999);
        $order_100 = $api->order->create(array(
            'receipt' => $receipt,
            'amount' => $amount_100,
            'currency' => 'INR'
        ))->toArray(); // Creates order
        //$order__100_id = $order_100['id']; // Get the created Order ID
        //var_dump($order_100);die;

        $amount_250 = round((250 * (100 + $fee->paypal_fee)));
        $receipt = random_int(1000, 9999);
        $order_250 = $api->order->create(array(
            'receipt' => $receipt,
            'amount' => $amount_250,
            'currency' => 'INR'
        ))->toArray(); // Creates order
        //$order__250_id = $order_250['id']; // Get the created Order ID

        $amount_500 = round((500 * (100 + $fee->paypal_fee)));
        $receipt = random_int(1000, 9999);
        $order_500 = $api->order->create(array(
            'receipt' => $receipt,
            'amount' => $amount_500,
            'currency' => 'INR'
        ))->toArray(); // Creates order
        //$order__500_id = $order_500['id']; // Get the created Order ID

        $amount_1000 = round((1000 * (100 + $fee->paypal_fee)));
        $receipt = random_int(1000, 9999);
        $order_1000 = $api->order->create(array(
            'receipt' => $receipt,
            'amount' => $amount_1000,
            'currency' => 'INR'
        ))->toArray(); // Creates order
        //$order__1000_id = $order_1000['id']; // Get the created Order ID

        $amount_3000 = round((3000 * (100 + $fee->paypal_fee)));
        $receipt = random_int(1000, 9999);
        $order_3000 = $api->order->create(array(
            'receipt' => $receipt,
            'amount' => $amount_3000,
            'currency' => 'INR'
        ))->toArray(); // Creates order
        //$order__3000_id = $order_3000['id']; // Get the created Order ID

        $amount_5000 = round((5000 * (100 + $fee->paypal_fee)));
        $receipt = random_int(1000, 9999);
        $order_5000 = $api->order->create(array(
            'receipt' => $receipt,
            'amount' => $amount_5000,
            'currency' => 'INR'
        ))->toArray(); // Creates order
        //$order__5000_id = $order_5000['id']; // Get the created Order ID

        $amount_10000 = round((10000 * (100 + $fee->paypal_fee)));
        $receipt = random_int(1000, 9999);
        $order_10000 = $api->order->create(array(
            'receipt' => $receipt,
            'amount' => $amount_10000,
            'currency' => 'INR'
        ))->toArray(); // Creates order
        //$order__10000_id = $order_10000['id']; // Get the created Order ID

        return view('backend.seller.wallet', compact('role', 'wallets', 'wallet_sum', 'camp_wallets', 'offline', 'general_amount', 'fee', 'notif', 'order_100', 'order_250', 'order_500', 'order_1000', 'order_3000', 'order_5000', 'order_10000'));
    }

    function generateTransactionNum()
    {
        $num = date('ymdhis');
        $num = $num . strval(random_int(1000, 9999));
        return $num;
    }

    public function campCharge(Request $request)
    {
        $key = $request->modal_key;
        $camp = Campaign::Find($request->camp_id);

        $camp->wallet = $camp->wallet + $request->amount;
        $camp->permission = 'online';

        $description = $request->desription;

        if ($key == 'stripe') {

            Stripe::setApiKey(config('services.stripe.secret'));
            $token = request('stripeToken');
            $fee = Fee::first()->paypal_fee;
            $amount = $request->amount * ($fee / 100 + 1);

            $charge = Charge::create([
                "amount" => round($amount * 100),
                "currency" => "INR",
                'description' => $description,
                'source' => $token
            ]);

            $wallet_admin = new Wallet();
            $wallet_admin->user_id = 1;
            $wallet_admin->date = date('yy-m-d h:i:s');
            $wallet_admin->description = $description;
            $wallet_admin->amount = round($request->amount * $fee) / 100;
            $wallet_admin->save();

            $wallet = new Wallet();
            $wallet->user_id = auth()->user()->id;
            $wallet->camp_id = $camp->id;
            $wallet->date = date('yy-m-d h:i:s');
            $wallet->description = $description;

            $last_card = $charge->payment_method_details['card']['last4'];
            $payment_type = $charge->payment_method_details['type'];
            $wallet->payment_method = $payment_type . ' **** **** ****' . $last_card;

            $wallet->amount = $request->amount;

            $wallet->fee_amount = round($request->amount * $fee) / 100;
            $wallet->operation = 'Charge campaign with Stripe';
            $wallet->save();

            $transaction = new Transaction();
            $transaction->payment_method = 'charge';
            $transaction->wallet_id = $wallet->id;
            $transaction->user_id = auth()->user()->id;
            $transaction->transaction_num = $this->generateTransactionNum();
            $transaction->date = date('yy-m-d h:i:s');
            $transaction->amount = $wallet->amount;
            $transaction->camp_id = $wallet->camp_id;
            $transaction->status = 'Charge campaign with Stripe';
            $transaction->save();
        } else {

            $general_amount = $general_amount = Wallet::where('user_id', auth()->user()->id)->where('operation', 'general charge')->sum('amount');
            if ($general_amount >= $request->amount) {
                $wallet_old = new Wallet();
                $wallet_old->user_id = auth()->user()->id;
                $wallet_old->camp_id = $camp->id;
                $wallet_old->date = date('yy-m-d h:i:s');
                $wallet_old->description = $description;
                $wallet_old->amount = 0 - $request->amount;
                $wallet_old->operation = 'general charge';
                $wallet_old->save();

                $wallet_new = new Wallet();
                $wallet_new->user_id = auth()->user()->id;
                $wallet_new->camp_id = $camp->id;
                $wallet_new->date = date('yy-m-d h:i:s');
                $wallet_new->description = $description;
                $wallet_new->amount = $request->amount;
                $wallet_new->operation = 'Charge campaign with Stripe';
                $wallet_new->save();

                $transaction = new Transaction();
                $transaction->payment_method = 'general discharge';
                $transaction->wallet_id = $wallet_new->id;
                $transaction->user_id = auth()->user()->id;
                $transaction->transaction_num = $this->generateTransactionNum();
                $transaction->date = date('yy-m-d h:i:s');
                $transaction->amount = $wallet_new->amount;
                $transaction->camp_id = $wallet_new->camp_id;
                $transaction->status = 'Charge campaign with Stripe';
                $transaction->save();
            } else {
                return redirect()->back()->with('status', 'Faild');
            }

            $camp->save();
        }
        return redirect()->back()->with('status', 'Success');
    }

    public function generalCharge(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $token = request('stripeToken');
        $fee = Fee::first()->paypal_fee;
        $amount = $request->amount * ($fee / 100 + 1);
        $description = $request->desription;

        $charge = Charge::create([
            "amount" => round($amount * 100),
            "currency" => "INR",
            'description' => $description,
            'source' => $token
        ]);

        $wallet_admin = new Wallet();
        $wallet_admin->user_id = 1;
        $wallet_admin->date = date('yy-m-d h:i:s');
        $wallet_admin->description = $description;
        $wallet_admin->amount = round($request->amount * $fee) / 100;
        $wallet_admin->save();

        $wallet = new Wallet();
        $wallet->user_id = auth()->user()->id;
        $wallet->date = date('yy-m-d h:i:s');
        $wallet->description = $description;

        $last_card = $charge->payment_method_details['card']['last4'];
        $payment_type = $charge->payment_method_details['type'];
        $wallet->payment_method = $payment_type . ' **** **** ****' . $last_card;

        $wallet->amount = $request->amount;

        $wallet->fee_amount = round($request->amount * $fee) / 100;
        $wallet->operation = 'general charge';
        $wallet->save();

        $transaction = new Transaction();
        $transaction->payment_method = 'charge';
        $transaction->wallet_id = $wallet->id;
        $transaction->user_id = auth()->user()->id;
        $transaction->transaction_num = $this->generateTransactionNum();
        $transaction->date = date('yy-m-d h:i:s');
        $transaction->amount = $wallet->amount;
        $transaction->camp_id = $wallet->camp_id;
        $transaction->status = 'for wallet charge';
        $transaction->save();

        $camp = Campaign::Find($request->camp_id);

        $msg = "Payment successful!";

        $wallet_amount = Wallet::where('user_id', auth()->user()->id)->sum('amount');
        $fee = Fee::first();

        return redirect()->back()->with('status', 'Success!');
    }

    public function campActivate($camp_id) {

        $seller_id = auth()->user()->id;

        $amount_to_be_considered_for_deduction_from_general_wallet = QueueController::getCalcAmountConsideredTobeDeductedFromGeneralWallet($camp_id);
        $general_amount = Wallet::where('user_id', $seller_id)->where('operation', 'general charge')->sum('amount');

        if ($amount_to_be_considered_for_deduction_from_general_wallet <= $general_amount) {
            $wallet = new Wallet();
            $wallet->user_id = $seller_id;
            $wallet->camp_id = $camp_id;
            $wallet->date = date('yy-m-d h:i:s');
            $wallet->description = 'Charge for campaign with General wallet';
            $wallet->operation = 'general charge';
            $wallet->amount = 0 - $amount_to_be_considered_for_deduction_from_general_wallet;
            $wallet->save();

            $wallet_camp = new Wallet();
            $wallet_camp->user_id = $seller_id;
            $wallet_camp->camp_id = $camp_id;
            $wallet_camp->date = date('yy-m-d h:i:s');
            $wallet_camp->description = 'Charge for campaign with General wallet';
            $wallet_camp->operation = 'Pay for campaign';
            $wallet_camp->amount = $amount_to_be_considered_for_deduction_from_general_wallet;
            $wallet_camp->save();

            $camp = Campaign::find($camp_id);
            $camp->permission = "online";
            $camp->wallet += $amount_to_be_considered_for_deduction_from_general_wallet;
            $camp->save();
            return redirect()->route('seller.wallet')->with('status', $camp->product_name . " has been successfully Activated Now!") ;
        } else {
            return redirect()->route('seller.wallet')
                ->with(['status' => 'Failed', 'amount_to_be_considered_for_deduction_from_general_wallet' => $amount_to_be_considered_for_deduction_from_general_wallet]) ;

        }

    }
}
