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

                    <div class="tab-pane fade active show" id="approved" role="tabpanel" aria-labelledby="new-tab">

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
                                    @if(count($orders) != 0)
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                            </td>
                                            <td style="width: 30%;">{{$order->getCamp->product_name}}</td>
                                            <td>
                                                {{$order->getCamp->user->name}}</td>
                                         	<td>
                                                {{$order->getBuyer->name}}</td>
                                            <td>
                                                {{$order->order_id}}</td>
                                             <td>
                                                ${{$order->getCamp->rebate_price}}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$order->status}}</span>
                                            </td>
                                            <!-- <td>
                                                <a class="btn btn-primary btn-block msg-class" data-toggle="modal"
                                                    data-target="#msg-modal"
                                                    data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}"
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

                </div>

            </div>

        </div>

    </div>



</main>
@endsection