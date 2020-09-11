@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Coupons</li>
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

            <div class="card-header d-flex align-items-center justify-content-between">

                <span><i class="fal fa-tag"></i> Coupons</span>

                <a href="{{route('seller.create-coupon')}}" class="btn btn-primary">
                    <i class="fal fa-plus"></i> Create New Coupon </a>

            </div>

            <div class="card-body">


                <form method="get">

                    <div class="input-group mb-5">
                        <input type="text" class="form-control" name="search" value=""
                            placeholder="Search coupon per ID / name / code" />
                        <div class="input-group-append">
                            <button class="btn btn-light" type="submit">
                                <i class="fal fa-search"></i>
                            </button>
                        </div>
                    </div>

                </form>

                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">


                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="coupons that are active">
                        <a class="nav-link" data-toggle="tab" id="online-tab" href="#online" role="tab"
                            aria-controls="online">Online ({{$online}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="All your coupons">
                        <a class="nav-link active" data-toggle="tab" id="all-tab" href="#all" role="tab"
                            aria-controls="all">All ({{$all}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="coupons that are offline / out of funds">
                        <a class="nav-link" data-toggle="tab" id="offline-tab" href="#offline" role="tab"
                            aria-controls="offline">Offline ({{$offline}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="coupons that are waiting to be activated by your schedule">
                        <a class="nav-link" data-toggle="tab" id="ready-tab" href="#ready" role="tab"
                            aria-controls="ready">Ready ({{$ready}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="coupons that are waiting to be approved by our team">
                        <a class="nav-link" data-toggle="tab" id="approval-tab" href="#pending" role="tab"
                            aria-controls="approval">Pending approval ({{$pending}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="coupons that you did not complete">
                        <a class="nav-link" data-toggle="tab" id="incomplete-tab" href="#incomplete" role="tab"
                            aria-controls="incomplete">Incomplete ({{$incomplete}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="coupons that are complete">
                        <a class="nav-link" data-toggle="tab" id="completed-tab" href="#completed" role="tab"
                            aria-controls="completed">Completed ({{$completed}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="coupons that you cancelled">
                        <a class="nav-link" data-toggle="tab" id="cancelled-tab" href="#cancelled" role="tab"
                            aria-controls="cancelled">Cancelled ({{$cancelled}})</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade" id="online" role="tabpanel" aria-labelledby="online-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Status</th>

                                        <th>Schedule</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($coupons as $key=> $coupon)
                                    @if($coupon->permission == 'online')
                                    <tr>
                                        <td>
                                            {{$coupon->id}} </td>
                                        <td>
                                            @if(count($coupon->coupon_image)>0)
                                            <img src="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}"
                                                width="50" alt="test shopify namertewhrrte">
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            {{$coupon->product_name}} </td>
                                        <td>
                                            <small class="text-danger strikethrough">
                                                ₹{{ number_format($coupon->price, 2, '.', ',') }} </small>
                                            <span class="text-success">
                                                ₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}
                                            </span><br />
                                            <small>
                                                {{$coupon->off_per}}% OFF </small>
                                        </td>
                                        <td><span class="text-danger">{{$coupon->permission}}
                                            </span></td>
                                        <td>
                                            Starts on {{$coupon->start_date}}<br /></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_edit', $coupon->id)}}">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_clone', $coupon->id)}}">
                                                        Clone
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_complete', $coupon->id)}}">
                                                        Complete
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_delete', $coupon->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($online == 0)
                                    <tr>
                                        <td colspan="7"  class="text-center">
                                            No coupons.
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>
                                            Pricing <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The full and discounted price"></i>
                                        </th>
                                        <th>Status <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The status of your coupon"></i></th>
                                        <th>
                                            Schedule <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="When will your coupon start or end"></i>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($coupons as $key=> $coupon)

                                    <tr>
                                        <td>
                                            {{$coupon->id}} </td>
                                        <td>
                                            @if(count($coupon->coupon_image)>0)
                                            <img src="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}"
                                                width="50" alt="test shopify namertewhrrte">
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            {{$coupon->product_name}} </td>
                                        <td>
                                            <small class="text-danger strikethrough">
                                                ₹{{ number_format($coupon->price, 2, '.', ',') }} </small>
                                            <span class="text-success">
                                                ₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}
                                            </span><br />
                                            <small>
                                                {{$coupon->off_per}}% OFF </small>
                                        </td>
                                        <td><span class="text-danger">{{$coupon->permission}}
                                            </span></td>
                                        <td>
                                            Starts on {{$coupon->start_date}}<br /></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_edit', $coupon->id)}}">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_clone', $coupon->id)}}">
                                                        Clone
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_complete', $coupon->id)}}">
                                                        Complete
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_delete', $coupon->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if($all == 0)
                                    <tr>
                                        <td colspan="7">
                                            No coupons.
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>

                        

                    </div>

                    <div class="tab-pane fade" id="offline" role="tabpanel" aria-labelledby="online-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Status</th>
                                        <th>Schedule</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($coupons as $key=> $coupon)
                                    @if($coupon->permission == 'offline')
                                    <tr>
                                        <td>
                                            {{$coupon->id}} </td>
                                        <td>
                                            @if(count($coupon->coupon_image)>0)
                                            <img src="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}"
                                                width="50" alt="test shopify namertewhrrte">
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            {{$coupon->product_name}} </td>
                                        <td>
                                            <small class="text-danger strikethrough">
                                                ₹{{ number_format($coupon->price, 2, '.', ',') }} </small>
                                            <span class="text-success">
                                                ₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}
                                            </span><br />
                                            <small>
                                                {{$coupon->off_per}}% OFF </small>
                                        </td>
                                        <td><span class="text-danger">{{$coupon->permission}}
                                            </span></td>
                                        <td>
                                            Starts on {{$coupon->start_date}}<br /></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_edit', $coupon->id)}}">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_clone', $coupon->id)}}">
                                                        Clone
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_complete', $coupon->id)}}">
                                                        Complete
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_delete', $coupon->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($offline == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No offline coupons. </td>
                                    </tr>
                                    @endif
                                    
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="ready" role="tabpanel" aria-labelledby="online-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Status</th>
                                        <th>Schedule</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($coupons as $key=> $coupon)
                                    @if($coupon->permission == 'ready')
                                    <tr>
                                        <td>
                                            {{$coupon->id}} </td>
                                        <td>
                                            @if(count($coupon->coupon_image)>0)
                                            <img src="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}"
                                                width="50" alt="test shopify namertewhrrte">
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            {{$coupon->product_name}} </td>
                                        <td>
                                            <small class="text-danger strikethrough">
                                                ₹{{ number_format($coupon->price, 2, '.', ',') }} </small>
                                            <span class="text-success">
                                                ₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}
                                            </span><br />
                                            <small>
                                                {{$coupon->off_per}}% OFF </small>
                                        </td>
                                        <td><span class="text-danger">{{$coupon->permission}}
                                            </span></td>
                                        <td>
                                            Starts on {{$coupon->start_date}}<br /></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_edit', $coupon->id)}}">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_clone', $coupon->id)}}">
                                                        Clone
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_complete', $coupon->id)}}">
                                                        Complete
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_delete', $coupon->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($ready == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No ready coupons. </td>
                                    </tr>
                                    @endif
                                    
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="online-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Status</th>
                                        <th>Schedule</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($coupons as $key=> $coupon)
                                    @if($coupon->permission == 'Pending approval')
                                    <tr>
                                        <td>
                                            {{$coupon->id}} </td>
                                        <td>
                                            @if(count($coupon->coupon_image)>0)
                                            <img src="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}"
                                                width="50" alt="test shopify namertewhrrte">
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            {{$coupon->product_name}} </td>
                                        <td>
                                            <small class="text-danger strikethrough">
                                                ₹{{ number_format($coupon->price, 2, '.', ',') }} </small>
                                            <span class="text-success">
                                                ₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}
                                            </span><br />
                                            <small>
                                                {{$coupon->off_per}}% OFF </small>
                                        </td>
                                        <td><span class="text-danger">{{$coupon->permission}}
                                            </span></td>
                                        <td>
                                            Starts on {{$coupon->start_date}}<br /></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_edit', $coupon->id)}}">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_clone', $coupon->id)}}">
                                                        Clone
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_complete', $coupon->id)}}">
                                                        Complete
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_delete', $coupon->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($pending == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No pending approval coupons. </td>
                                    </tr>
                                    @endif
                                    
                                </tbody>

                            </table>

                        </div>


                    </div>


                    <div class="tab-pane fade" id="incomplete" role="tabpanel" aria-labelledby="incomplete-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The full and discounted price"></i>
                                        </th>
                                        <th>Status <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The status of your coupon"></i></th>
                                        <th>Schedule <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="When will your coupon start or end"></i>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($coupons as $key=> $coupon)
                                    @if($coupon->permission == 'incomplete')
                                    <tr>
                                        <td>
                                            {{$coupon->id}} </td>
                                        <td>
                                            @if(count($coupon->coupon_image)>0)
                                            <img src="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}"
                                                width="50" alt="test shopify namertewhrrte">
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            {{$coupon->product_name}} </td>
                                        <td>
                                            <small class="text-danger strikethrough">
                                                ₹{{ number_format($coupon->price, 2, '.', ',') }} </small>
                                            <span class="text-success">
                                                ₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}
                                            </span><br />
                                            <small>
                                                {{$coupon->off_per}}% OFF </small>
                                        </td>
                                        <td><span class="text-danger">{{$coupon->permission}}
                                            </span></td>
                                        <td>
                                            Starts on {{$coupon->start_date}}<br /></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_edit', $coupon->id)}}">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_clone', $coupon->id)}}">
                                                        Clone
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_complete', $coupon->id)}}">
                                                        Complete
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_delete', $coupon->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($incomplete == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No incomplete coupons. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>

                      

                    </div>

                    <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="online-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($coupons as $key=> $coupon)
                                    @if($coupon->permission == 'completed')
                                    <tr>
                                        <td>
                                            {{$coupon->id}} </td>
                                        <td>
                                            @if(count($coupon->coupon_image)>0)
                                            <img src="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}"
                                                width="50" alt="test shopify namertewhrrte">
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            {{$coupon->product_name}} </td>
                                        <td>
                                            <small class="text-danger strikethrough">
                                                ₹{{ number_format($coupon->price, 2, '.', ',') }} </small>
                                            <span class="text-success">
                                                ₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}
                                            </span><br />
                                            <small>
                                                {{$coupon->off_per}}% OFF </small>
                                        </td>
                                        <td><span class="text-danger">{{$coupon->permission}}
                                            </span></td>
                                        <td>
                                            Starts on {{$coupon->start_date}}<br /></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_edit', $coupon->id)}}">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_clone', $coupon->id)}}">
                                                        Clone
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_complete', $coupon->id)}}">
                                                        Complete
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_delete', $coupon->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($completed == 0)
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No completed coupons. </td>
                                    </tr>
                                    @endif
                                    
                                </tbody>

                            </table>

                        </div>


                    </div>


                    <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="online-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($coupons as $key=> $coupon)
                                    @if($coupon->permission == 'cancelled')
                                    <tr>
                                        <td>
                                            {{$coupon->id}} </td>
                                        <td>
                                            @if(count($coupon->coupon_image)>0)
                                            <img src="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}"
                                                width="50" alt="test shopify namertewhrrte">
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            {{$coupon->product_name}} </td>
                                        <td>
                                            <small class="text-danger strikethrough">
                                                ₹{{ number_format($coupon->price, 2, '.', ',') }} </small>
                                            <span class="text-success">
                                                ₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}
                                            </span><br />
                                            <small>
                                                {{$coupon->off_per}}% OFF </small>
                                        </td>
                                        <td><span class="text-danger">{{$coupon->permission}}
                                            </span></td>
                                        <td>
                                            Starts on {{$coupon->start_date}}<br /></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_edit', $coupon->id)}}">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_clone', $coupon->id)}}">
                                                        Clone
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_complete', $coupon->id)}}">
                                                        Complete
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon_delete', $coupon->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($cancelled == 0)
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No cancelled coupons. </td>
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