@extends('backend.buyer.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Purchases</li>
    </ol>
    @if (session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{ session('status') }}</div>
        </div>
    </section>
    @endif
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-shopping-cart"></i> Purchases </div>

            <div class="card-body">


                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Deals that are unclaimed">
                        <a class="nav-link active" data-toggle="tab" href="#unclaimed">Unclaimed
                            ({{$unclaimed}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Deals that have been pre-approved">
                        <a class="nav-link" data-toggle="tab" href="#pre">Pre-Approved ({{$pre_approved}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Deals that have been approved">
                        <a class="nav-link" data-toggle="tab" href="#approved">Approved ({{$approved}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="List of Orders on dispute">
                        <a class="nav-link" data-toggle="tab" href="#disputes">Disputes ({{$disputes}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Deals that have been paid out">
                        <a class="nav-link" data-toggle="tab" href="#payout">Payout ({{$payout}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Deals that have been paid out">
                        <a class="nav-link" data-toggle="tab" href="#paid_com">Paid Completed ({{$paid_com}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Deals that have been declined">
                        <a class="nav-link" data-toggle="tab" href="#declined">Declined ({{$declined}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Deals that you did not purchase">
                        <a class="nav-link" data-toggle="tab" href="#cancel">Cancelled ({{$cancelled}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of Deals that you did not purchase">
                        <a class="nav-link" data-toggle="tab" href="#resolved">Dispute Resolved ({{count($resolves)}})</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="unclaimed" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                        <th>Time left</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($unclaimed != 0)
                                        @foreach($orders as $order)
                                        @if($order->status == 'Waiting for purchase')
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 45%;">{{$order->getCamp->product_name}}</td>
                                            
                                             <td>
                                                ₹{{$order->getCamp->price}}
                                            </td>
                                            <td>
                                                ₹{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-info">{{$order->status}}</span>
                                            </td>
                                            <td id="time_out">
                                                <?php 
                                                $second=3599-strtotime($current)+strtotime($order->start_time);
                                                echo date('H:i:s',$second); 
                                                ?>
                                               
                                            </td>
                                            <td>
                                                <a href="{{route('buyer.again_confirm', $order->id)}}" class="btn btn-danger btn-block" style="color:white;"
                                                    data-modal-size="modal-xl">
                                                    Confirm Purchase </a>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                No unclaimed purchases yet. 
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="pre" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Order ID</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($pre_approved != 0)
                                        @foreach($orders as $order)
                                        @if($order->status == 'pre_approved')
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 50%;">{{$order->getCamp->product_name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                ₹{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <td>
                                                

                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No purchases waiting for approval yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Order ID</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($approved != 0)
                                        @foreach($orders as $order)
                                        @if($order->status == 'approved')
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 50%;">{{$order->getCamp->product_name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                ₹{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No purchases waiting for approval yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="disputes" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Order ID</th>
                                        <th>Payout</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($disputes != 0)
                                        @foreach($orders as $order)
                                        @if($order->status == 'disputed')
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 50%;">{{$order->getCamp->product_name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                ₹{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->dis_reason}}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No issues yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="payout" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Provided on</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($payout != 0)
                                        @foreach($orders as $order)
                                        @if($order->status == 'paidout')
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 50%;">{{$order->getCamp->product_name}}</td>
                                            <td>
                                                ₹{{$order->getCamp->price}}</td>
                                             <td>
                                                ₹{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                            </td>
                                            <td>
                                                {{$order->getCamp->user->name}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No payouts yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>


                    <div class="tab-pane fade" id="paid_com" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Provided on</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($paid_com != 0)
                                        @foreach($orders as $order)
                                        @if($order->status == 'paid completed')
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 50%;">{{$order->getCamp->product_name}}</td>
                                            <td>
                                                ₹{{$order->getCamp->price}}</td>
                                             <td>
                                                ₹{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                            </td>
                                            <td>
                                                {{$order->getCamp->user->name}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No Paid completed yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="declined" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($declined != 0)
                                        @foreach($orders as $order)
                                        @if($order->status == 'Declined')
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 50%;">{{$order->getCamp->product_name}}</td>
                                            <td>
                                                ₹{{$order->getCamp->price}}</td>
                                             <td>
                                                ₹{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                                <a class="btn btn-danger btn-block  dispute-modal"
                                                    data-toggle="modal"
                                                    data-target="#dispute-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                    href="" 
                                                        >
                                                        <!-- href="{{route('order.change',
                                                        array('id' =>  $order->id, 'state' => 'disputes' ))}}" -->
                                                    Rise dispute </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No purchases yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($cancelled != 0)
                                        @foreach($orders as $order)
                                        @if(($order->status == 'Expired') || ($order->status == 'Cancelled'))
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 50%;">{{$order->getCamp->product_name}}</td>
                                            <td>
                                                <small class="text-danger strikethrough">₹{{$order->getCamp->price}}</small>
                                                <span class="text-success">₹{{$order->getCamp->rebate_price}}</span><br>
                                                <small>₹{{round((1-$order->getCamp->rebate_price/$order->getCamp->price)*10000)/100}}% OFF</small>
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center">
                                            No expired purchases yet. </td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="resolved" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Seller</th>
                                        <th>Order ID</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($resolves) != 0)
                                        @foreach($resolves as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp->product_name}}</td>
                                            <td>
                                                {{$order->getCamp->user->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                ₹{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                            </td>
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
                                            <!-- <td>
                                                <div class="dropdown">
                                                    <button data-e2e="btn-actions"
                                                        class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                        id="actions-menu" data-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="actions-menu">
                                                        
                                                        <a class="dropdown-item msg-class" data-toggle="modal"
                                                        data-target="#msg-modal"
                                                        data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
                                                        data-type="seller" href="">
                                                        Message Seller </a>

                                                        <a class="dropdown-item msg-class" data-toggle="modal"
                                                        data-target="#msg-modal" data-type="buyer"
                                                        data-id="{{$order->id}}" data-to="{{$order->getBuyer->name}}"
                                                        href="">
                                                        Message Buyer </a>

                                                                                           

                                                       
                                                    </div>
                                                           
                                                </div>


                                                <div class="dropdown">
                                                    <button data-e2e="btn-actions"
                                                        class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                        id="actions-menu" data-toggle="dropdown">
                                                        Decision
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="actions-menu">
                                                        
                                                        <a class="dropdown-item"
                                                        data-id="{{$order->id}}"
                                                        data-type="seller" href="">
                                                        Victory Seller </a>

                                                        <a class="dropdown-item"
                                                        data-id="{{$order->id}}"
                                                        href="">
                                                        Victory Buyer </a>
                                                    </div>
                                                           
                                                </div>
                                                
                                            </td> -->
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No issues yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- message modal -->
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

                    <form id="write-message-form" method="post" action="{{route('buyer.msg_store')}}"
                        enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                        @csrf
                        <button
                            type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

                        <input type="hidden" name="order_id" id="order_id" value="">
                        <input type="hidden" name="action" id="action" value="write">

                        <div class="form-group fv-has-feedback">
                            <label for="message" class="form-control-label">Message</label>
                            <div class="controls">
                                <textarea data-e2e="message" name="message" id="message" class="form-control md-textarea" autofocus="" data-fv-field="message">
                                        
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
                    $(".msg-class").click(function(){
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
    <!-- message modal end -->

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
                        action="{{route('buyer.dispute')}}"
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

</main>
@endsection