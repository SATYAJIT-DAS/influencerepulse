@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Orders Queue</li>
    </ol>
     @if (session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{ session('status') }}</div>
        </div>
    </section>
    @endisset

    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-percent"></i> Deal Queue </div>

            <div class="card-body">


               <!--  <form method="get">

                    <div class="input-group mb-5">
                        <label class="sr-only" for="search">Search buyer per rebate key / rebate ID / name /
                            email address</label>
                        <input type="text" class="form-control" id="search" name="search" value=""
                            placeholder="Search buyer per rebate key / rebate ID / name / email address">
                        <div class="input-group-append">
                            <button class="btn btn-light" type="submit">
                                <i class="fal fa-search"></i>
                            </button>
                        </div>
                    </div>

                </form> -->

                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Deals pending approval">
                        <a class="nav-link active" data-toggle="tab" id="approval-tab" href="#approval" role="tab"
                            aria-controls="approval">Needs Approval ({{count($need_apps)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Order that are on dispute">
                        <a class="nav-link" data-toggle="tab" id="issue-tab" href="#disputes"
                            role="tab" aria-controls="issue">Disputes ({{count($disputes)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Order that have been pre-approved">
                        <a class="nav-link" data-toggle="tab" id="pre-approved-tab" href="#recent"
                            role="tab" aria-controls="pre-approved">Recent Deals ({{count($recents)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="List of approved Order">
                        <a class="nav-link" data-toggle="tab" id="approved-tab" href="#approved"
                            role="tab" aria-controls="approved">Approved ({{count($approveds)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Order that have been paid out">
                        <a class="nav-link" data-toggle="tab" id="checked-tab" href="#paid_out"
                            role="tab" aria-controls="checked">Paid out ({{count($paids)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="List of declined Order">
                        <a class="nav-link" data-toggle="tab" id="declined-tab" href="#declined"
                            role="tab" aria-controls="declined">Declined ({{count($declineds)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="List of declined Order">
                        <a class="nav-link" data-toggle="tab" id="resolved-tab" href="#resolved"
                            role="tab" aria-controls="resolved">Dispute Resolved ({{count($resolved)}})</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="approval" role="tabpanel" aria-labelledby="pending-tab">

                        <div
                            class="alert alert-info text-center text-lg-left d-lg-flex justify-content-between align-items-center mt-2">

                            <div>
                                <i class="fal fa-info-circle"></i> Deals are automatically per-approved and hold initially 15 days. So that the buyer/shopper doesn't return the purchased product and gets the deal at the same time. After those 15 days, you have 2 days to approve the deal(if you fail to approve deal we will automatically proceed the payout). If there is any problem, you can start a dispute about the deal. Once approved and 17 days past, the shopper will receive a payout for this purchase.
                            </div>


                        </div>

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Campaign</th>
                                        <th>Buyer <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="Who claimed the Deal"></i></th>
                                        <th>Purchased Time</th>
                                        <th>Order Id <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="What is their Order Id (order number)"></i></th>
                                        <th>Payout <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="How much will be refunded"></i></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($need_apps) !=0)
                                    @foreach($need_apps as $key => $order)
                                    @if($order->getCamp->user->id == Auth()->user()->id)
                                    <tr>
                                        <td>{{$order->id}}</td>

                                        <td>@if($order->getCamp->pic)
                                            <img alt="product name" src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}"
                                                width="100">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif</td>
                                        <td>{{$order->getCamp->product_name}} </td>
                                        <td>{{$order->getBuyer->name}} </td>
                                        <td>{{ date('j F, Y ', strtotime($order->start_time)) }}<br>
                                            {{ date('h:m ', strtotime($order->start_time)) }} EST</td>
                                        <td>{{$order->order_id}} </td>
                                        <td><small>
                                                {{round((100-$order->getCamp->rebate_price/$order->getCamp->price*100)*100)/100}}% OFF </small></td>
                                        <td><button data-e2e="btn-actions"
                                                class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                id="actions-menu" data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="actions-menu">
                                                <a class="dropdown-item"
                                                    href="{{route('order.change',
                                                        array('id' =>  $order->id, 'state' => 'approved' ))}}">
                                                    Approve
                                                </a>

                                                <a class="dropdown-item"
                                                    href="{{route('order.change',
                                                        array('id' =>  $order->id, 'state' => 'Declined' ))}}">
                                                    Decline
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No Order waiting for approval yet. </td>
                                    </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="disputes" role="tabpanel" aria-labelledby="pending-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Buyer <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="Who claimed the Deal"></i></th>
                                        <th>Order Id <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="What is their Order Id (order number)"></i></th>
                                        <th>Payout <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="How much will be refunded"></i></th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($disputes) !=0)
                                    @foreach($disputes as $key => $order)
                                    @if($order->getCamp->user->id == Auth()->user()->id)
                                    <tr>
                                        <td>{{$order->id}}</td>

                                        <td>@if($order->getCamp->pic)
                                            <img alt="product name" src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}"
                                                width="100">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif</td>
                                        <td>{{$order->getCamp->product_name}} </td>
                                        <td>{{$order->getBuyer->name}} </td>
                                        <td>{{$order->order_id}} </td>
                                        <td><small>
                                                {{round((100-$order->getCamp->rebate_price/$order->getCamp->price*100)*100)/100}}% OFF </small></td>
                                        <td>₹{{$order->dis_reason}} </td>
                                        <td>
                                            <a class="btn btn-primary btn-block msg-btn" data-toggle="modal"
                                                    data-target="#msg-modal" data-id="{{$order->id}}" style="color: white;" 
                                                    data-to="{{$order->getBuyer->name}}">
                                                    Message Buyer </a>
                                            <a class="btn btn-dark btn-block"
                                                href="{{route('seller.discussion',$order->id)}}">
                                                View Discussion </a>

                                            <a class="btn btn-danger btn-block"
                                                    data-id="{{$order->id}}" href="{{route('seller_resolve', $order->id)}}">
                                                    Resolve </a>

                                                                         
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No order waiting for approval yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <!-- <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="pending-tab">

                        <div
                            class="alert alert-info text-center text-lg-left d-lg-flex justify-content-between align-items-center mt-2">

                            <div>
                                <i class="fal fa-info-circle"></i> Below is the list of latest deals claimed by buyers for your campaigns online.
                            </div>


                        </div>

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Campaign</th>
                                        <th>Buyer <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="Who claimed the Deal"></i></th>
                                        <th>Order Id <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="What is their Order Id key (order number)"></i></th>
                                        <th>Payout <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="How much will be refunded"></i></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No Order waiting for approval yet. </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>


                    </div> -->

                    <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="pending-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Campaign</th>
                                        <th>Buyer <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="Who claimed the Order Id"></i></th>
                                        <th>Order Id <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="What is their Order Id key (order number)"></i></th>
                                        <th>Payout <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="How much will be refunded"></i></th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($approveds) !=0)
                                    @foreach($approveds as $key => $order)
                                    @if($order->getCamp->user->id == Auth()->user()->id)
                                    <tr>
                                        <td>{{$order->id}}</td>

                                        <td>@if($order->getCamp->pic)
                                            <img alt="product name" src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}"
                                                width="100">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif</td>
                                        <td>{{$order->getCamp->product_name}} </td>
                                        <td>{{$order->getBuyer->name}} </td>
                                        <td>{{$order->order_id}} </td>
                                        <td><small>
                                                {{round((100-$order->getCamp->rebate_price/$order->getCamp->price*100)*100)/100}}% OFF </small> </td>
                                        <td>₹{{$order->status}} </td>
                                        <td>
                                            <button data-e2e="btn-actions"
                                                class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                id="actions-menu" data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="actions-menu">
                                                <a class="dropdown-item"
                                                    href="{{route('order.change',
                                                        array('id' =>  $order->id, 'state' => 'paidout' ))}}">
                                                    Pay Out
                                                </a>

                                                <a class="dropdown-item"
                                                    href="{{route('order.change',
                                                        array('id' =>  $order->id, 'state' => 'Declined' ))}}">
                                                    Decline 
                                                </a>

                                                <a class="btn btn-danger btn-block  dispute-modal"
                                                    data-toggle="modal"
                                                    data-target="#dispute-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getBuyer->name}}"
                                                    href="">
                                                    Rise Dispute </a>
                                                </a>
                                            </div>
                                            <a class="btn btn-primary btn-block msg-btn" data-toggle="modal"
                                                data-target="#msg-modal" data-id="{{$order->id}}" style="color: white; margin-top: 10px;" 
                                                data-to="{{$order->getBuyer->name}}">
                                                Message Buyer </a>
                                    </td>
                                        
                                    </tr>
                                    @endif
                                    @endforeach
                                   
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No Order waiting for approval yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>


                    <div class="tab-pane fade" id="paid_out" role="tabpanel" aria-labelledby="pending-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Campaign</th>
                                        <th>Buyer <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="Who claimed the Deal"></i></th>
                                        <th>Order Id <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="What is their Order Id key (order number)"></i></th>
                                        <th>Payout <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="How much will be refunded"></i></th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($paids) != 0)
                                    @foreach($paids as $key => $order)
                                    @if($order->getCamp->user->id == Auth()->user()->id)
                                    <tr>
                                        <td>{{$order->id}}</td>

                                        <td>@if($order->getCamp->pic)
                                            <img alt="product name" src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}"
                                                width="100">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif</td>
                                        <td>{{$order->getCamp->product_name}} </td>
                                        <td>{{$order->getBuyer->name}} </td>
                                        <td>{{$order->order_id}} </td>
                                        <td><small>
                                                {{round((100-$order->getCamp->rebate_price/$order->getCamp->price*100)*100)/100}}% OFF </small> </td>
                                        <td class="text-primary">{{$order->status}} </td>
                                        
                                        
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No Order waiting for approval yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>


                    <div class="tab-pane fade" id="declined" role="tabpanel" aria-labelledby="pending-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Campaign</th>
                                        <th>Buyer <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="Who claimed the Deal"></i></th>
                                        <th>Order Id <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="What is their Order Id key (order number)"></i></th>
                                        <th>Payout <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="How much will be refunded"></i></th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($declineds) !=0)
                                    @foreach($declineds as $key => $order)
                                    @if($order->getCamp->user->id == Auth()->user()->id)
                                    <tr>
                                        <td>{{$order->id}}</td>

                                        <td>@if($order->getCamp->pic)
                                            <img alt="product name" src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}"
                                                width="100">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif</td>
                                        <td>{{$order->getCamp->product_name}} </td>
                                        <td>{{$order->getBuyer->name}} </td>
                                        <td>{{$order->order_id}} </td>
                                        <td><small>
                                                {{round((100-$order->getCamp->rebate_price/$order->getCamp->price*100)*100)/100}}% OFF </small></td>
                                        <td class="text-danger">{{$order->status}} </td>
                                        <td>
                                            <button data-e2e="btn-actions"
                                                class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                id="actions-menu" data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="actions-menu">
                                                <a class="dropdown-item"
                                                    href="{{route('order.change',
                                                        array('id' =>  $order->id, 'state' => 'approved' ))}}">
                                                    Approve
                                                </a>

                                                <a class="btn btn-danger btn-block  dispute-modal"
                                                    data-toggle="modal"
                                                    data-target="#dispute-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getBuyer->name}}"
                                                    href="" 
                                                        >
                                                       
                                                    Rise Dispute </a>
                                                </a>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No Order waiting for approval yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>
                    <div class="tab-pane fade" id="resolved" role="tabpanel" aria-labelledby="pending-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Buyer</th>
                                        <th>Order Id</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($resolved) !=0)
                                    @foreach($resolved as $key => $order)
                                    @if($order->getCamp->user->id == Auth()->user()->id)
                                    <tr>
                                        <td>{{$order->id}}</td>

                                        <td>@if($order->getCamp->pic)
                                            <img alt="product name" src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}"
                                                width="100">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif</td>
                                        <td>{{$order->getCamp->product_name}} </td>
                                        <td>{{$order->getBuyer->name}} </td>
                                        <td>{{$order->order_id}} </td>
                                        <td><small>
                                                {{round((100-$order->getCamp->rebate_price/$order->getCamp->price*100)*100)/100}}% OFF </small></td>
                                        <td>
                                            <span class="text-danger">Resolved</span>
                                        </td>
                                        <td>
                                            @if($order->status=='vic_buyer')
                                            Buyer Victory
                                            @elseif($order->status=='vic_seller')
                                            Seller Victory
                                            @endif
                                        </td>
                                        
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            No issues yet.  </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-calendar"></i> Deals Export </div>

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-xl-6">
                        <i class="fal fa-info-circle"></i>
                        Use this form to export Orders on a weekly/monthly basis or just pick a
                        customized date range. </div>

                    <div class="col-xl-6">

                        <form id="rebates-export-form" method="get"
                            action="#">
                            <input type="hidden" name="action" value="download">
                            <div class="row align-items-end">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="start-date">
                                            Start date </label>
                                        <div class="controls">
                                            <input placeholder="Start date" type="text" value="Dec 21, 2019"
                                                class="form-control" data-toggle="datepicker" id="start-date"
                                                name="start_date" />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="end-date">
                                            End date </label>
                                        <div class="controls">
                                            <input placeholder="End date" type="text" value="Jan 21, 2020"
                                                class="form-control" data-toggle="datepicker" id="end-date"
                                                name="end_date" />
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fal fa-download"></i> Generate Export </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>
            <!-- dispute modal -->
        <div class="modal fade" id="dispute-modal" tabindex="-1" role="dialog"
                style="padding-right: 17px; display: none;" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header align-items-center">

                        <h5 class="modal-title">Dispute to <b id="modal_title_dis"></b></h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times" aria-hidden="true"></i>
                        </button>

                    </div>

                    <div class="modal-body">

                        <form id="write-message-form" method="post" 
                            action="{{route('seller.dispute')}}"
                            enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                            @csrf
                            <button
                                type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

                            <input type="hidden" name="order_id" id="order_id_dis" value="">
                            <input type="hidden" name="action" id="action" value="write">

                            <div class="form-group fv-has-feedback">
                                <label for="message" class="form-control-label">Reason</label>
                                <div class="controls">
                                    <textarea data-e2e="message" name="reason" id="reason" class="form-control md-textarea" autofocus="" data-fv-field="message">
                                            
                                    </textarea>
                                    <i style=""
                                    class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="message"></i>
                                </div>
                                <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                    data-fv-for="message" data-fv-result="NOT_VALIDATED">The message is required.</small>
                            </div>

                            <div class="row align-items-center mb-4">

                                <div class="col-6">
                                    You can attach a file to your message. Images and PDF files are allowed. Maximum size 20MB.
                                </div>

                                <div class="col-6">

                                    <div class="form-group">
                                        <label class="sr-only" for="attachment">Attach a file</label>
                                        <input type="file" class="form-control-file w-100" id="attachment" name="attachment">
                                    </div>

                                </div>

                            </div>

                            <button data-e2e="send-message" class="btn btn-danger btn-block btn-lg" type="submit">
                                Send Dispute </button>

                        </form>

                    </div>

                    <script>
                    $(function() {
                        $(".dispute-modal").click(function(){
                            order_id=$(this).data('id');
                            to=$(this).data('to');
                            console.log("sadf",order_id,to)
                            $("#modal_title_dis").html(to);
                            $("#order_id_dis").val(order_id);
                        })

                        $('#write-message-form').on('init.field.fv', function(e, data) {
                            const $icon = data.element.data('fv.icon'),
                                options = data.fv.getOptions(), // Entire options
                                validators = data.fv.getOptions(data.field).validators; // The field validators

                            if (validators.notEmpty && options.icon && options.icon.required) {
                                $icon.addClass(options.icon.required).show();
                            }
                        }).formValidation({
                            framework: 'bootstrap4',
                            icon: {
                                required: 'fal fa-asterisk',
                                valid: 'fal fa-check',
                                invalid: 'fal fa-times',
                                validating: 'fal fa-refresh'
                            },
                            addOns: {
                                mandatoryIcon: {
                                    icon: 'fal fa-asterisk'
                                }
                            },
                            fields: {
                                'message': {
                                    validators: {
                                        notEmpty: {
                                            message: 'The message is required.'
                                        }
                                    }
                                }
                            }
                        });

                    });
                    </script>
                </div>
            </div>
        </div>
        <!-- dispute modal end -->

        <script>
        $(function() {

            $('[data-toggle=datepicker]').pickadate({
                format: 'mmm d, yyyy',
                formatSubmit: 'mmm d, yyyy'
            });

        });
        </script>
    </div>

    <div class="modal fade" id="msg-modal" tabindex="-1" role="dialog"
            style="padding-right: 17px; display: none;" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header align-items-center">

                        <h5 class="modal-title">Write a message to <b id="modal_title"></b></h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times" aria-hidden="true"></i>
                        </button>

                    </div>

                    <div class="modal-body">

                        <form id="write-message-form" method="post" action="{{route('seller.msg_store')}}"
                            enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                            @csrf
                            <button
                                type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

                            <input type="hidden" name="order_id" id="order_id" value="">
                            <input type="hidden" name="action" id="action" value="write">

                            <div class="form-group fv-has-feedback">
                                <label for="message" class="form-control-label">Message</label>
                                <div class="controls">
                                    <textarea data-e2e="message" name="message" id="message" class="form-control md-textarea"
                                        autofocus="" data-fv-field="message">
                                            
                                        </textarea>
                                        <i style=""
                                        class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="message"></i>
                                </div>
                                <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                    data-fv-for="message" data-fv-result="NOT_VALIDATED">The message is required.</small>
                            </div>

                            <div class="row align-items-center mb-4">

                                <div class="col-6">
                                    You can attach a file to your message. Images and PDF files are allowed. Maximum size 20MB.
                                </div>

                                <div class="col-6">

                                    <div class="form-group">
                                        <label class="sr-only" for="attachment">Attach a file</label>
                                        <input type="file" class="form-control-file w-100" id="attachment" name="attachment">
                                    </div>

                                </div>

                            </div>

                            <button data-e2e="send-message" class="btn btn-primary btn-block btn-lg" type="submit">
                                Send Message </button>

                        </form>

                    </div>

                    <script>
                    $(function() {

                        $.ajax({
                            url:"{{route('seller-msgread')}}",
                            dataType:"json",
                            method:"post",
                            data:{
                                "_token":"{{csrf_token()}}",
                            },
                            success:function(result){
                                console.log(result);
                            },
                            error: function(e){
                                console.log(e);
                            }
                        })


                        $(".msg-btn").click(function(){
                            order_id=$(this).data('id');
                            to=$(this).data('to');
                            console.log("sadf",order_id,to)
                            $("#modal_title").html(to);
                            $("#order_id").val(order_id);


                        })





                        $('#write-message-form').on('init.field.fv', function(e, data) {
                            const $icon = data.element.data('fv.icon'),
                                options = data.fv.getOptions(), // Entire options
                                validators = data.fv.getOptions(data.field).validators; // The field validators

                            if (validators.notEmpty && options.icon && options.icon.required) {
                                $icon.addClass(options.icon.required).show();
                            }
                        }).formValidation({
                            framework: 'bootstrap4',
                            icon: {
                                required: 'fal fa-asterisk',
                                valid: 'fal fa-check',
                                invalid: 'fal fa-times',
                                validating: 'fal fa-refresh'
                            },
                            addOns: {
                                mandatoryIcon: {
                                    icon: 'fal fa-asterisk'
                                }
                            },
                            fields: {
                                'message': {
                                    validators: {
                                        notEmpty: {
                                            message: 'The message is required.'
                                        }
                                    }
                                }
                            }
                        });

                    });
                    </script>
                </div>
            </div>
        </div>


</main>
@endsection