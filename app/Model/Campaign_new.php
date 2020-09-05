<?php

namespace App\Model;

use App\Http\Controllers\Seller\QueueController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Campaign extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'product_name',
        'description',
        'category',
        'marketplace',
        'amazon_id',
        'brand_name',
        'product_id',
        'picture',
        'price',
        'rebate_price',
        'start_date',
        'start_time',
        'daily_rebates',
        'total_rebates',
        'product_url',
        'keyword1',
        'keyword2',
        'keyword3',
        'private_status',
        'chrome_status',
        'free_status',
        'permission',
        'favorite',
        'wallet',
    ];

    protected $appends = ['remaining_deals_for_the_day'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function market()
    {
        return $this->belongsTo('App\Model\Marketplace', 'marketplace', 'id');
    }

    public function getCategory()
    {
        return $this->belongsTo('App\Model\Category', 'category', 'id');
    }

    public function pic()
    {
        return $this->hasMany('App\Model\Camimage', 'cam_id', 'id');
    }

    public function getOrder()
    {
        return $this->hasMany('App\Model\Order', 'camp_id', 'id');
    }

    public function getRemainingDealsForTheDayAttribute()
    {

        $get_total_no_of_rebates_already_processed_or_in_progress = Order::where('camp_id', $this->getAttribute('id'))->whereIn('status', [
            'Waiting for purchase',
            'pre_approved',
            'approved',
            'paidout',
            'paid completed'
        ])->count();


        $daily_deals = $this->getAttribute('daily_rebates') - $this->getAttribute('daily_count');
        $total_remaining_deals = $this->getAttribute('total_rebates') - $get_total_no_of_rebates_already_processed_or_in_progress;
        $remaining_deals_for_the_day = $daily_deals;
        if ($total_remaining_deals < $daily_deals) {
            $remaining_deals_for_the_day = $total_remaining_deals;
        }

        $this->setAttribute('remaining_deals_for_the_day', (int)$remaining_deals_for_the_day);

        return (int)$remaining_deals_for_the_day;

    }

    public function approveWaitingOrders() {
        $orders = Order::where('camp_id', $this->getAttribute('id'))->whereIn('status', [
            'pre_approved',
        ])->get();
        if (count($orders)) {
            foreach ($orders as $order) {
                $request = Request::create('seller/order_change/' . $order->id . '/approved', 'GET');
                $response = app()->handle($request);
                $responseBody = $response->getContent();
            }
        }
    }
}

