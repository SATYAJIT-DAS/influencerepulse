@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('seller.campaigns')}}">Campaigns</a></li>
        <li class="breadcrumb-item active">Campaign {{$camp->id}}</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-fw fa-list"></i> Summary </div>

            <div class="card-body">

                <div id="deal-summary">

                    <div class="row">

                        <div class="col-md-6 col-xl-6 col-xxl-4 mx-auto">

                            <div id="deal-68736" class="deal deal-container deal-item deal-rebate unclickable ending"
                                data-id="68736" data-type="rebate">
                                <div class="row mb-2">
                                    <div class="col-7 pr-0"><span class="badge badge-remaining">Last day</span></div>

                                    <div class="col-5 pl-0">
                                        <div class="deal-actions">
                                            <div class="share">
                                                <i class="fal fa-share-alt fa-fw" data-toggle="collapse"
                                                    data-target="#share-68736" aria-expanded="false"
                                                    aria-controls="share-68736" role="button"></i>
                                                <div id="share-68736" class="collapse">
                                                    <div class="addthis_share">
                                                        <i class="addthis_share_button d-block fab fa-facebook fa-fw"
                                                            data-service="facebook"
                                                            data-url=""
                                                            data-title="Luxura Sciences Onion Hair Oil 250 ml with 14 Essential Oils hair treatment winter special."></i>
                                                        <i class="addthis_share_button d-block mt-1 fab fa-twitter fa-fw"
                                                            data-service="twitter"
                                                            data-url=""
                                                            data-title="Luxura Sciences Onion Hair Oil 250 ml with 14 Essential Oils hair treatment winter special."></i>
                                                        <i class="addthis_share_button d-block mt-1 fab fa-pinterest fa-fw"
                                                            data-service="pinterest"
                                                            data-url=""
                                                            data-title="Luxura Sciences Onion Hair Oil 250 ml with 14 Essential Oils hair treatment winter special."></i>
                                                        <i class="addthis_share_button d-block mt-1 d-lg-none fab fa-whatsapp fa-fw"
                                                            data-service="whatsapp"
                                                            data-url=""
                                                            data-title="Luxura Sciences Onion Hair Oil 250 ml with 14 Essential Oils hair treatment winter special."></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="release">
                                                <i class="fal fa-clock fa-fw" data-toggle="tooltip" title=""
                                                    data-original-title="Rebates released @ {{$camp->start_time}} EST"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div><a
                                    href=""
                                    class="preview">



                                    <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad"
                                        data-background-image="{{asset('public/images/'.$camp->pic[0]->image_path)}}" data-loaded="true"
                                        style="background-image: url({{asset('public/images/'.$camp->pic[0]->image_path)}});">
                                    </figure>

                                </a>

                                <h3 class="title text-truncate">
                                    <a href="">
                                            {{$camp->product_name}}
                                        </a>
                                </h3>

                                <div class="line"></div>

                                <div class="row">

                                    <div class="col-7 d-flex align-items-center">
                                        <span class="full-price strikethrough text-danger">{{ dynamicCurrency() }}{{$camp->price}}</span>
                                        <span class="price text-green">{{ dynamicCurrency() }}{{$camp->rebate_price}}</span>
                                    </div>

                                    <div class="col-5 d-flex align-items-center justify-content-end discount">
                                        <div class="percent bg-primary">
                                            <span class="discount">
                                                {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-xl-6 col-xxl-8">

                            <div class="row">

                                <div class="col-sm-6 col-md-4 col-xl-6 col-xxl-4">
                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i
                                                class="fal fa-fw fa-dollar-sign bg-danger p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="text-danger mb-0 mt-0-5">{{ dynamicCurrency() }}{{$camp->price}}</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">Price</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-xl-6 col-xxl-4">
                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i
                                                class="fal fa-fw fa-percent bg-primary p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="text-primary mb-0 mt-0-5">{{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}%</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">Rebate</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-xl-12 col-xxl-4">
                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i
                                                class="fal fa-fw fa-dollar-sign bg-success p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="text-success mb-0 mt-0-5">{{ dynamicCurrency() }}{{$camp->rebate_price}}</div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">Discounted
                                                Price</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-xl-6 col-xxl-4">

                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i class="fal fa-fw fa-clock bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="mb-0 mt-0-5">
                                                {{$camp->start_time}} EST </div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">
                                                Release time </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-8 col-xl-12 col-xxl-8">

                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i class="fal fa-fw fa-calendar bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="mb-0 mt-0-5">
                                               {{ date('j F, Y  h:m ', strtotime($camp->start_date)) }} EST -
                                               @if($camp->complete_date)
                                               {{ date('j F, Y  h:m ', strtotime($camp->complete_date)) }} EST
                                                @endif
                                                 </div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">
                                                Schedule </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card">
                                <div class="card-body p-0 clearfix">
                                    <i class="fal fa-fw fa-link bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                    <div class="mb-0 mt-0-5">
                                        <a href="{{$camp->product_url}}"
                                            target="_blank" class="truncate w-75">
                                            {{$camp->product_url}}
                                        </a>
                                    </div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs">Product URL</div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-sm-6 col-md-7 col-xxl-6">

                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i class="fal fa-fw fa-share bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="mb-0 mt-0-5">
                                                <a  target="_blank" id="share-url">
                                                    </a>
                                            </div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">Share URL
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-5 col-xxl-6">

                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i class="fal fa-fw fa-tags bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="mb-0 mt-0-5">
                                                {{$camp->daily_rebates}} </div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">
                                                Rebates / Day </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i
                                                class="fal fa-fw fa-dollar-sign bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="mb-0 mt-0-5">
                                                $215.28 </div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">
                                                Max Total Cost </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i
                                                class="fal fa-fw fa-dollar-sign bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="mb-0 mt-0-5">
                                                $71.76 </div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">
                                                Wallet </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i
                                                class="fal fa-fw fa-dollar-sign bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="mb-0 mt-0-5">
                                                $17.94 </div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">
                                                Sale Cost </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i
                                                class="fal fa-fw fa-dollar-sign bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="mb-0 mt-0-5">
                                                {{ dynamicCurrency() }}{{$camp->price*$camp->daily_rebates}} </div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">
                                                MAX Daily Cost </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12                                            col-xl-12 col-xxl-12">
                                    <div class="card">
                                        <div class="card-body p-0 clearfix">
                                            <i
                                                class="fal fa-fw fa-calendar-check bg-dark p-1-5 font-2xl mr-2 float-left"></i>
                                            <div class="mb-0 mt-0-5">
                                                {{ date('j F, Y  h:m ', strtotime($camp->start_date)) }} EST -
                                               @if($camp->complete_date)
                                               {{ date('j F, Y  h:m ', strtotime($camp->complete_date)) }} EST
                                                @endif </div>
                                            <div class="text-muted text-uppercase font-weight-bold font-xs">
                                                Online from / to </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <ul class="nav nav-fill nav-tabs" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" id="rebates-tab" href="#rebates" role="tab" aria-controls="rebates-tab"
                    data-toggle="tab">Rebates</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="deal-tab" href="#campaign" role="tab" aria-controls="users-tab"
                    data-toggle="tab">Campaign</a>
            </li>

        </ul>

        <div class="tab-content mb-2 text-center">

            <div class="tab-pane fade show active" id="rebates" role="tabpanel" aria-labelledby="rebates-tab">


                <div class="row">

                    <div class="col-lg-3">

                        <div class="card border">

                            <div class="card-header border-light">
                                Total Rebates </div>

                            <div class="card-body text-center">
                                <a href="{{route('seller.rebates',array('camp_id'=>$camp->id,'state'=>'total'))}}">
                                    <span class="display-4">
                                        {{$total_rebate}}
                                    </span>
                                </a>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3">

                        <div class="card border">

                            <div class="card-header border-light">
                                Average Rebates / Day </div>

                            <div class="card-body text-center">
                                <span class="display-4">
                                @if($camp->complete_date)
                                {{round($total_rebate/((strtotime($camp->complete_date)-strtotime($camp->start_date))/3600/24+1)*100)/100}}
                                @else
                                0
                                @endif
                                </span>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="card border">

                            <div class="card-header border-light">
                                Waiting Purchase / Expired / Canceled Rebates </div>

                            <div class="card-body text-center">
                                <span class="display-4">{{$total_rebate-$app-$declined}}</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="card border">

                            <div class="card-header border-light">
                                Approved Rebates </div>

                            <div class="card-body text-center">
                                <a href="{{route('seller.rebates',array('camp_id'=>$camp->id,'state'=>'app'))}}">
                                    <span class="display-4">
                                        {{$app}}
                                    </span>
                                </a>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="card border">

                            <div class="card-header border-light">
                                Declined Rebates </div>

                            <div class="card-body text-center">
                                <a href="{{route('seller.rebates',array('camp_id'=>$camp->id,'state'=>'declined'))}}">
                                    <span class="display-4">{{$declined}}</span>
                                </a>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="card">

                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>

                        {!! $campChart->container() !!}

                        @if($campChart)
                        {!! $campChart->script() !!}
                        @endif

                    </div>

                </div>

            </div>

            <div class="tab-pane fade" id="campaign" role="tabpanel" aria-labelledby="deal-tab">


                <div class="row">



                    <div class="col-md-6">

                        <div class="card border">

                            <div class="card-header border-light d-flex align-items-center justify-content-between">
                                Hits <i class="fal fa-fw fa-info-circle" data-toggle="tooltip" data-placement="top"
                                    title=""
                                    data-original-title="Number of times the rebate has been displayed in listings"></i>
                            </div>

                            <div class="card-body">

                                <canvas id="chart-hit" height="0" class="chartjs-render-monitor" width="0"
                                    style="display: block; width: 0px; height: 0px;"></canvas>

                                <script>
                                $(function() {

                                    RK.Seller.drawSummaryEventChart($('#chart-hit'), {
                                        "labels": ["Jan 28", "Jan 29", "Jan 30", "Jan 31", "Feb 01",
                                            "Feb 02", "Feb 03"
                                        ],
                                        "datasets": [{
                                            "label": "Hits",
                                            "backgroundColor": "rgba(32, 168, 216, 0.31)",
                                            "borderColor": "rgba(32, 168, 216, 0.7)",
                                            "pointBorderColor": "rgba(32, 168, 216, 0.7)",
                                            "pointBackgroundColor": "rgba(32, 168, 216, 0.7)",
                                            "pointHoverBackgroundColor": "#fff",
                                            "pointHoverBorderColor": "rgba(220, 220, 220, 1)",
                                            "pointBorderWidth": 1,
                                            "lineTension": 0,
                                            "data": [13460, 3095, 211, 0, 0, 0, 0]
                                        }, {
                                            "label": "Unique Hits",
                                            "backgroundColor": "rgba(77, 189, 116, 0.31)",
                                            "borderColor": "rgba(77, 189, 116, 0.9)",
                                            "pointBorderColor": "rgba(77, 189, 116, 0.9)",
                                            "pointBackgroundColor": "rgba(77, 189, 116, 0.9)",
                                            "pointHoverBackgroundColor": "#fff",
                                            "pointHoverBorderColor": "rgba(220,220,220,1)",
                                            "pointBorderWidth": 1,
                                            "lineTension": 0,
                                            "data": [3346, 2131, 159, 0, 0, 0, 0]
                                        }]
                                    });

                                });
                                </script>

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="callout callout-primary">
                                            <small class="text-muted">Total Hits</small>
                                            <br>
                                            <strong class="h6">16766</strong>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="callout callout-success">
                                            <small class="text-muted">Total Unique Hits</small>
                                            <br>
                                            <strong class="h6">5636</strong>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="card border">

                            <div class="card-header border-light d-flex align-items-center justify-content-between">
                                Views <i class="fal fa-fw fa-info-circle" data-toggle="tooltip" data-placement="top"
                                    title=""
                                    data-original-title="Number of times the rebate has been viewed (pop up)"></i>
                            </div>

                            <div class="card-body">

                                <canvas id="chart-view" height="0" class="chartjs-render-monitor" width="0"
                                    style="display: block; width: 0px; height: 0px;"></canvas>

                                <script>
                                $(function() {

                                    RK.Seller.drawSummaryEventChart($('#chart-view'), {
                                        "labels": ["Jan 28", "Jan 29", "Jan 30", "Jan 31", "Feb 01",
                                            "Feb 02", "Feb 03"
                                        ],
                                        "datasets": [{
                                            "label": "Views",
                                            "backgroundColor": "rgba(32, 168, 216, 0.31)",
                                            "borderColor": "rgba(32, 168, 216, 0.7)",
                                            "pointBorderColor": "rgba(32, 168, 216, 0.7)",
                                            "pointBackgroundColor": "rgba(32, 168, 216, 0.7)",
                                            "pointHoverBackgroundColor": "#fff",
                                            "pointHoverBorderColor": "rgba(220, 220, 220, 1)",
                                            "pointBorderWidth": 1,
                                            "lineTension": 0,
                                            "data": [22, 201, 129, 160, 0, 0, 0, 0]
                                        }, {
                                            "label": "Unique Views",
                                            "backgroundColor": "rgba(77, 189, 116, 0.31)",
                                            "borderColor": "rgba(77, 189, 116, 0.9)",
                                            "pointBorderColor": "rgba(77, 189, 116, 0.9)",
                                            "pointBackgroundColor": "rgba(77, 189, 116, 0.9)",
                                            "pointHoverBackgroundColor": "#fff",
                                            "pointHoverBorderColor": "rgba(220,220,220,1)",
                                            "pointBorderWidth": 1,
                                            "lineTension": 0,
                                            "data": [19, 153, 84, 22, 0, 0, 0, 0]
                                        }]
                                    });

                                });
                                </script>

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="callout callout-primary">
                                            <small class="text-muted">Total Views</small>
                                            <br>
                                            <strong class="h6">527</strong>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="callout callout-success">
                                            <small class="text-muted">Total Unique Views</small>
                                            <br>
                                            <strong class="h6">292</strong>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="card border">

                            <div class="card-header border-light d-flex align-items-center justify-content-between">
                                Instructions <i class="fal fa-fw fa-info-circle" data-toggle="tooltip"
                                    data-placement="top" title=""
                                    data-original-title="Number of times buyers have seen instructions to buy"></i>
                            </div>

                            <div class="card-body">

                                <canvas id="chart-instructions" height="0" class="chartjs-render-monitor" width="0"
                                    style="display: block; width: 0px; height: 0px;"></canvas>

                                <script>
                                $(function() {

                                    RK.Seller.drawSummaryEventChart($('#chart-instructions'), {
                                        "labels": ["Jan 28", "Jan 29", "Jan 30", "Jan 31", "Feb 01",
                                            "Feb 02", "Feb 03"
                                        ],
                                        "datasets": [{
                                            "label": "Instructions",
                                            "backgroundColor": "rgba(32, 168, 216, 0.31)",
                                            "borderColor": "rgba(32, 168, 216, 0.7)",
                                            "pointBorderColor": "rgba(32, 168, 216, 0.7)",
                                            "pointBackgroundColor": "rgba(32, 168, 216, 0.7)",
                                            "pointHoverBackgroundColor": "#fff",
                                            "pointHoverBorderColor": "rgba(220, 220, 220, 1)",
                                            "pointBorderWidth": 1,
                                            "lineTension": 0,
                                            "data": [2, 4, 0, 0, 0, 0, 0]
                                        }, {
                                            "label": "Unique Instructions",
                                            "backgroundColor": "rgba(77, 189, 116, 0.31)",
                                            "borderColor": "rgba(77, 189, 116, 0.9)",
                                            "pointBorderColor": "rgba(77, 189, 116, 0.9)",
                                            "pointBackgroundColor": "rgba(77, 189, 116, 0.9)",
                                            "pointHoverBackgroundColor": "#fff",
                                            "pointHoverBorderColor": "rgba(220,220,220,1)",
                                            "pointBorderWidth": 1,
                                            "lineTension": 0,
                                            "data": [2, 4, 0, 0, 0, 0, 0]
                                        }]
                                    });

                                });
                                </script>

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="callout callout-primary">
                                            <small class="text-muted">Total Instructions</small>
                                            <br>
                                            <strong class="h6">6</strong>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="callout callout-success">
                                            <small class="text-muted">Total Unique Instructions</small>
                                            <br>
                                            <strong class="h6">6</strong>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="card border">

                            <div class="card-header border-light d-flex align-items-center justify-content-between">
                                Buy Clicks <i class="fal fa-fw fa-info-circle" data-toggle="tooltip"
                                    data-placement="top" title=""
                                    data-original-title="Number of times buyers have clicked on the Buy button"></i>
                            </div>

                            <div class="card-body">

                                <canvas id="chart-buy" height="0" class="chartjs-render-monitor" width="0"
                                    style="display: block; width: 0px; height: 0px;"></canvas>

                                <script>
                                $(function() {

                                    RK.Seller.drawSummaryEventChart($('#chart-buy'), {
                                        "labels": ["Jan 28", "Jan 29", "Jan 30", "Jan 31", "Feb 01",
                                            "Feb 02", "Feb 03"
                                        ],
                                        "datasets": [{
                                            "label": "Buy Clicks",
                                            "backgroundColor": "rgba(32, 168, 216, 0.31)",
                                            "borderColor": "rgba(32, 168, 216, 0.7)",
                                            "pointBorderColor": "rgba(32, 168, 216, 0.7)",
                                            "pointBackgroundColor": "rgba(32, 168, 216, 0.7)",
                                            "pointHoverBackgroundColor": "#fff",
                                            "pointHoverBorderColor": "rgba(220, 220, 220, 1)",
                                            "pointBorderWidth": 1,
                                            "lineTension": 0,
                                            "data": [2, 2, 0, 0, 0, 0, 0]
                                        }, {
                                            "label": "Unique Buy Clicks",
                                            "backgroundColor": "rgba(77, 189, 116, 0.31)",
                                            "borderColor": "rgba(77, 189, 116, 0.9)",
                                            "pointBorderColor": "rgba(77, 189, 116, 0.9)",
                                            "pointBackgroundColor": "rgba(77, 189, 116, 0.9)",
                                            "pointHoverBackgroundColor": "#fff",
                                            "pointHoverBorderColor": "rgba(220,220,220,1)",
                                            "pointBorderWidth": 1,
                                            "lineTension": 0,
                                            "data": [2, 2, 0, 0, 0, 0, 0]
                                        }]
                                    });

                                });
                                </script>

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="callout callout-primary">
                                            <small class="text-muted">Total Buy Clicks</small>
                                            <br>
                                            <strong class="h6">4</strong>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="callout callout-success">
                                            <small class="text-muted">Total Unique Buy Clicks</small>
                                            <br>
                                            <strong class="h6">4</strong>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    <input type="hidden" id="camp_id" value="{{$camp->id}}">

    </div>
    <script src="{{asset('/js/Chart.min.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            camp_id=$("#camp_id").val();
            share_url='http://'+window.location.hostname+'/shop_site/buyer/buy_confirm/'+camp_id;
            $("#share-url").attr('href',share_url);
            $("#share-url").html(share_url);
        })
    </script>

</main>

@endsection
