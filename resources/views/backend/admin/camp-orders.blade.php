@extends('backend.admin.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Rebates</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-shopping-cart"></i> Rebates </div>

            <div class="card-body">

                <div class="table-responsive-xl">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Buyer <i class="fal fa-question-circle" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Who claimed the rebate"></i></th>
                                <th>Date Claimed</th>
                                <th>Date Confirmed</th>
                                <th>Rebate Key <i class="fal fa-question-circle" data-toggle="tooltip"
                                        data-placement="top" title=""
                                        data-original-title="What is their rebate key (order number)"></i></th>
                                <th>Payout <i class="fal fa-question-circle" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="How much will be refunded"></i></th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                        	@if(count($rebates)!=0)
                        	@foreach($rebates as $key => $order)
                        	<tr>
						        <td style="width: 30%;">
						        	{{$camp->product_name}}
					            </td>
						        <td>{{$order->getBuyer->name}}</td>
						        <td>
						            {{ date('j F, Y ', strtotime($camp->start_date)) }}<br>
						           {{$camp->start_time}} EST </td>
						        <td>
						            {{ date('j F, Y ', strtotime($order->start_time)) }}<br>
						            {{ date(' h:m ', strtotime($order->start_time)) }} EST </td>
						        <td>
						            {{$order->order_id}} </td>
						        <td>
						            <span class="text-danger">
						                ₹{{$camp->price}} <i class="fal fa-info-circle" data-toggle="tooltip" title=""
						                    data-original-title="+ $2.95 fee applied by influencerpulse"></i>
						            </span>
						        </td>
						        <td>
						            <span class="text-success">{{$order->status}}</span>
						        </td>
						    </tr>
                        	@endforeach
                        	@else
                            <tr>
                                <td colspan="7" class="text-center">
                                    No rebate claims yet. </td>
                            </tr>
                            @endif
                        </tbody>

                    </table>

                </div>


            </div>

            <div class="card-footer">
                Total cost: <b>{{$camp->price*$count}}</b> <i class="fal fa-info-circle" data-toggle="tooltip" title=""
                    data-original-title="The total cost of your campaign could be lower if some rebates are declined during approval."></i>
            </div>

        </div>

    </div>

</main>
@endsection