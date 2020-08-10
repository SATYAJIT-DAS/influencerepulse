@extends('backend.seller.layouts.app')
@section('content')
<style type="text/css">
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
        <li class="breadcrumb-item"><a href="{{route('seller.campaigns')}}">Campaigns</a></li>
        <li class="breadcrumb-item"><a href="{{route('seller.campaigns')}}">Campaign
                #67856</a></li>
        <li class="breadcrumb-item active">Payment</li>
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
            @isset ($msg)
            <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        <i class="fal fa-check"></i> {{ $msg }}</div>
                </div>
            </section>
            @endisset
            @isset ($error)
            <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
                <div class="container-fluid">
                    <div class="alert alert-danger" role="alert">
                        <i class="fal fa-check"></i> {{ $error }}</div>
                </div>
            </section>
            @endisset


        <ul class="stepper stepper-horizontal">

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'basics'))}}">
                    <span class="circle">1</span>
                    <span class="label">Basics</span>
                </a>
            </li>

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'pic'))}}">
                    <span class="circle">2</span>
                    <span class="label">Pictures</span>
                   
                </a>
            </li>

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'set'))}}" >
                    <span class="circle">3</span>
                    <span class="label">Settings</span>
                    
                </a>
            </li>

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'preview'))}}">
                    <span class="circle">4</span>
                    <span class="label">Preview</span>
                </a>
            </li>

            <li class="active">
                <a href="#" class="disabled">
                    <span class="circle">5</span>
                    <span class="label">Payment</span>
                </a>
            </li>

            <li>
                <a href="#" class="disabled">
                    <span class="circle">6</span>
                    <span class="label">
                        Submission </span>
                </a>
            </li>

        </ul>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-money"></i> Campaign Payment </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-xl-8 mb-2 mb-xl-0">

                        <div class="alert alert-info">
                            <i class="fal fa-info-circle"></i>
                            To start your campaign, please prepay the first publication day. We'll charge your
                            wallet / credit card automatically daily (only if necessary) to cover your campaign
                            costs once your campaign is online. </div>

                        <div id="payment-methods-accordion" class="nice-accordion" role="tablist">

                            <div class="card">

                                <div id="collapse-card-heading" class="card-header">

                                    <div class="row align-items-center">

                                        <div class="col-lg-7">
                                            <h5 class="mb-lg-0">
                                                <a data-toggle="collapse" href="#collapse-card" aria-expanded="true"
                                                    aria-controls="collapse-card" class="roboto-medium">
                                                    <i class="fal fa-fw fa-credit-card"></i>
                                                    Pay with credit card </a>
                                            </h5>
                                        </div>

                                        <div class="col-lg-5 text-lg-right">

                                            <div class="d-flex align-items-center justify-content-between">

                                                <div data-toggle="tooltip" data-container="body"
                                                    tile="Additional 3.00% fee for credit/debit card payment">
                                                    {{$fee->paypal_fee}}% fee </div>

                                                <div class="text-success" data-toggle="tooltip" data-container="body"
                                                    title="Payment reported automatically and instantly">
                                                    <i class="fal fa-bolt"></i> Instantly </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div id="collapse-card" class="collapse show" role="tabpanel" aria-labelledby="collapse-card-heading" data-parent="#payment-methods-accordion">

                                    <div class="card-body">

                                        <div class="d-md-flex align-items-center justify-content-between">

                                            <p>Secure, fast and easy payment with your credit/debit card.</p>

                                            <p>
                                                <i class="fab fa-fw fa-cc-visa fa-2x text-danger"></i>
                                                <i class="fab fa-fw fa-cc-mastercard fa-2x text-warning"></i>
                                                <i class="fab fa-fw fa-cc-amex fa-2x text-info"></i>
                                            </p>

                                        </div>

                                        <form role="form"  action="{{route('razor.post')}}" method="POST" class="require-validation" >
                                        @csrf
                                        <input type="hidden" name="camp_id" value="{{$camp->id}}">
                                        <input type="hidden" name="amount" value="{{ round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates) * 100)/100 }}">
                                        <script
                                            src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{config('services.razor.key')}}"
                                            data-order_id="{{$order_id}}"
                                            data-amount="{{$amount }}" 
                                            data-currency="INR"
                                            data-buttontext="Pay ₹{{ round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates) * (100+$fee->paypal_fee))/100 }} with Razorpay"
                                            data-name="Influencer Pulse"
                                            data-description="Campaign
                                            {{$camp->product_name}}"
                                            data-image="https://i.imgur.com/n5tjHFD.png"
                                            data-prefill.name="{{Auth()->user()->name}}"
                                            data-prefill.email="{{Auth()->user()->email}}"
                                            data-prefill.contact="{{Auth()->user()->phone}}"
                                            data-theme.color="#F37254" >
                                            
                                        </script>
                                        <input type="hidden" custom="Hidden Element" name="hidden">
                                        </form>





                                       <!-- <form role="form" action="{{route('stripe.post')}}" method="post" class="require-validation" id="payment-form">                                       
                                        @csrf
                                        <input type="hidden" name="pay_type" value="stripe">
                                        <input type="hidden" name="camp_id" value="{{$camp->id}}">
                                        <input type="hidden" name="amount" value="{{ round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates) * 100)/100 }}">

                                        <input type="hidden" name="description" value="{{$camp->description }}">
                                            <div class="stripe-button-lg stripe-button-block">
	                                            <script
									            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
									            data-key="{{ config('services.stripe.key') }}"
									            data-amount="{{ round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates) * (100+$fee->paypal_fee)) }}"
									            data-name="influencerpulse"
									            data-description="Campaign {{$camp->product_name}}"
									            data-email="{{Auth()->user()->email}}" 
									            data-image="https://influencerpulse.com/assets/img/logo_stripe.png"
									            data-locale="auto"
									            data-label="Pay ₹{{ round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates) * (100+$fee->paypal_fee))/100 }} with Stripe">
										        </script>
		                                    </div>
		                                </form> -->
		                            </div>

                                </div>

                               

                            </div>

                        </div>


                        <!-- wallet pay -->
                        <div id="payment-methods-accordion" class="nice-accordion" role="tablist">

                            <div class="card">

                                <div id="collapse-card-heading" class="card-header">

                                    <div class="row align-items-center">

                                        <div class="col-lg-7">
                                            <h5 class="mb-lg-0">
                                                <a data-toggle="collapse" href="#collapse-card" aria-expanded="true"
                                                    aria-controls="collapse-card" class="roboto-medium">
                                                    <i class="fal fa-fw fa-credit-card"></i>
                                                    Pay as Wallet </a>
                                            </h5>
                                        </div>

                                        

                                    </div>

                                </div>

                                <div id="collapse-card" class="collapse show" role="tabpanel" aria-labelledby="collapse-card-heading" data-parent="#payment-methods-accordion">

                                    <div class="card-body">

                                        <div class="d-md-flex align-items-center justify-content-between">
                                            <p>You can pay through the wallet. </p>

                                            <p><h5 style="margin-right: -135px">Current Wallet Balance : </h5><h1 class="text-info"> ₹{{$wallet_amount}} </h1></p>
                                        </div>

                                       <form role="form" action="{{route('stripe.post')}}" method="post" class="require-validation" id="payment-form">                                       
                                        @csrf
                                        <input type="hidden" name="pay_type" value="wallet">
                                        <input type="hidden" name="camp_id" value="{{$camp->id}}">
                                        <input type="hidden" name="amount" 
    value="{{ round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates) * 100)/100 }}">
                                        <!-- <input type="hidden" name="payment_method" value=""> -->

                                        <input type="hidden" name="description" value="{{$camp->description }}">

                                            <div class="stripe-button-lg stripe-button-block">
                                                <button type="submit" class="btn btn-block btn-dark" style="visibility: visible;">
                                                    <span style="display: block; min-height: 30px;">Pay ₹{{ round(($camp->price-$camp->rebate_price+$fee->rebate_fee)*($camp->daily_rebates) * 100)/100 }} using wallet balance</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                               

                            </div>

                        </div>

                        <!-- as wallet pay end -->

                        <!-- wallet charge -->
                       <!--  <div id="payment-methods-accordion" class="nice-accordion" role="tablist">

                            <div class="card">

                                <div id="collapse-card-heading" class="card-header">

                                    <div class="row align-items-center">

                                        <div class="col-lg-7">
                                            <h5 class="mb-lg-0">
                                                <a data-toggle="collapse" href="#collapse-card" aria-expanded="true"
                                                    aria-controls="collapse-card" class="roboto-medium">
                                                    <i class="fal fa-fw fa-credit-card"></i>
                                                    Charge as Wallet </a>
                                            </h5>
                                        </div>

                                        

                                    </div>

                                </div>

                                <div id="collapse-card" class="collapse show" role="tabpanel" aria-labelledby="collapse-card-heading" data-parent="#payment-methods-accordion">

                                    <div class="card-body">

                                        <div class="d-md-flex align-items-center justify-content-between">

                                            <p>You can charge the wallet. </p>

                                            <p>
                                                <i class="fab fa-fw fa-cc-visa fa-2x text-danger"></i>
                                                <i class="fab fa-fw fa-cc-mastercard fa-2x text-warning"></i>
                                                <i class="fab fa-fw fa-cc-amex fa-2x text-info"></i>
                                            </p>

                                        </div>
                                        <a class="btn btn-primary btn-block transaction-class" data-toggle="modal"
                                            data-target="#charge-modal"
                                            href="">
                                            Charge Wallet 
                                        </a>

                                       
                                    </div>

                                </div>

                               

                            </div>

                        </div> -->

                        <!-- end wallet charge -->

                    </div>

                    <div class="col-xl-4">

                        <div class="card">

                            <div class="card-header border-bottom-0 bg-light">
                                Why
                                <b>₹{{ number_format(($camp->price-$camp->rebate_price+$fee->rebate_fee)*$camp->daily_rebates, 2, '.', ',') }}</b>
                                / day? </div>

                            <div class="card-body border border-light">

                                <p>
                                    <i class="fal fa-info-circle"></i>
                                    Confused on why you are being charged
                                    <b>₹{{ number_format(($camp->price-$camp->rebate_price+$fee->rebate_fee)*$camp->daily_rebates, 2, '.', ',') }}</b>
                                    / day? </p>

                                <a class="btn btn-block btn-dark" data-toggle="modal" data-modal-size="modal-lg" href=""
                                    data-target="#payment-describe">
                                    See Explanations </a>

                            </div>

                        </div>

                        <div class="card mb-0">

                            <div class="card-header border-bottom-0 bg-light">
                                Campaign wallet </div>

                            <div class="card-body border border-light">
                                This money will be stored in a wallet dedicated to your campaign. In case the
                                whole amount is not used, you will be able to transfer it to your general wallet
                                later. </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" id="payment-describe" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header align-items-center">

                    <h5 class="modal-title">
                        Why are you being charged
                        ₹{{ number_format(($camp->price-$camp->rebate_price+$fee->rebate_fee)*$camp->daily_rebates, 2, '.', ',') }}
                        / day for your campaign? </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>

                </div>

                <div class="modal-body">

                    <ul class="stepper stepper-vertical">
                        <li class="active">
                            <a href="#!">
                                <span class="circle">1</span>
                                <span class="label">Discount Per Sale</span>
                            </a>
                            <div class="step-content p-1 w-75">

                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-muted text-uppercase font-weight-bold font-xs">
                                            Price </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-4">
                                        <div class="text-muted text-uppercase font-weight-bold font-xs">
                                            Discounted Price </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-3">
                                        <div class="text-muted text-uppercase font-weight-bold font-xs">
                                            YOU PAY </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        ₹{{ number_format(($camp->price), 2, '.', ',') }} </div>
                                    <div class="col-1">
                                        -
                                    </div>
                                    <div class="col-4">
                                        ₹{{ number_format(($camp->rebate_price), 2, '.', ',') }} </div>
                                    <div class="col-1">
                                        =
                                    </div>
                                    <div class="col-3">
                                        <b
                                            class="text-info">₹{{ number_format(($camp->price-$camp->rebate_price), 2, '.', ',') }}</b>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="active">
                            <a href="#!">
                                <span class="circle">2</span>
                                <span class="label">Cost Per Sale</span>
                            </a>
                            <div class="step-content p-1 w-75">

                                <div class="alert alert-info">
                                    <i class="fal fa-info-circle"></i>
                                    A fee of <b>₹{{$fee->rebate_fee}}</b> is applied per sale by InfluencerPulse. </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-muted text-uppercase font-weight-bold font-xs">
                                            YOU PAY </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-4">
                                        <div class="text-muted text-uppercase font-weight-bold font-xs">
                                            Fee </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-3">
                                        <div class="text-muted text-uppercase font-weight-bold font-xs">
                                            Cost Per Sale </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <b class="text-info">
                                            ₹{{ number_format(($camp->price-$camp->rebate_price), 2, '.', ',') }} </b>
                                    </div>
                                    <div class="col-1">
                                        +
                                    </div>
                                    <div class="col-4">
                                        ₹{{$fee->rebate_fee}} </div>
                                    <div class="col-1">
                                        =
                                    </div>
                                    <div class="col-3">
                                        <b
                                            class="text-warning">₹{{ number_format(($camp->price-$camp->rebate_price+$fee->rebate_fee), 2, '.', ',') }}</b>
                                    </div>
                                </div>

                            </div>
                        </li>

                        <li class="active">
                            <a href="#!">
                                <span class="circle">3</span>
                                <span class="label">
                                    Daily Cost </span>
                            </a>
                            <div class="step-content p-1 w-75">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-muted text-uppercase font-weight-bold font-xs">
                                            Cost Per Sale </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-4">
                                        <div class="text-muted text-uppercase font-weight-bold font-xs">
                                            Daily Intents </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-3">
                                        <div class="text-muted text-uppercase font-weight-bold font-xs">
                                            Daily Cost </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <b
                                            class="text-warning">₹{{ number_format(($camp->price-$camp->rebate_price+$fee->rebate_fee), 2, '.', ',') }}</b>
                                    </div>
                                    <div class="col-1">
                                        ×
                                    </div>
                                    <div class="col-4">
                                        {{$camp->daily_rebates}} </div>
                                    <div class="col-1">
                                        =
                                    </div>
                                    <div class="col-3">
                                        <b class="text-danger">
                                            ₹{{ number_format(($camp->price-$camp->rebate_price+$fee->rebate_fee)*$camp->daily_rebates, 2, '.', ',') }}</b>
                                    </div>
                                </div>

                            </div>
                        </li>

                    </ul>

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

                    <form id="write-wallet-form" method="post" action="{{route('wallet.charge')}}"
                        enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                        @csrf
                        <button
                            type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                        <input type="hidden" name="amount" id="stripe-amount">
                        <input type="hidden" name="desription" id="wallet-description">
                        <input type="hidden" name="camp_id" value="{{$camp->id}}">

                    
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

                        <div class="stripe-button-lg stripe-button-block" id="wallet-charge">
                           
                        </div>
                    </form>

                </div>
                <input type="hidden" id="stripe-fee" value="{{$fee->paypal_fee}}">
                <input type="hidden" id="auth-email" value="{{auth()->user()->email}}">

                <script>
                function charge_wallet(){


                    amount=$("#charge-amount").val();
                    fee=$("#stripe-fee").val();
                    email=$("#auth-email").val();

                    console.log("sadf",amount , fee, email, Math.round(amount*(1+fee/100)*100*100)/100)


                    $("#stripe-amount").val(amount);
                    $("#wallet-description").val('For wallet charge');



                    stripe_modal=` <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
                            data-key="pk_test_ypYAqYGU91QcBzRjrJcCkTvX00N4QXGYwu"
                            data-amount="`+ Math.round(amount*(1+fee/100)*100*100)/100 +`"
                            data-description="For wallet charge"
                            data-email="`+ email +`" 
                            data-image="https://influencerpulse.com/assets/img/logo_stripe.png"
                            data-locale="auto"
                            data-label="Charge wallet ₹`+ Math.round(amount*(1+fee/100)*100)/100 +` with Stripe">`;

                    $("#wallet-charge").html(stripe_modal)
                }

                $(function() {
                    // $(".transaction-class").click(function(){

                    //     order=$(this).data('order');
                    //     order_id=order['id'];
                    //     buyer=$(this).data('buyer');
                    //     amount=$(this).data('amount');

                    //     $("#transaction_amount").val(amount);

                    //     $("#transaction_title").html(buyer);

                    //     $("#tran-order-id").val(order_id);

                    // })
                    charge_wallet();
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

    <script src="https://cdn.plaid.com/link/v2/stable/link-initialize.js"></script>

</main>
@endsection