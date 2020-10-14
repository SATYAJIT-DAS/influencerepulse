<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Seller\QueueController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Category;
use App\Model\Marketplace;

use App\Model\Coupon;
use App\Model\Fee;

use App\Model\Campaign;
use App\Model\Message;
use App\Model\Order;
use App\Model\Wallet;
use App\Model\Transaction;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $today = strtotime(date('yy-m-d'));
        $camps = Campaign::all();
        $categories = Category::all();
        $markets = Marketplace::all();
        $camps = Campaign::where('permission', 'online')->orderby('updated_at', 'DESC')->get();
        $coupons = Coupon::where('permission', 'online')->get();
        $mail_verify = auth()->user()->mail_verify;
        return view('backend.buyer.dashboard', compact('camps', 'categories', 'coupons', 'mail_verify', 'markets'));
    }

    function generateTransactionNum()
    {
        $num = date('ymdhis');
        $num = $num . strval(random_int(1000, 9999));
        return $num;
    }

    public function confirm($camp_id){
    	 $camp = Campaign::FindOrFail($camp_id);
        if ($camp->daily_count >= $camp->daily_rebates) {
            return redirect()->back()->with('status', 'Sorry, deals are closed for the day, please try to avail deal tomorrow.');
        }
        $existing_orders = Order::where('buyer_id', auth()->user()->id)
            ->where('camp_id', $camp_id)
            ->whereIn('status', [
                'Waiting for purchase',
                'pre_approved',
                'approved',
                'paidout',
                'paid completed'
            ])->count();

        if ($existing_orders) {
            return redirect()->back()->with('status', 'You have already purchased this order.');
        }
        $order=new Order();
        $order->camp_id = $camp_id;
        $order->buyer_id = auth()->user()->id;
        $order->status = 'before going marketplace';
        $order->save();
        return view('backend.buyer.buy_confirm', compact('camp', 'order'));
    }

    public function confirmRedirect(Request $request)
    {
        $rebate_fee = Fee::first()->rebate_fee;
        $camp = Campaign::FindOrFail($request->camp_id);
        if ($camp->daily_count >= $camp->daily_rebates) {
            return redirect()->back()->with('status', 'Sorry, deals are closed for the day, please try to avail deal tomorrow.');
        }
        $new_order = Order::Find($request->order_id);
        if(empty( $new_order)){
               // var_dump();
                 return redirect()->route('buyer.index')->withErrors(['The Deal been expired']);;
            }
        $buyer_id = auth()->user()->id;
        $new_order->buyer_id = auth()->user()->id;
        $new_order->camp_id = $request->camp_id;

        $current = date('yy-m-d h:i:s');

        if (!$new_order->start_time) {
            $new_order->start_time = $current;
             $camp->daily_count += 1;
            $camp->total_count += 1;
            $camp->save();
        }
        $new_order->status = 'Waiting for purchase';
        $new_order->save();
        // left time count
        $left_time = strtotime($current) - strtotime($new_order->start_time);
        $left_time = (60*60) - $left_time;
        $orders = Order::where('buyer_id', $buyer_id)->where('status', 'Waiting for purchase')
            ->orwhere('status', 'Expired')
            ->orderby('updated_at', 'DESC')->get();
        $purcha_count = Order::where('buyer_id', $buyer_id)->where('status', 'Waiting for purchase')->count();
        $dispute_count = Order::where('buyer_id', $buyer_id)->where('status', 'disputes')->count();
        $msg_count = DB::select("
            SELECT messages.order_id
            FROM messages
            LEFT JOIN orders ON orders.id=messages.order_id
            WHERE orders.buyer_id=:id", ['id' => $buyer_id]);
        return view('backend.buyer.confirm_redirect',
            compact('camp', 'orders', 'new_order', 'current', 'left_time', 'purcha_count', 'dispute_count', 'msg_count'))->with(['message' => "Please confirm the order id"]);;
    }

    public function againConfirm($order_id)
    {
        $buyer_id = auth()->user()->id;
        $new_order = Order::find($order_id);
        if(empty( $new_order)){
               // var_dump();
                 return redirect()->route('buyer.index')->withErrors(['The Deal been expired']);;
            }
        $camp = Campaign::FindOrFail($new_order->camp_id);
        $orders = Order::where('buyer_id', $buyer_id)->orderby('updated_at', 'DESC')->get();
       // dd($orders);
        $current = date('yy-m-d h:i:s');
        $left_time = (60*60)  - strtotime($current) + strtotime($new_order->start_time);
        $purcha_count = Order::where('buyer_id', $buyer_id)->where('status', 'Waiting for purchase')->count();
        $dispute_count = Order::where('buyer_id', $buyer_id)->where('status', 'disputes')->count();
        $msg_count = DB::select("
            SELECT messages.order_id
            FROM messages
            LEFT JOIN orders ON orders.id=messages.order_id
            WHERE orders.buyer_id=:id", ['id' => $buyer_id]);
            //dd($new_order);
        return view('backend.buyer.confirm_redirect',
            compact('camp', 'orders', 'new_order', 'left_time', 'current', 'left_time', 'purcha_count', 'dispute_count', 'msg_count'));
    }

    public function orderPurchase(Request $request)
    {
        $order = Order::FindOrFail($request->order_id);
        $order->order_id = $request->key_reported;
        if ($request->action == "cancel") {
            $camp = Campaign::FindOrFail($request->order_id);
            $camp->daily_count -= 1;
            $camp->total_count -= 1;
            $camp->save();
            $order->status = "Cancelled";
        } else {
            $order->status = "pre_approved";
        }
        $order->save();
        // total count
        $camp = Campaign::Find($order->camp_id);
        //$camp->total_count = $camp->total_count + 1;
        if ($camp->total_count >= $camp->total_rebates && $camp->total_rebates) {
            $camp->permission = 'completed';
        }
        // daily_count count
        //$camp->daily_count += 1;
        $camp->count_time = date('yy-m-d');
        $camp->save();
        // end
        return redirect()->route('buyer.purchases');
    }

    public function orderCancel(Request $request)
    {
        $order = Order::FindOrFail($request->order_id);
        $camp = Campaign::FindOrFail($order->camp_id);
        $camp->daily_count -= 1;
        $camp->total_count -= 1;
        $camp->save();
        $order->status = "Cancelled";
        $order->save();
        return redirect()->route('buyer.purchases');
        // return json_encode($order);
    }

    public function favoSet(Request $request)
    {
        $camp_id = $request->camp_id;
        $camp = Campaign::Find($camp_id);
        $camp->favorite = $request->favo;
        $camp->save();
        return json_encode($camp->favorite);
    }

    public function favoGet(Request $request)
    {
        $camp_id = $request->camp_id;
        $camp = Campaign::Find($camp_id);
        return json_encode($camp->favorite);
    }

    public function favoSetCoupon(Request $request)
    {
        $coupon_id = $request->coupon_id;
        $coupon = Coupon::Find($coupon_id);
        $coupon->favorite = $request->favo;
        $coupon->save();
        return json_encode($coupon->favorite);
    }


    public function searchGlobal(Request $request)
    {
        $term = $request->search['term'];
        $min_price = $request->search['min_price'];
        $max_price = $request->search['max_price'];
        $marketplace_id = $request->search['marketplace_id'];
        $category_id = [];

        if (count($request->search) == 6) {
            $category_id = $request->search['category_id'];
        }

        $sort = $request->search['sort'];

        $where = [];

        if ($term != '') {
            array_push($where, ['product_name', 'like', "%" . $term . "%"]);
        }
        if ($min_price != '') {
            array_push($where, ['price', '>=', $min_price]);
        }
        if ($max_price != '') {
            array_push($where, ['price', '<=', $max_price]);
        }
        if ($marketplace_id != '') {
            array_push($where, ['marketplace', '=', $marketplace_id]);
        }

        $camps = Campaign::where('permission', 'online')
            ->where($where)->get();

        if ($sort) {
            switch ($sort) {
                case 'newest':
                    $camps = Campaign::where('permission', 'online')->where($where)->orderby('updated_at', 'desc')->get();
                    break;
                case 'end':
                    $camps = Campaign::where('permission', 'online')->where($where)->where('count_limit', '=', 0)->get();
                    break;
                case 'per-dis':
                    $camps = Campaign::where('permission', 'online')->where($where)->orderby('price_rebate_price', 'desc')->get();
                    break;
                case 'low-dis':
                    $camps = Campaign::where('permission', 'online')->where($where)->orderby('daily_rebates_daily_count', 'asc')->get();
                    break;
                case 'high-dis':
                    $camps = Campaign::where('permission', 'online')->where($where)->orderby('daily_rebates_daily_count', 'desc')->get();
                    break;
                case 'low-list-price':
                    $camps = Campaign::where('permission', 'online')->where($where)->orderby('price', 'asc')->get();
                    break;
                case 'high-list-price':
                    $camps = Campaign::where('permission', 'online')->where($where)->orderby('price', 'desc')->get();
                    break;
                case 'low-price':
                    $camps = Campaign::where('permission', 'online')->where($where)->orderby('rebate_price', 'asc')->get();
                    break;
                case 'high-price':
                    $camps = Campaign::where('permission', 'online')->where($where)->orderby('rebate_price', 'desc')->get();
                    break;
                default:
                    $camps = Campaign::where('permission', 'online')->where($where)->get();
                    break;
            }
        }

        if (count($category_id) != 0) {
            // return $category_id;
            // $cate_filter=array(implode(",",$category_id));
            // return $cate_filter;
            $camps = Campaign::where('permission', 'online')
                ->where($where)
                ->whereIn('category', $category_id)
                ->get();


            if ($sort) {
                switch ($sort) {
                    case 'newest':
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->orderby('updated_at', 'desc')->get();
                        break;
                    case 'end':
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->where('count_limit', '=', 0)->get();
                        break;
                    case 'per-dis':
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->orderby('price_rebate_price', 'desc')->get();
                        break;
                    case 'low-dis':
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->orderby('daily_rebates_daily_count', 'asc')->get();
                        break;
                    case 'high-dis':
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->orderby('daily_rebates_daily_count', 'desc')->get();
                        break;
                    case 'low-list-price':
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->orderby('price', 'asc')->get();
                        break;
                    case 'high-list-price':
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->orderby('price', 'desc')->get();
                        break;
                    case 'low-price':
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->orderby('rebate_price', 'asc')->get();
                        break;
                    case 'high-price':
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->orderby('rebate_price', 'desc')->get();
                        break;

                    default:
                        $camps = Campaign::where('permission', 'online')->where($where)->whereIn('category', $category_id)->get();
                        break;
                }
            }

        }

        $coupons = Coupon::where('permission', 'online')->get();

        $categories = Category::all();
        $markets = Marketplace::all();

        $mail_verify = auth()->user()->mail_verify;

        $remaining_deals_for_the_day = 0;

        $cate_size=count($category_id);
        return view('backend.buyer.dashboard',
            compact('camps','categories','coupons','mail_verify','markets','sort','term','min_price','max_price','marketplace_id','category_id','cate_size','remaining_deals_for_the_day'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
