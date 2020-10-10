<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Seller\QueueController;
use App\Model\Wallet;
use App\Model\Order;
use App\Model\Campaign;
use App\User;
use Illuminate\Support\Facades\DB;

class CampaignReseting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaign:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It refresh Campaign';

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
        $today = strtotime(date('yy-m-d'));
        $camps = Campaign::all();
        //dd($today);

        foreach ($camps as $key => $camp) {
          //$this->info('test');
            $updateCampaign = false;
            $start_date = strtotime($camp->start_date);
            if (($today >= strtotime($camp->start_date)) && ($camp->permission == "ready")) {
                $camp->permission = "online";
           	    $updateCampaign = true;
            }

            if ($today > strtotime($camp->count_time) && $camp->permission == "offline") {

                $camp->approveWaitingOrders();

                if ($camp->total_count < $camp->total_rebates) {
                    $camp->count_time = date('yy-m-d');
                    $camp->daily_count = 0;
                    $camp->appproved_order_daily = 0;
                    $updateCampaign = true;
                }

                if ($camp->wallet <= 0 && $camp->total_count < $camp->total_rebates) {
                  $this->info('test11');
                	$amount_to_be_considered_for_deduction_from_general_wallet = QueueController::getCalcAmountConsideredTobeDeductedFromGeneralWallet($camp->id);
                	$general_amount = Wallet::where('user_id', $camp->user_id)->where('operation', 'general charge')->sum('amount');
                	if ($amount_to_be_considered_for_deduction_from_general_wallet > 0 && $amount_to_be_considered_for_deduction_from_general_wallet <= $general_amount) {
                   		    $wallet = new Wallet();
                    		$wallet->user_id = $camp->user_id;
                    		$wallet->camp_id = $camp->id;
                   		    $wallet->date = date('yy-m-d h:i:s');
                    		$wallet->description = 'Charge for campaign with General wallet';
                    		$wallet->operation = 'general charge';
                    		$wallet->amount = 0 - $amount_to_be_considered_for_deduction_from_general_wallet;
                    		$wallet->save();

                    		$wallet_camp = new Wallet();
                    		$wallet_camp->user_id = $camp->user_id;
                    		$wallet_camp->camp_id = $camp->id;
                    		$wallet_camp->date = date('yy-m-d h:i:s');
                    		$wallet_camp->description = 'Charge for campaign with General wallet';
                    		$wallet_camp->operation = 'Pay for campaign';
                    		$wallet_camp->amount = $amount_to_be_considered_for_deduction_from_general_wallet;
                    		$wallet_camp->save();

                    		$camp->permission = "online";
                    		$camp->wallet += $amount_to_be_considered_for_deduction_from_general_wallet;
                    		$updateCampaign = true;
                	}
                }

            }

           if ($updateCampaign) {
           	$camp->save();
           }
        }
         $this->info('Successfully Refresh Campaign.');
    }
}
