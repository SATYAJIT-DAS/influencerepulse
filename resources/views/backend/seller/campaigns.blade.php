@extends('backend.seller.layouts.app')
@section('content')
<style type="text/css">
    .complete{
        cursor: pointer;
        color: black;
    }
</style>

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Campaigns</li>
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

                <span><i class="fal fa-list"></i> Campaigns online</span>

                <a href="{{route('seller.add-campa')}}" class="btn btn-primary">
                    <i class="fal fa-plus"></i> Create New Campaign </a>

            </div>

            <div class="card-body">


                <form method="get">

                    <div class="input-group mb-5">
                        <input type="text" class="form-control" name="search" value=""
                            placeholder="Search campaign per ID / name" />
                        <div class="input-group-append">
                            <button class="btn btn-light" type="submit">
                                <i class="fal fa-search"></i>
                            </button>
                        </div>
                    </div>

                </form>

                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">


                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Campaigns that are active">
                        <a class="nav-link active" data-toggle="tab" id="online-tab" href="#online" role="tab"
                            aria-controls="online">Online ({{$online}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="All your campaigns">
                        <a class="nav-link" data-toggle="tab" id="all-tab" href="#all" role="tab"
                            aria-controls="all">All ({{$all}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="Campaigns that are offline / out of funds">
                        <a class="nav-link" data-toggle="tab" id="offline-tab" href="#offline" role="tab"
                            aria-controls="offline">Offline ({{$offline}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="Campaigns that are waiting to be activated by your schedule">
                        <a class="nav-link" data-toggle="tab" id="ready-tab" href="#ready" role="tab"
                            aria-controls="ready">Ready ({{$ready}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="Campaigns that are waiting to be approved by our team">
                        <a class="nav-link" data-toggle="tab" id="approval-tab" href="#pending" role="tab"
                            aria-controls="approval">Pending approval ({{$pending}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="Campaigns that you did not complete">
                        <a class="nav-link" data-toggle="tab" id="incomplete-tab" href="#incomplete" role="tab"
                            aria-controls="incomplete">Incomplete ({{$incomplete}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Campaigns that are complete">
                        <a class="nav-link" data-toggle="tab" id="completed-tab" href="#completed" role="tab"
                            aria-controls="completed">Completed ({{$completed}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="Campaigns that you cancelled">
                        <a class="nav-link" data-toggle="tab" id="cancelled-tab" href="#cancelled" role="tab"
                            aria-controls="cancelled">Cancelled ({{$cancelled}})</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="online" role="tabpanel" aria-labelledby="online-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Status</th>
                                        <th>
                                            Claims <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="Number of claims today / Daily limit"></i>
                                        </th>
                                        <th>Schedule</th>
                                        <th>Wallet</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($campaigns as $key => $camp)
                                    @if($camp->permission == 'online')
                                    <tr>
                                        <td>
                                            {{$camp->id}}
                                            <i class="fal fa-shield-check" data-toggle="tooltip" title=""
                                                data-original-title="Protection against repeat buyers enabled: {{$camp->product_id}}"></i>
                                            @if($camp->private_status == 1)
                                            <i class="fal fa-eye-slash" data-toggle="tooltip" title=""
                                                data-original-title="Private campaign"></i>
                                            @endif   </td>
                                        <td>
                                            @if(count($camp->pic)>0)
                                            <img alt="product name" src="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                                width="50">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 450px;"><label style="width: 100%">{{$camp->product_name}}</label></td>
                                        <td>
                                            @if($camp->price && $camp->rebate_price)
                                            <small class="text-danger strikethrough">
                                                {{ dynamicCurrency() }}{{$camp->price}} </small>
                                            <span class="text-success">
                                                {{ dynamicCurrency() }}{{$camp->rebate_price}} </span><br>
                                            <small>
                                                {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF </small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td>{{ dynamicCurrency() }}{{ number_format($camp->wallet, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button data-e2e="btn-actions" class="btn btn-primary btn-block dropdown-toggle" type="button" id="actions-menu"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actions-menu" style="">
                                                    <!--<a class="dropdown-item" href="{{route('camp_clone', $camp->id)}}">-->
                                                    <!--    Clone-->
                                                    <!--</a>-->
                                                    <a class="dropdown-item complete" href="{{route('camp_complete',$camp->id)}}">
                                                        Complete
                                                    </a>
                                                    <a class="dropdown-item complete" href="{{route('camp_cancel',$camp->id)}}">
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($online == 0)
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No online campaigns. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">

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
                                                data-placement="top" title="The status of your campaign"></i>
                                        </th>
                                        <th>Schedule <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="When will your campaign start or end"></i>
                                        </th>
                                        <th>Wallet <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="How much funds do you have allocated for this campaign"></i>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($campaigns as $key => $camp)
                                    <tr>
                                        <td>
                                            {{$camp->id}} <i class="fal fa-shield-check" data-toggle="tooltip" title=""
                                                data-original-title="Protection against repeat buyers enabled: {{$camp->product_id}}"></i>
                                            @if($camp->private_status == 1)
                                            <i class="fal fa-eye-slash" data-toggle="tooltip" title=""
                                                data-original-title="Private campaign"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if(count($camp->pic)>0)
                                            <img alt="product name" src="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                                width="50">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 450px;"><label style="max-width: 100%">{{$camp->product_name}}</label></td>
                                        <td>
                                            @if($camp->price && $camp->rebate_price)
                                            <small class="text-danger strikethrough">
                                                {{ dynamicCurrency() }}{{$camp->price}} </small>
                                            <span class="text-success">
                                                {{ dynamicCurrency() }}{{$camp->rebate_price}} </span><br>
                                            <small>
                                                {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF </small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td>{{ dynamicCurrency() }}{{ number_format($camp->wallet, 2, '.', ',') }}</td>

                                        <td class="text-center">
                                            @switch($camp->permission)
                                                @case('online')
                                                <div class="dropdown">
                                                    <button data-e2e="btn-actions" class="btn btn-primary btn-block dropdown-toggle" type="button" id="actions-menu"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actions-menu" style="">
                                                        <!--<a class="dropdown-item" href="{{route('camp_clone', $camp->id)}}">-->
                                                        <!--    Clone-->
                                                        <!--</a>-->
                                                        <a class="dropdown-item complete" href="{{route('camp_complete',$camp->id)}}">
                                                            Complete
                                                        </a>
                                                        <a class="dropdown-item complete" href="{{route('camp_cancel',$camp->id)}}">
                                                            Cancel
                                                        </a>
                                                    </div>
                                                </div>
                                                @break;

                                                @case('completed')
                                                <div class="dropdown">
                                                    <button data-e2e="btn-actions" class="btn btn-primary btn-block dropdown-toggle" type="button" id="actions-menu"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actions-menu" style="">
                                                        <!--<a class="dropdown-item" href="{{route('camp_clone', $camp->id)}}">-->
                                                        <!--    Clone-->
                                                        <!--</a>-->
                                                        <a class="dropdown-item" href="">
                                                            Export Rebates
                                                        </a>
                                                        <a class="dropdown-item complete" href="{{route('camp_cancel',$camp->id)}}">
                                                            Cancel
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="dropdown mt-1">
                                                    <button class="btn btn-dark btn-block dropdown-toggle" type="button" id="view-menu" data-toggle="dropdown">
                                                        Details
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="view-menu">
                                                        <a class="dropdown-item" href="{{route('seller.summary',$camp->id)}}">
                                                            View Summary
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('seller.camp-wallet', $camp->id)}}">
                                                            View Wallet
                                                        </a><a class="dropdown-item" href="{{route('seller.rebates',array('camp_id'=>$camp->id,'state'=>'total'))}}">
                                                            View Rebates
                                                        </a><a class="dropdown-item" target="_blank"
                                                            href="{{route('seller.camp-landing',$camp->id)}}">
                                                            View Landing Page
                                                        </a></div>
                                                </div>
                                                @break

                                                @default

                                                <div class="dropdown">
                                                    <button data-e2e="btn-actions"
                                                        class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                        id="actions-menu" data-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="actions-menu">

                                                        <!--<a class="dropdown-item"-->
                                                        <!--    href="{{route('camp_clone', $camp->id)}}">-->
                                                        <!--    Clone-->
                                                        <!--</a>-->
                                                        <a class="dropdown-item"
                                                            href="{{route('camp_delete', $camp->id)}}">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            @endswitch
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if($all == 0)
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No  campaigns. </td>
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
                                        <th>Wallet</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($campaigns as $key => $camp)
                                    @if($camp->permission == 'offline')
                                    <tr>
                                        <td>
                                            {{$camp->id}} <i class="fal fa-shield-check" data-toggle="tooltip" title=""
                                                data-original-title="Protection against repeat buyers enabled: {{$camp->product_id}}"></i>
                                            @if($camp->private_status == 1)
                                            <i class="fal fa-eye-slash" data-toggle="tooltip" title=""
                                                data-original-title="Private campaign"></i>
                                            @endif   </td>
                                        <td>
                                            @if(count($camp->pic)>0)
                                            <img alt="product name" src="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                                width="50">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 451px;">{{$camp->product_name}}</td>
                                        <td>
                                            @if($camp->price && $camp->rebate_price)
                                            <small class="text-danger strikethrough">
                                                {{ dynamicCurrency() }}{{$camp->price}} </small>
                                            <span class="text-success">
                                                {{ dynamicCurrency() }}{{$camp->rebate_price}} </span><br>
                                            <small>
                                                {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF </small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td>{{ dynamicCurrency() }}{{ number_format($camp->wallet, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button data-e2e="btn-actions"
                                                    class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                   <!--  <a class="dropdown-item"
                                                        href="{{route('camp_edit', $camp->id)}}">
                                                        Edit
                                                    </a> -->
                                                    <!--<a class="dropdown-item"-->
                                                    <!--    href="{{route('camp_clone', $camp->id)}}">-->
                                                    <!--    Clone-->
                                                    <!--</a>-->

                                                    <a class="dropdown-item"
                                                        href="{{route('camp_delete', $camp->id)}}">
                                                        Delete
                                                    </a>
                                                    <a class="dropdown-item complete" href="{{route('camp_cancel',$camp->id)}}">
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($offline ==0)
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No offline campaigns. </td>
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
                                        <th>Wallet</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($campaigns as $key => $camp)
                                    @if($camp->permission == 'ready')
                                    <tr>
                                        <td>
                                            {{$camp->id}} <i class="fal fa-shield-check" data-toggle="tooltip" title=""
                                                data-original-title="Protection against repeat buyers enabled: {{$camp->product_id}}"></i>
                                            @if($camp->private_status == 1)
                                            <i class="fal fa-eye-slash" data-toggle="tooltip" title=""
                                                data-original-title="Private campaign"></i>
                                            @endif   </td>
                                        <td>
                                            @if(count($camp->pic)>0)
                                            <img alt="product name" src="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                                width="50">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 451px;">{{$camp->product_name}}</td>
                                        <td>
                                            @if($camp->price && $camp->rebate_price)
                                            <small class="text-danger strikethrough">
                                                {{ dynamicCurrency() }}{{$camp->price}} </small>
                                            <span class="text-success">
                                                {{ dynamicCurrency() }}{{$camp->rebate_price}} </span><br>
                                            <small>
                                                {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF </small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td>{{ dynamicCurrency() }}{{ number_format($camp->wallet, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button data-e2e="btn-actions"
                                                    class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                  <!--   <a class="dropdown-item"
                                                        href="{{route('camp_edit', $camp->id)}}">
                                                        Edit
                                                    </a> -->
                                                    <!--<a class="dropdown-item"-->
                                                    <!--    href="{{route('camp_clone', $camp->id)}}">-->
                                                    <!--    Clone-->
                                                    <!--</a>-->
                                                    <a class="dropdown-item complete" href="{{route('camp_cancel',$camp->id)}}">
                                                        Cancel
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('camp_delete', $camp->id)}}">
                                                        Delete
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($ready ==0)
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No ready campaigns. </td>
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
                                        <th>Wallet</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($campaigns as $key => $camp)
                                    @if($camp->permission == 'pending')
                                    <tr>
                                        <td>
                                            {{$camp->id}} <i class="fal fa-shield-check" data-toggle="tooltip" title=""
                                                data-original-title="Protection against repeat buyers enabled: {{$camp->product_id}}"></i>
                                            @if($camp->private_status == 1)
                                            <i class="fal fa-eye-slash" data-toggle="tooltip" title=""
                                                data-original-title="Private campaign"></i>
                                            @endif   </td>
                                        <td>
                                            @if(count($camp->pic)>0)
                                            <img alt="product name" src="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                                width="50">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 451px;">{{$camp->product_name}}</td>
                                        <td>
                                            @if($camp->price && $camp->rebate_price)
                                            <small class="text-danger strikethrough">
                                                {{ dynamicCurrency() }}{{$camp->price}} </small>
                                            <span class="text-success">
                                                {{ dynamicCurrency() }}{{$camp->rebate_price}} </span><br>
                                            <small>
                                                {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF</small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td>{{ dynamicCurrency() }}{{ number_format($camp->wallet, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button data-e2e="btn-actions"
                                                    class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <!-- <a class="dropdown-item"
                                                        href="{{route('camp_edit', $camp->id)}}">
                                                        Edit
                                                    </a> -->
                                                    <!--<a class="dropdown-item"-->
                                                    <!--    href="{{route('camp_clone', $camp->id)}}">-->
                                                    <!--    Clone-->
                                                    <!--</a>-->
                                                    <a class="dropdown-item complete" href="{{route('camp_cancel',$camp->id)}}">
                                                        Cancel
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('camp_delete', $camp->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($offline ==0)
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No pending approval campaigns. </td>
                                    </tr>
                                    @endif

                                </tbody>

                            </table>

                        </div>


                    </div>


                    <div class="tab-pane fade" id="incomplete" role="tabpanel" aria-labelledby="all-tab">

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
                                                data-placement="top" title="The status of your campaign"></i>
                                        </th>
                                        <th>Schedule <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="When will your campaign start or end"></i>
                                        </th>
                                        <th>Wallet <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="How much funds do you have allocated for this campaign"></i>
                                        </th>
                                        <th></th>
                                    </tr>

                                </thead>

                                <tbody>
                                    @foreach($campaigns as $key => $camp)
                                    @if($camp->permission == 'incomplete')
                                    <tr>
                                        <td>
                                            {{$camp->id}} <i class="fal fa-shield-check" data-toggle="tooltip" title=""
                                                data-original-title="Protection against repeat buyers enabled: {{$camp->product_id}}"></i>
                                            @if($camp->private_status == 1)
                                            <i class="fal fa-eye-slash" data-toggle="tooltip" title=""
                                                data-original-title="Private campaign"></i>
                                            @endif  </td>
                                        <td>
                                            @if(count($camp->pic)>0)
                                            <img alt="product name" src="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                                width="50">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 450px;"><label style="width:100%">{{$camp->product_name}}</label></td>
                                        <td>
                                            @if($camp->price && $camp->rebate_price)
                                            <small class="text-danger strikethrough">
                                                {{ dynamicCurrency() }}{{$camp->price}} </small>
                                            <span class="text-success">
                                                {{ dynamicCurrency() }}{{$camp->rebate_price}} </span><br>
                                            <small>
                                               {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF</small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td>{{ dynamicCurrency() }}{{ number_format($camp->wallet, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button data-e2e="btn-actions"
                                                    class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu"><a class="dropdown-item"
                                                        href="{{route('camp_edit', $camp->id)}}">
                                                        Edit
                                                    <!--</a><a class="dropdown-item"-->
                                                    <!--    href="{{route('camp_clone', $camp->id)}}">-->
                                                    <!--    Clone-->
                                                    <!--</a>-->
                                                    <a class="dropdown-item"
                                                        href="{{route('camp_delete', $camp->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($incomplete == 0)
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No incomplete campaigns.
                                        </td>
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
                                        <th>Claims</th>
                                        <th>Wallet</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($campaigns as $key => $camp)
                                    @if($camp->permission == 'completed')
                                    <tr>
                                        <td>
                                            {{$camp->id}} <i class="fal fa-shield-check" data-toggle="tooltip" title=""
                                                data-original-title="Protection against repeat buyers enabled: {{$camp->product_id}}"></i>
                                            @if($camp->private_status == 1)
                                            <i class="fal fa-eye-slash" data-toggle="tooltip" title=""
                                                data-original-title="Private campaign"></i>
                                            @endif   </td>
                                        <td>
                                            @if(count($camp->pic)>0)
                                            <img alt="product name" src="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                                width="50">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 451px;">{{$camp->product_name}}</td>
                                        <td>
                                            @if($camp->price && $camp->rebate_price)
                                            <small class="text-danger strikethrough">
                                                {{ dynamicCurrency() }}{{$camp->price}} </small>
                                            <span class="text-success">
                                                {{ dynamicCurrency() }}{{$camp->rebate_price}} </span><br>
                                            <small>
                                               {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF </small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td>{{ dynamicCurrency() }}{{ number_format($camp->wallet, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button data-e2e="btn-actions" class="btn btn-primary btn-block dropdown-toggle" type="button" id="actions-menu"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actions-menu" style="">
                                                    <!--<a class="dropdown-item" href="{{route('camp_clone', $camp->id)}}">-->
                                                    <!--    Clone-->
                                                    <!--</a>-->
                                                    <a class="dropdown-item" href="">
                                                        Export Rebates
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="dropdown mt-1">
                                                <button class="btn btn-dark btn-block dropdown-toggle" type="button" id="view-menu" data-toggle="dropdown">
                                                    Details
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="view-menu">
                                                    <a class="dropdown-item" href="{{route('seller.summary',$camp->id)}}">
                                                        View Summary
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('seller.camp-wallet', $camp->id)}}">
                                                        View Wallet
                                                    </a><a class="dropdown-item" href="{{route('seller.rebates',array('camp_id'=>$camp->id,'state'=>'total'))}}">
                                                        View Rebates
                                                    </a><a class="dropdown-item" target="_blank"
                                                        href="{{route('seller.camp-landing',$camp->id)}}">
                                                        View Landing Page
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($completed == 0)
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No completed campaigns. </td>
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
                                        <th>Date</th>
                                        <th>Wallet</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($campaigns as $key => $camp)
                                    @if($camp->permission == 'cancelled')
                                    <tr>
                                        <td>
                                            {{$camp->id}} <i class="fal fa-shield-check" data-toggle="tooltip" title=""
                                                data-original-title="Protection against repeat buyers enabled: {{$camp->product_id}}"></i>
                                            @if($camp->private_status == 1)
                                            <i class="fal fa-eye-slash" data-toggle="tooltip" title=""
                                                data-original-title="Private campaign"></i>
                                            @endif   </td>
                                        <td>
                                            @if(count($camp->pic)>0)
                                            <img alt="product name" src="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                                width="50">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 451px;">{{$camp->product_name}}</td>
                                        <td>
                                            @if($camp->price && $camp->rebate_price)
                                            <small class="text-danger strikethrough">
                                                {{ dynamicCurrency() }}{{$camp->price}} </small>
                                            <span class="text-success">
                                                {{ dynamicCurrency() }}{{$camp->rebate_price}} </span><br>
                                            <small>
                                               {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF </small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td>{{ dynamicCurrency() }}{{ number_format($camp->wallet, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button data-e2e="btn-actions"
                                                    class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <!-- <a class="dropdown-item"
                                                        href="{{route('camp_edit', $camp->id)}}">
                                                        Edit
                                                    </a> -->
                                                    <!--<a class="dropdown-item"-->
                                                    <!--    href="{{route('camp_clone', $camp->id)}}">-->
                                                    <!--    Clone-->
                                                    <!--</a>-->
                                                    <a class="dropdown-item"
                                                        href="{{route('camp_delete', $camp->id)}}">
                                                        Delete
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @if($cancelled == 0)
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No cancelled campaigns. </td>
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
