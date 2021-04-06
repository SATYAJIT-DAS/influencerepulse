@extends('backend.admin.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Order Manage</li>
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
                <i class="fal fa-shopping-cart"></i> Order Manage </div>

            <div class="card-body">

                <form method="post" action="{{route('order-search')}}">
                    @csrf

                    @empty($tab)
                    <input type="hidden" name="tab_name" id='tab-name' value="disputed">
                    @endempty

                    @isset($tab)
                    <input type="hidden" name="tab_name" id='tab-name' value="{{$tab}}">
                    @endisset
                    <div class="input-group mb-5">

                        @empty($search)
                        <input type="text" class="form-control" name="search" value=""
                            placeholder="Search order id" />
                        @endempty

                        @isset($search)
                        <input type="text" class="form-control" name="search" value="{{$search}}"
                            placeholder="Search order id" />
                        @endisset
                        <div class="input-group-append">
                            <button class="btn btn-light" type="submit">
                                <i class="fal fa-search"></i>
                            </button>
                        </div>
                    </div>

                </form>


                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of rebates that are unclaimed">
                        <a class="nav-link " data-toggle="tab" href="#preapproved" data-id='preapproved' id='preapproved-tab'>Pre Approved
                            ({{count($preapps)}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of rebates that are unclaimed">
                        <a class="nav-link " data-toggle="tab" href="#approved" data-id='approved' id='approved-tab'>Approved
                            ({{count($apps)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of rebates that are unclaimed">
                        <a class="nav-link " data-toggle="tab" href="#paidout" data-id='paidout' id='paidout-tab'>Paid Out
                            ({{count($paidouts)}})</a>
                    </li>

                     <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of rebates that are unclaimed">
                        <a class="nav-link " data-toggle="tab" href="#paid_com" data-id='paid_com' id='paid_com-tab'>Paid Completed
                            ({{count($paid_com)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="List of rebates on dispute">
                        <a class="nav-link " data-toggle="tab" href="#declines" data-id='declines' id='declines-tab'>Declined ({{count($declines)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="List of rebates on dispute">
                        <a class="nav-link active" data-toggle="tab" href="#disputed" data-id='disputed' id='disputed-tab'>Disputes ({{count($disputes)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of rebates that are unclaimed">
                        <a class="nav-link" data-toggle="tab" href="#resolution" data-id='resolution' id='resolution-tab'>Disputes Resolved
                            ({{count($resolves)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="List of rebates on dispute">
                        <a class="nav-link active" data-toggle="tab" href="#cancelled" data-id='cancelled' id='cancelled-tab'>Cancelled ({{count($cancelled)}})</a>
                    </li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade" id="preapproved" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Seller</th>
                                        <th>Buyer</th>
                                        <th>Rebate Key</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($preapps) != 0)
                                        @foreach($preapps as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp()->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp()->product_name}}</td>
                                            <td>
                                                {{$order->getCamp()->user->name}}</td>
                                            <td>
                                                {{$order->getBuyer->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                {{ dynamicCurrency() }}{{$order->getCamp()->price-$order->getCamp()->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <!-- <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp()->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td> -->
                                        </tr>
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
                                        <th>Seller</th>
                                        <th>Buyer</th>
                                        <th>Rebate Key</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($apps) != 0)
                                        @foreach($apps as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp()->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp()->product_name}}</td>
                                            <td>
                                                {{$order->getCamp()->user->name}}</td>
                                         	<td>
                                                {{$order->getBuyer->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                {{ dynamicCurrency() }}{{$order->getCamp()->price-$order->getCamp()->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <!-- <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp()->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td> -->
                                        </tr>
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

                    <div class="tab-pane fade" id="paidout" role="tabpanel" aria-labelledby="paidout-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Seller</th>
                                        <th>Buyer</th>
                                        <th>Rebate Key</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($paidouts) != 0)
                                        @foreach($paidouts as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp()->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp()->product_name}}</td>
                                            <td>
                                                {{$order->getCamp()->user->name}}</td>
                                            <td>
                                                {{$order->getBuyer->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                {{ dynamicCurrency() }}{{$order->getCamp()->price-$order->getCamp()->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-block transaction-class" data-toggle="modal"
                                                    data-target="#transaction-modal"
                                                    data-order="{{$order}}" data-buyer="{{$order->getBuyer->name}}"
                                                    data-amount="{{$order->getCamp()->price-$order->getCamp()->rebate_price}}"
                                                    href="">
                                                    Pay Now
                                                </a>
                                            </td>

                                            <!-- <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp()->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td> -->
                                        </tr>
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

                    <div class="tab-pane fade" id="paid_com" role="tabpanel" aria-labelledby="paid_com-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Seller</th>
                                        <th>Buyer</th>
                                        <th>Rebate Key</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($paid_com) != 0)
                                        @foreach($paid_com as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp()->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp()->product_name}}</td>
                                            <td>
                                                {{$order->getCamp()->user->name}}</td>
                                            <td>
                                                {{$order->getBuyer->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                {{ dynamicCurrency() }}{{$order->getCamp()->price-$order->getCamp()->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>


                                            <!-- <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp()->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td> -->
                                        </tr>
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

                    <div class="tab-pane fade" id="declines" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Seller</th>
                                        <th>Buyer</th>
                                        <th>Rebate Key</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($declines) != 0)
                                        @foreach($declines as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp()->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp()->product_name}}</td>
                                            <td>
                                                {{$order->getCamp()->user->name}}</td>
                                            <td>
                                                {{$order->getBuyer->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                {{ dynamicCurrency() }}{{$order->getCamp()->price-$order->getCamp()->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <!-- <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp()->user->name}}"
                                                    href="">
                                                    Message Seller </a>
                                                <a class="btn btn-dark btn-block"
                                                    href="{{route('buyer.discussion',$order->id)}}">
                                                    View Discussion </a>
                                            </td> -->
                                            <td>
                                                <a class="btn btn-primary btn-block"
                                                    href="{{route('order.change',
                                                        array('id' =>  $order->id, 'state' => 'approved' ))}}">
                                                    Approve
                                                </a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            No purchases waiting for approval yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade show active" id="disputed" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Seller</th>
                                        <th>Buyer</th>
                                        <th>Rebate Key</th>
                                        <th>Payout</th>
                                        <th>Reason</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($disputes) != 0)
                                        @foreach($disputes as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp()->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp()->product_name}}</td>
                                            <td>
                                                {{$order->getCamp()->user->name}}</td>
                                         	<td>
                                                {{$order->getBuyer->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                {{ dynamicCurrency() }}{{$order->getCamp()->price-$order->getCamp()->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->dis_reason}}</span>
                                            </td>
                                            <td>
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
                                                        data-id="{{$order->id}}" data-to="{{$order->getCamp()->user->name}}"   data-toid="{{$order->getCamp()->user->id}}"
                                                        data-type="seller" href="">
                                                        Message Seller </a>

                                                        <a class="dropdown-item msg-class" data-toggle="modal"
                                                        data-target="#msg-modal" data-type="buyer" data-toid="{{$order->getBuyer->id}}"
                                                        data-id="{{$order->id}}" data-to="{{$order->getBuyer->name}}"
                                                        href="">
                                                        Message Buyer </a>

                                                       <!-- <a class="dropdown-item msg-class"
                                                            href="{{route('order.change',
                                                                array('id' =>  $order->id, 'state' => 'approved' ))}}">
                                                            Approve
                                                        </a> -->




                                                    </div>

                                                </div>


                                                <div class="dropdown">
                                                    <button data-e2e="btn-actions"
                                                        class="btn btn-danger btn-block dropdown-toggle" type="button"
                                                        id="actions-menu" data-toggle="dropdown">
                                                        Decision
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="actions-menu">

                                                        <a class="dropdown-item"
                                                        data-id="{{$order->id}}"
                                                        data-type="seller"
                                                        href="{{route('resolve',['order_id' => $order->id, 'status' => 'vic_seller'])}}">
                                                        Victory Seller </a>

                                                        <a class="dropdown-item"
                                                        data-id="{{$order->id}}" href="{{route('resolve',['order_id' => $order->id, 'status' => 'vic_buyer'])}}">
                                                        Victory Buyer </a>
                                                    </div>

                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            No issues yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="resolution" role="tabpanel" aria-labelledby="new-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Seller</th>
                                        <th>Buyer</th>
                                        <th>Rebate Key</th>
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
                                                <img src="{{asset('public/images/'.$order->getCamp()->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp()->product_name}}</td>
                                            <td>
                                                {{$order->getCamp()->user->name}}</td>
                                            <td>
                                                {{$order->getBuyer->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                {{ dynamicCurrency() }}{{$order->getCamp()->price-$order->getCamp()->rebate_price}}
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

                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            No issues yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade show active" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Seller</th>
                                        <th>Buyer</th>
                                        <th>Rebate Key</th>
                                        <th>Payout</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($cancelled) != 0)
                                        @foreach($cancelled as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp()->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp()->product_name}}</td>
                                            <td>
                                                {{$order->getCamp()->user->name}}</td>
                                            <td>
                                                {{$order->getBuyer->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                {{ dynamicCurrency() }}{{$order->getCamp()->price-$order->getCamp()->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->dis_reason}}</span>
                                            </td>
                                            <td>
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
                                                        data-id="{{$order->id}}" data-to="{{$order->getCamp()->user->name}}"
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
                                                        class="btn btn-danger btn-block dropdown-toggle" type="button"
                                                        id="actions-menu" data-toggle="dropdown">
                                                        Decision
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="actions-menu">

                                                        <a class="dropdown-item time-class" data-id="{{$order->id}}" data-toggle="modal"
                                                        data-target="#time-delay" href="">
                                                        Time Delay </a>

                                                    </div>

                                                </div>

                                            </td>
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

                    <form id="write-message-form" method="post" action="{{route('admin.dispute')}}"
                        enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                        @csrf
                        <button
                            type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

                        <input type="hidden" name="msg_order_id" id="msg_order_id">
                    <input type="hidden" name="msg_to_user" id="msg_to_user">

                        <input type="hidden" name="msg_type" id="msg_type">


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
                        to_id=$(this).data('toid');
                        type=$(this).data('type');
                        console.log("sadf",order_id,to,type,to_id)
                        $("#modal_title").html(to);
                        $("#msg_order_id").val(order_id);
                        $("#msg_type").val(type);
                        $("#msg_to_user").val(to_id);

                        //$("#type").val(type);
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




    <div class="modal fade" id="time-delay" tabindex="-1" role="dialog"
        style="padding-right: 17px; display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header align-items-center">

                    <h5 class="modal-title">Time Reset<b id="modal_title"></b></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>

                </div>

                <div class="modal-body">

                    <form id="write-message-form" method="post" action="{{route('left_time_delay')}}"
                        enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                        @csrf
                        <button
                            type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

                        <input type="hidden" name="order_id" id="order_id_time" value="">

                        <div class="form-group fv-has-feedback">
                            <label for="message" class="form-control-label">Left Time</label>
                            <div class="controls">
                                <select class="form-control" name="left_time" id="left_time">
                                    <?php
                                        for ($i=1; $i < 6; $i++) {
                                           echo "<option value=".$i.">".$i."h</option>";
                                        }
                                    ?>
                                </select>
                                <i style=""
                                class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="message"></i>
                            </div>
                            <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                data-fv-for="message" data-fv-result="NOT_VALIDATED">The field is required.</small>
                        </div>

                        <button data-e2e="send-message" class="btn btn-primary btn-block btn-lg" type="submit">
                            Time Reset </button>

                    </form>

                </div>

                <script>
                function time_init(order_id){
                    $("#order_id_time").val(order_id);
                }
                $(function() {
                    $(".time-class").click(function(){
                        order_id=$(this).data('id');
                        console.log(order_id);
                        time_init(order_id);
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

    <!-- transaction modal -->
    <div class="modal fade" id="transaction-modal" tabindex="-1" role="dialog"
        style="padding-right: 17px; display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header align-items-center">

                    <h5 class="modal-title"><b id="transaction_title"></b> Transaction Write</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>

                </div>

                <div class="modal-body">

                    <form id="write-transaction-form" method="post" action="{{route('transaction.store')}}"
                        enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                        @csrf
                        <button
                            type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

                        <input type="hidden" name="order_id" id="tran-order-id" value="">

                        <div class="form-group fv-has-feedback">
                            <label for="message" class="form-control-label">Amount</label>
                            <div class="controls">
                                <input type="text" class="form-control" id="transaction_amount" name="amount" required>
                                <i style=""
                                class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="message"></i>
                            </div>
                            <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                data-fv-for="message" data-fv-result="NOT_VALIDATED">The amount is required.</small>
                        </div>

                        <div class="form-group fv-has-feedback">
                            <label for="message" class="form-control-label">Payment Method</label>
                            <div class="controls">
                                <input type="text" class="form-control" name="payment_method" required>
                                <i style=""
                                class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="message"></i>
                            </div>
                            <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                data-fv-for="message" data-fv-result="NOT_VALIDATED">The Payment Method is required.</small>
                        </div>

                        <button data-e2e="send-message" class="btn btn-primary btn-block btn-lg" type="submit">
                            Save </button>

                    </form>

                </div>

                <script>
                $(function() {
                    $(".transaction-class").click(function(){

                        order=$(this).data('order');
                        order_id=order['id'];
                        buyer=$(this).data('buyer');
                        amount=$(this).data('amount');

                        $("#transaction_amount").val(amount);

                        $("#transaction_title").html(buyer);

                        $("#tran-order-id").val(order_id);

                    })


                    $('#write-transaction-form').on('init.field.fv', function(e, data) {
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
                            'amount': {
                                validators: {
                                    notEmpty: {
                                        message: 'The amount is required.'
                                    }
                                }
                            },
                            'payment_method': {
                                validators: {
                                    notEmpty: {
                                        message: 'The payment_method is required.'
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
    <!-- transaction modal end -->


    @isset($tab)


    @endisset
    <script type="text/javascript">
        $(function(){


            tab=$("#tab-name").val();
            $(".nav-link").removeClass('active');
            $("#"+tab+"-tab").addClass('active');

            $(".tab-pane").removeClass('show active');
            $("#"+tab).addClass('show active');


            $(".nav-link").on('click', function(){

                tab_name=$(this).data('id');
                console.log("asdf", tab_name)
                $("#tab-name").val(tab_name);
            })


        })
    </script>


</main>
@endsection
