<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Charts\CalcChart;

use App\Model\Campaign;
use App\Model\Order;
use App\Model\Message;

class HomeController extends Controller
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
            $notif_order = DB::table('orders')
                ->join('campaigns', 'campaigns.id', '=', 'orders.camp_id')
                ->where('campaigns.user_id', $user_id)
                ->where('status', 'pre_approved')
                ->count();
            $this->notif = $notif_order;
            return $next($request);
        });
    }

    public function index()
    {

        $camps = Campaign::all();
        $today = date('yy-m-d');
        foreach ($camps as $key => $camp) {
            $start_date = strtotime($camp->start_date);
            if (($today >= $start_date) && ($camp->permission == "ready")) {
                $camp->permission = "pending";
                $camp->save();
            }

            if (($camp->count_time < $start_date) && ($camp->permission == "offline")) {
                $camp->daily_count = 0;
                $camp->save();
            }
        }

        $mail_verify = auth()->user()->mail_verify;
        $user_id = Auth()->user()->id;

        $camps = Campaign::where('user_id', $user_id)->count();

        $orders = DB::select("
        	SELECT campaigns.id
				FROM orders
				LEFT JOIN campaigns ON campaigns.id=orders.camp_id
				WHERE campaigns.user_id=:id", ['id' => $user_id]);
		 $orders_pending = DB::select("
        	SELECT campaigns.id
        		FROM orders
        		LEFT JOIN campaigns ON campaigns.id=orders.camp_id
        		WHERE orders.status = 'pre_approved' AND 
        	    campaigns.user_id=:id", ['id' => $user_id]);
        		//dd($orders_pending);


        $disputes = DB::select("
        	SELECT campaigns.id
				FROM orders
				LEFT JOIN campaigns ON campaigns.id=orders.camp_id
				WHERE orders.status='disputes' and campaigns.user_id=:id", ['id' => $user_id]);
        $msgs = DB::select("
        	SELECT messages.id
				FROM messages
				LEFT JOIN orders ON orders.id=messages.order_id
				LEFT JOIN campaigns ON orders.camp_id=campaigns.id
				WHERE messages.msg_status=0 AND  campaigns.user_id=:id", ['id' => $user_id]);

        $campChart = new CalcChart;
        $today = date('yy-m-d');

        $label = [];
        $camp_graph = [];

        for ($i = 28; $i > -2; $i--) {
            $d = strtotime(-$i . " Days");
            $date = date("Y-m-d", $d);
            $label[] = date('m-d', strtotime($date));
            $cam = Campaign::where('created_at', '<=', $date)->where('user_id', $user_id)->count();
            $camp_graph[] = $cam;
        }

        $campChart->labels($label);
        $campChart->dataset('Campaigns', 'line', $camp_graph)
            ->color("#00ce90")
            ->backgroundcolor("#00ce90")
            ->fill(true)
            ->linetension(0.1)
            ->dashed([3]);


        $ordersChart = new CalcChart;
        $today = date('yy-m-d');

        $label = [];
        $order_graph = [];

        for ($i = 28; $i > -2; $i--) {
            $d = strtotime(-$i . " Days");
            $date = date("Y-m-d", $d);
            $label[] = date('m-d', strtotime($date));
            $order_c = DB::select("
                SELECT orders.id
                    FROM orders
                    LEFT JOIN campaigns ON campaigns.id=orders.camp_id
                    WHERE campaigns.user_id=:id AND orders.created_at < :today", ['id' => $user_id, 'today' => $date]);
            $order_graph[] = count($order_c);
        }

        $ordersChart->labels($label);
        $ordersChart->dataset('Orders', 'line', $order_graph)
            ->color("#00ce90")
            ->backgroundcolor("#00ce90")
            ->fill(true)
            ->linetension(0.1)
            ->dashed([3]);

        $disputesChart = new CalcChart;
        $today = date('yy-m-d');

        $label = [];
        $dispute_graph = [];

        for ($i = 28; $i > -2; $i--) {
            $d = strtotime(-$i . " Days");
            $date = date("Y-m-d", $d);
            $label[] = date('m-d', strtotime($date));
            $dispute_c = DB::select("
            SELECT campaigns.id
                FROM orders
                LEFT JOIN campaigns ON campaigns.id=orders.camp_id
                WHERE orders.status='disputes' and campaigns.user_id=:id AND orders.created_at < :today", ['id' => $user_id, 'today' => $date]);
            $dispute_graph[] = count($dispute_c);
        }

        $disputesChart->labels($label);
        $disputesChart->dataset('Disputes', 'line', $dispute_graph)
            ->color("#00ce90")
            ->backgroundcolor("#00ce90")
            ->fill(true)
            ->linetension(0.1)
            ->dashed([3]);


        $msgsChart = new CalcChart;
        $today = date('yy-m-d');

        $label = [];
        $msg_graph = [];

        for ($i = 28; $i > -2; $i--) {
            $d = strtotime(-$i . " Days");
            $date = date("Y-m-d", $d);
            $label[] = date('m-d', strtotime($date));
            $order_c = DB::select("
            SELECT messages.id
                FROM messages
                LEFT JOIN orders ON orders.id=messages.order_id
                LEFT JOIN campaigns ON orders.camp_id=campaigns.id
                WHERE  campaigns.user_id=:id AND orders.created_at < :today", ['id' => $user_id, 'today' => $date]);
            $msg_graph[] = count($order_c);
        }

        $msgsChart->labels($label);
        $msgsChart->dataset('Messages', 'line', $msg_graph)
            ->color("#00ce90")
            ->backgroundcolor("#00ce90")
            ->fill(true)
            ->linetension(0.1)
            ->dashed([3]);

        $notif = $this->notif;


        return view('backend.seller.dashboard', compact('mail_verify', 'camps', 'orders', 'disputes','orders_pending', 'msgs', 'campChart', 'ordersChart', 'disputesChart', 'msgsChart', 'notif'));
    }
}
