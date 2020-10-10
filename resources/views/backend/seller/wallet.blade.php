@extends('backend.seller.layouts.app')
@section('content')
<style type="text/css">
    .width-60{
        width: 60% !important;
        margin: auto;
    }
    .razorpay-payment-button{
        color: #fff ;
        background-color: #20a8d8 ;
        border-color: #20a8d8 ;
        display: block;
        width: 100%;
        font-weight: 500;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: .5625rem 1.25rem;
        font-size: 1rem;
        line-height: 1.56;
        border-radius: .1875rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Wallet</li>
    </ol>
    @if (session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            @if(session('status') == 'Failed')
            <div class="alert alert-danger" role="alert">
                <i class="fal fa-exclamation-triangle"></i>
                Please Refill Your General Wallet With Campaign Amount of ₹ {{ session('amount_to_be_considered_for_deduction_from_general_wallet') }} or more to Activate! <br />
                <i>Note: To Run Campaign Continuously Please Add Total Campaign Amount.</i>
            </div>
            @else
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{ session('status') }}</div>
            @endif
        </div>
    </section>
    @endisset
    <div class="container-fluid">

        <div class="card">

            <div class="card-body text-center" style="display: flex">

          <!--       <div class="col-6">

                    <h5 class="my-5">Total Wallet</h5>

                    <h1 class="my-4">
                        <span class="text-info">₹{{$wallet_sum}}</span>
                    </h1>
                </div> -->

                <div class="col-12">

                    <div class="alert alert-info">
                        <i class="fal fa-info-circle"></i>
                        This is your general wallet. Available funds in this wallet can be used to pay your campaigns. Note
                        that every campaign manages its own wallet. Remaining money from your campaigns (cancelled /
                        completed) will be automatically transferred to your general wallet. The transfer happens every day
                        at 01:00 am IST. </div>

                    <h5 class="my-5">General Wallet</h5>

                    <h1 class="my-4">
                        <span class="text-info">₹{{round($general_amount, 2)}}</span>
                    </h1>
                    <!-- <a class="btn btn-dark btn-block transaction-class" data-toggle="modal"
                        data-target="#general-modal" href="">
                        Charge Wallet
                    </a> -->
                    <div class="row">
                        <div class="col-md-3"></div>

                        <form role="form"  action="{{route('razor-wallet')}}" method="POST" class="require-validation col-md-1" >
                            @csrf
                            <input type="hidden" name="amount" value="{{round($order_100['amount']/100)}}">
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{config('services.razor.key')}}"
                                data-order_id="{{$order_100['id']}}"
                                data-currency="INR"
                                data-buttontext="₹100"
                                data-name="Influencer Pulse"
                                data-description="Campaign"
                                data-image="https://i.imgur.com/n5tjHFD.png"
                                data-prefill.name="{{Auth()->user()->name}}"
                                data-prefill.email="{{Auth()->user()->email}}"
                                data-prefill.contact="{{Auth()->user()->phone}}"
                                data-theme.color="#F37254" >

                            </script>
                            <input type="hidden" custom="Hidden Element" name="hidden">
                        </form>

                        <form role="form"  action="{{route('razor-wallet')}}" method="POST" class="require-validation col-md-1" >
                            @csrf
                            <input type="hidden" name="amount" value="{{round($order_250['amount']/100)}}">
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{config('services.razor.key')}}"
                                data-order_id="{{$order_250['id']}}"
                                data-currency="INR"
                                data-buttontext="₹250"
                                data-name="Influencer Pulse"
                                data-description="Campaign"
                                data-image="https://i.imgur.com/n5tjHFD.png"
                                data-prefill.name="{{Auth()->user()->name}}"
                                data-prefill.email="{{Auth()->user()->email}}"
                                data-prefill.contact="{{Auth()->user()->phone}}"
                                data-theme.color="#F37254" >

                            </script>
                            <input type="hidden" custom="Hidden Element" name="hidden">
                        </form>

                        <form role="form"  action="{{route('razor-wallet')}}" method="POST" class="require-validation col-md-1" >
                            @csrf
                            <input type="hidden" name="amount" value="{{round($order_500['amount']/100)}}">
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{config('services.razor.key')}}"
                                data-order_id="{{$order_500['id']}}"
                                data-currency="INR"
                                data-buttontext="₹500"
                                data-name="Influencer Pulse"
                                data-description="Campaign"
                                data-image="https://i.imgur.com/n5tjHFD.png"
                                data-prefill.name="{{Auth()->user()->name}}"
                                data-prefill.email="{{Auth()->user()->email}}"
                                data-prefill.contact="{{Auth()->user()->phone}}"
                                data-theme.color="#F37254" >

                            </script>
                            <input type="hidden" custom="Hidden Element" name="hidden">
                        </form>

                        <form role="form"  action="{{route('razor-wallet')}}" method="POST" class="require-validation col-md-1" >
                            @csrf
                            <input type="hidden" name="amount" value="{{round($order_1000['amount']/100)}}">
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{config('services.razor.key')}}"
                                data-order_id="{{$order_1000['id']}}"
                                data-currency="INR"
                                data-buttontext="₹1000"
                                data-name="Influencer Pulse"
                                data-description="Campaign"
                                data-image="https://i.imgur.com/n5tjHFD.png"
                                data-prefill.name="{{Auth()->user()->name}}"
                                data-prefill.email="{{Auth()->user()->email}}"
                                data-prefill.contact="{{Auth()->user()->phone}}"
                                data-theme.color="#F37254" >

                            </script>
                            <input type="hidden" custom="Hidden Element" name="hidden">
                        </form>

                        <form role="form"  action="{{route('razor-wallet')}}" method="POST" class="require-validation col-md-1" >
                            @csrf
                            <input type="hidden" name="amount" value="{{round($order_3000['amount']/100)}}">
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{config('services.razor.key')}}"
                                data-order_id="{{$order_3000['id']}}"
                                data-currency="INR"
                                data-buttontext="₹3000"
                                data-name="Influencer Pulse"
                                data-description="Campaign"
                                data-image="https://i.imgur.com/n5tjHFD.png"
                                data-prefill.name="{{Auth()->user()->name}}"
                                data-prefill.email="{{Auth()->user()->email}}"
                                data-prefill.contact="{{Auth()->user()->phone}}"
                                data-theme.color="#F37254" >

                            </script>
                            <input type="hidden" custom="Hidden Element" name="hidden">
                        </form>

                        <form role="form"  action="{{route('razor-wallet')}}" method="POST" class="require-validation col-md-1" >
                            @csrf
                            <input type="hidden" name="amount" value="{{round($order_5000['amount']/100)}}">
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{config('services.razor.key')}}"
                                data-order_id="{{$order_5000['id']}}"
                                data-currency="INR"
                                data-buttontext="₹5000"
                                data-name="Influencer Pulse"
                                data-description="Campaign"
                                data-image="https://i.imgur.com/n5tjHFD.png"
                                data-prefill.name="{{Auth()->user()->name}}"
                                data-prefill.email="{{Auth()->user()->email}}"
                                data-prefill.contact="{{Auth()->user()->phone}}"
                                data-theme.color="#F37254" >

                            </script>
                            <input type="hidden" custom="Hidden Element" name="hidden">
                        </form>

                        <form role="form"  action="{{route('razor-wallet')}}" method="POST" class="require-validation col-md-1" >
                            @csrf
                            <input type="hidden" name="amount" value="{{round($order_10000['amount']/100)}}">
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{config('services.razor.key')}}"
                                data-order_id="{{$order_10000['id']}}"
                                data-currency="INR"
                                data-buttontext="₹10000"
                                data-name="Influencer Pulse"
                                data-description="Campaign"
                                data-image="https://i.imgur.com/n5tjHFD.png"
                                data-prefill.name="{{Auth()->user()->name}}"
                                data-prefill.email="{{Auth()->user()->email}}"
                                data-prefill.contact="{{Auth()->user()->phone}}"
                                data-theme.color="#F37254" >

                            </script>
                            <input type="hidden" custom="Hidden Element" name="hidden">
                        </form>
                    </div>
                </div>

            </div>


        </div>

        <div class="card-deck d-block d-xl-flex">

            <div class="card mb-2">

                <div class="card-header">
                    Credit/debit Card </div>

                <div class="card-body">

                    <div>
                        <i class="fal fa-info-circle"></i>
                        Link a credit/debit card to your seller account and pay your campaigns easily and
                        quickly. </div>

                </div>

                <div class="card-footer text-center d-md-flex align-items-center justify-content-center">
                    <form method="post">

                        <input type="hidden" name="action" value="card">

                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_live_OccHHHtjcPBdA1SU4MZoKuqj" data-name="influencerpulse"
                            data-description="Add Credit Card" data-email="monolit2048@gmail.com" data-locale="auto"
                            data-image="https://influencerpulse.com/assets/img/logo_stripe.png" data-label="Add Credit Card">
                        </script>
                    </form>
                </div>

            </div>

            <div class="card mb-2">

                <div class="card-header">
                    Bank </div>

                <div class="card-body">

                    <div>
                        <i class="fal fa-info-circle"></i>
                        Link a bank account to your seller account and send a large amount of money with one ACH
                        transfer to pay multiple campaigns. </div>

                </div>

                <div class="card-footer text-center d-md-flex align-items-center justify-content-center">
                    <a class="btn btn-primary" data-toggle="modal"
                     {{-- data-target="#generic-modal" --}}
                        href="">
                        Add Bank Account </a>
                </div>

            </div>

            <div class="card mb-2">

                <div class="card-header">
                    Wire transfer </div>

                <div class="card-body">

                    <div>
                        <i class="fal fa-info-circle"></i>
                        Send a wire transfer to easily add money to your wallet. It could take up to 2 business
                        days to be processed automatically (5 business days for international transfers). </div>

                </div>

                <div class="card-footer text-center d-md-flex align-items-center justify-content-center">
                    <a class="btn btn-primary" data-toggle="modal"
                    {{-- data-target="#generic-modal" --}}
                        data-modal-size="modal-lg" href="">
                        Send Wire Transfer </a>
                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-history"></i> Wallet Logs
            </div>

            <div class="card-body">

                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">

                    <li class="nav-item " data-toggle="tooltip" data-placement="top" title="All your campaigns">
                            <a class="nav-link active" data-toggle="tab" id="all-tab" href="#wallets" role="tab"
                                aria-controls="all">Wallet Logs ({{count($wallets)}})</a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="Campaigns that are offline / out of funds">
                        <a class="nav-link" data-toggle="tab" id="offline-tab" href="#offline" role="tab"
                            aria-controls="offline">Offline Campaigns ({{count($offline)}})</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="Campaigns that are offline / out of funds">
                        <a class="nav-link" data-toggle="tab" id="offline-tab" href="#camp-wallet" role="tab"
                            aria-controls="offline">Campaigns Wallet ({{count($camp_wallets)}})</a>
                    </li>
                </ul>


                <div class="tab-content">

                    <div class="tab-pane fade show active" id="wallets" role="tabpanel" aria-labelledby="wallets-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Operation</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($wallets))
                                    @foreach($wallets as $key=>$wallet)
                                    <tr>
                                        <td>{{ date('j F, Y ', strtotime($wallet->date)) }}<br>
                                            {{ date('h:m ', strtotime($wallet->date)) }} EST
                                        </td>
                                        <td class="w-50" style="max-width: 500px !important;">{{$wallet->description}}</td>
                                        <td>{{$wallet->operation}}</td>
                                        <td>
                                            ₹{{$wallet->amount}} <br>
                                            <small class="text-muted">
                                                + ₹{{$wallet->fee_amount}} fee </small>
                                        </td>
                                         <td> {{$wallet->payment_method}} </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No billing transactions yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="tab-pane fade " id="offline" role="tabpanel" aria-labelledby="offline-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Campaign</th>
                                        <th>Product</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>Wallet</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  <?php $today = strtotime(date('yy-m-d'));?>
                                    @if(count($offline))
                                    @foreach($offline as $key=>$camp)
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
                                                ₹{{$camp->price}} </small>
                                            <span class="text-success">
                                                ₹{{$camp->rebate_price}} </span><br>
                                            <small>
                                                {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF </small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td class="text-danger">₹{{ number_format($camp->Wallet, 2, '.', ',') }}
                                        </td>
                                        <td class="text-center">
                                            @if($today > strtotime($camp->count_time) && $camp->permission == "offline"))
                                            <a class="btn btn-primary btn-block"
                                            href="{{route('camp.activate', $camp->id)}}">

                                                Activate the campaign now
                                            </a>
                                            @endif
                                           <!--  <a class="btn btn-dark btn-block  width-60" data-toggle="modal"
                                            data-target="#charge-modal" data-key='stripe' data-camp_id="{{$camp->id}}"
                                            href="">
                                                Charge Camapign with Stripe
                                            </a> -->
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No billing transactions yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="tab-pane fade " id="camp-wallet" role="tabpanel" aria-labelledby="camp-wallet-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Campaign</th>
                                        <th>Product</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>Wallet</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($camp_wallets))
                                    @foreach($camp_wallets as $key=>$camp)
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
                                                ₹{{$camp->price}} </small>
                                            <span class="text-success">
                                                ₹{{$camp->rebate_price}} </span><br>
                                            <small>
                                                {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF </small>
                                            @endif

                                        </td>
                                        <td>

                                            <span class="text-info">{{$camp->permission}}</span> </td>
                                        <td>
                                            {{$camp->start_date}}<br>
                                            {{$camp->start_time}} </td>
                                        <td>₹{{ number_format($camp->wallet, 2, '.', ',') }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No billing transactions yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>

                    </div>




            </div>

        </div>

    </div>

    <!-- charge modal -->
    <div class="modal fade" id="charge-modal" tabindex="-1" role="dialog"
        style="padding-right: 17px; display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header align-items-center" style="    flex-flow: column-reverse !important; ">
                    <h6 class="modal-title text-center" id="modal-fee">
                        {{$fee->paypal_fee}} % fee
                    </h6>
                    <h6 class="modal-title text-center" id="modal-general">
                        ₹ {{$general_amount}}
                    </h6>

                    <h5 class="modal-title text-center"> Charge <span class="text-danger">Campaign</span> </h5>



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>


                </div>

                <div class="modal-body">

                    <form id="write-wallet-form" method="post" action="{{route('camp.chage')}}"
                        enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                        @csrf
                        <button
                            type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                        <input type="hidden" name="amount" id="stripe-amount">
                        <input type="hidden" name="desription" id="wallet-description">
                        <input type="hidden" name="camp_id"  id="camp_id">

                        <input type="hidden" id="modal-key" name="modal_key">



                        <div class="form-group fv-has-feedback">
                            <label for="message" class="form-control-label">Amount</label>
                            <div class="controls">
                                <select class="form-control" name="amount" id="charge-amount">
                                    <option value="200">₹ 200</option>
                                    <option value="500">₹ 500</option>
                                    <option value="1000">₹ 1000</option>
                                    <option value="2500">₹ 2500</option>
                                    <option value="5000">₹ 5000</option>
                                    <option value="10000">₹ 10000</option>
                                    <option value="25000">₹ 25000</option>
                                    <option value="50000">₹ 50000</option>
                                    <option value="100000">₹ 100000</option>
                                </select>
                                <i style=""
                                class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="message"></i>
                            </div>
                            <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                data-fv-for="message" data-fv-result="NOT_VALIDATED">The amount is required.</small>
                        </div>

                        <div class="stripe-button-lg stripe-button-block" id="camp-charge">

                        </div>
                    </form>

                </div>
                <input type="hidden" id="stripe-fee" value="{{$fee->paypal_fee}}">
                <input type="hidden" id="auth-email" value="{{auth()->user()->email}}">

                <script>
                function charge_wallet(key){


                    amount=$("#charge-amount").val();
                    fee=$("#stripe-fee").val();
                    email=$("#auth-email").val();

                    key=$("#modal-key").val();

                    if(key=='stripe'){
                        $("#modal-fee").css('display', 'none');
                        $("#modal-general").css('display', 'none');
                        $("#modal-fee").css('display', 'block');


                        $("#stripe-amount").val(amount);
                        $("#wallet-description").val('Charge campaign with Stripe');

                        stripe_modal=` <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_ypYAqYGU91QcBzRjrJcCkTvX00N4QXGYwu"
                                data-amount="`+ Math.round(amount*(1+fee/100)*100*100)/100 +`"
                                data-description="For wallet charge"
                                data-email="`+ email +`"
                                data-image="https://influencerpulse.com/assets/img/logo_stripe.png"
                                data-locale="auto"
                                data-label="Charge wallet ₹`+ Math.round(amount*(1+fee/100)*100)/100 +` with Stripe">`;
                        $("#camp-charge").html('');
                        $("#camp-charge").html(stripe_modal);
                    }

                    if(key=='wallet'){
                        $("#modal-fee").css('display', 'none');
                        $("#modal-general").css('display', 'none');
                        $("#modal-general").css('display', 'block');

                        $("#stripe-amount").val(amount);
                        $("#wallet-description").val('Charge campaign with Wallet');

                        stripe_modal=`<button type="submit" class="btn btn-primary" style="visibility: visible; width:100%"><span style="display: block; min-height: 30px;">Charge wallet ₹ `+amount+` with Wallet</span></button>`;
                        $("#camp-charge").html('');
                        $("#camp-charge").html(stripe_modal);
                    }

                }

                $(function() {

                    /*$(".width-60").on('click', function(){
                        key=$(this).data('key');
                        $("#modal-key").val(key);
                        camp_id=$(this).data('camp_id');
                        $("#camp_id").val(camp_id);
                        charge_wallet();
                    })*/

                    $("#charge-amount").on('change', function(){
                        charge_wallet();
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
    <!-- charge modal end -->

    <!-- charge modal -->
    <div class="modal fade" id="general-modal" tabindex="-1" role="dialog"
        style="padding-right: 17px; display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header align-items-center" style="flex-flow: column-reverse !important; ">
                    <h6 class="modal-title text-center">
                        {{$fee->paypal_fee}} % fee
                    </h6>
                    <h6 class="modal-title text-center">
                        Choose the amount to recharge your account.
                    </h6>
                    <h5 class="modal-title text-center"> Upgrade Your <span class="text-danger">Wallet</span> Limit</h5>



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>

                </div>

                <div class="modal-body">

                    <form id="general-write-wallet-form" method="post" action="{{route('general.chage')}}"
                        enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                        @csrf
                        <button
                            type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                        <!-- <input type="hidden" name="amount" id="general-stripe-amount"> -->
                        <!-- <input type="hidden" name="desription" id="general-wallet-description"> -->
                        <!-- <input type="hidden" name="camp_id" value=""> -->


                        <div class="form-group fv-has-feedback">
                            <label for="message" class="form-control-label">Amount</label>
                            <div class="controls">
                                <select class="form-control" name="amount" id="general-charge-amount" required>
                                    <option >Select Amount</option>
                                    <option value="200">₹ 200</option>
                                    <option value="500">₹ 500</option>
                                    <option value="1000">₹ 1000</option>
                                    <option value="2500">₹ 2500</option>
                                    <option value="5000">₹ 5000</option>
                                    <option value="10000">₹ 10000</option>
                                    <option value="25000">₹ 25000</option>
                                    <option value="50000">₹ 50000</option>
                                    <option value="100000">₹ 100000</option>
                                </select>
                                <i style=""
                                class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="message"></i>
                            </div>
                            <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                data-fv-for="message" data-fv-result="NOT_VALIDATED">The amount is required.</small>
                        </div>
                        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_GDbhX0kle1OklP" data-order_id="order_EOm8aXZnYDiS0d" data-amount="2500000" data-currency="INR" data-buttontext="Charge wallet with RazorPay" data-name="Influencer Pulse" data-description="Charge wallet with RazorPay" data-image="https://i.imgur.com/n5tjHFD.png" data-prefill.name="seller_updatename" data-prefill.email="seller@seller.com" data-prefill.contact="19027035451" data-theme.color="#F37254"></script>

                        <div class="stripe-button-lg stripe-button-block" id="pay_btn">
                           <button class="btn btn-dark btn-block"  type="submit">Charge wallet with RazorPay </button>

                        </div>
                    </form>

                </div>
                <input type="hidden" id="general-stripe-fee" value="{{$fee->paypal_fee}}">
                <input type="hidden" id="general-auth-email" value="{{auth()->user()->email}}">
                <input type="hidden" id="razor_order">

                <script>


                    function submit_order(amount){
                        $.ajax({
                            method: 'post',
                            url: "{!!route('submit_order')!!}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                amount: amount
                            },
                            success: function (result) {
                                console.log(result);
                                razor_pay="";
                                amount=100*($("#general-charge-amount").val());
                                razor_pay=`<script
                                            src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{config('services.razor.key')}}"
                                            data-order_id=`+result+`
                                            data-amount="`+amount+`"
                                            data-currency="INR"
                                            data-buttontext="Charge wallet with RazorPay"
                                            data-name="Influencer Pulse"
                                            data-description="Charge wallet with RazorPay"
                                            data-image="https://i.imgur.com/n5tjHFD.png"
                                            data-prefill.name="{{Auth()->user()->name}}"
                                            data-prefill.email="{{Auth()->user()->email}}"
                                            data-prefill.contact="{{Auth()->user()->phone}}"
                                            data-theme.color="#F37254" >`;
                                console.log("asdf",razor_pay);

                                $("#pay_btn").html(razor_pay);

                            },
                            error:function(e){
                                console.log(e);
                            }
                        })
                    }



                $(function() {

                    $("#general-charge-amount").on('change', function(){
                        amount=$(this).val()
                        submit_order(amount);
                    })




                    $('#general-write-message-form').on('init.field.fv', function(e, data) {
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
                                        message: 'The message is required.'
                                    }
                                }
                            }
                        }
                    });

                });
                </script>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            </div>
        </div>
    </div>
    <!-- charge modal end -->
<!--
    <script>

        var options = {
            key: "{{ env('RAZORPAY_KEY') }}",
            amount: '247500',
            name: 'CodesCompanion',
            description: 'TVS Keyboard',
            image: 'https://i.imgur.com/n5tjHFD.png',
            handler: demoSuccessHandler
        }
        window.r = new Razorpay(options);
        document.getElementById('paybtn').onclick = function () {
            r.open()
        }
    </script>
 -->
    <script src="https://cdn.plaid.com/link/v2/stable/link-initialize.js"></script>

</main>
@endsection
