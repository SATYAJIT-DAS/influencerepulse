<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Order;
use App\Model\Campaign;
use App\User;

class ExpireOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:automatation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It delete the orders which expires the time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        //$camp = Campaign::all();
        $orders = Order::all();
        $current = date('yy-m-d h:i:s');
        
        foreach ($orders as $order) {
           
           $left_time = strtotime($current) - strtotime($order->start_time);
           // $this->info($left_time);
            $left_time = $left_time/60;
            $this->info($left_time);
            $this->info($order->id);
            $camp = Campaign::FindOrFail($order->camp_id);
            if($left_time > 9 ){
                if($order->status == 'Waiting for purchase' && $order->daily_count > 0 && !is_null($order->camp_id )){
                   $camp->daily_count -= 1;
                   $camp->total_count -= 1;
                   // DB::table('user')->where('userID', '=', $id)->delete()
                   $camp->save();
                   //$order->status='Expired';
                   $order->delete();
                }
            }
            $late_time_app =(strtotime(date('yy-m-d h:i:s'))-strtotime($order->start_time))/3600;
            if(($late_time_app >= 16)  && ( $order->status == "pre_approved" )){
                $order->status="approved";
                $msg=new Message();
                $msg->order_id=$order->id;
                $msg->date=date('yy-m-d h:i:s');
                $msg->message="Order #".$order->id." has been approved automatically.";
                $msg->msg_status=0;
                $msg->type=3;
                $msg->save();
                $order->save();
            }

            if($order->status == "disputed"){
                $late_time_dis=(strtotime(date('yy-m-d h:i:s'))-strtotime($order->disputed_date))/3600/24;
                if($late_time_dis >= 15){
                    $order->status="paidout";
                    $order->save();
                }
            }

            if($order->status == "approved"){
                $late_time_app=(strtotime(date('yy-m-d h:i:s'))-strtotime($order->approved_date))/3600/24;
                if($late_time_app >= 15){
                    $order->status="paidout";
                    $order->save();
                }
            }
        }
         $this->info('Successfully manage  orders.');
    }
}
