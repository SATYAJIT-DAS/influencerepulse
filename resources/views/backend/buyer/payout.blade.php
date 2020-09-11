@extends('backend.buyer.layouts.app')
@section('content')
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
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{ session('status') }}</div>
        </div>
    </section>
    @endisset
    <div class="container-fluid">

        <div class="card">

            <div class="card-body text-center">
            	<div class="row">
            		<div class="col-xl-6">
            			<h5 class="my-5">Current Balance</h5>

		                <h1 class="my-4">
		                    <span class="text-info">₹{{$wallet_sum}}</span>
		                </h1>
            		</div>

            		<div class="col-xl-6">
            			<div id="payment-methods-accordion" class="nice-accordion" role="tablist">

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
                                        <form id="write-wallet-form" method="post" action="{{route('buyer.charge')}}"
					                        enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
					                        @csrf

					                        <input type="hidden" name="amount" id="stripe-amount">
                        					<input type="hidden" name="desription" id="wallet-description">
					                        <button
					                            type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
					                    
					                        <div class="form-group fv-has-feedback">
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

                                </div>

                               

                            </div>

                        </div>
            		</div>
            	</div>

                

            </div>


        </div>

        <div class="card">

            <div class="card-header d-flex align-items-center justify-content-between">

                <span><i class="fal fa-suitcase"></i> Wallet</span>

                <!-- <a href="{{route('seller.upload-start')}}" class="btn btn-primary">
                    <i class="fal fa-plus"></i> Start Bulk Upload </a> -->
                <select>
                    
                </select>

            </div>

            <div class="card-body">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
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
                                        <td>
                                            ₹{{$wallet->amount}} <br>
                                            <small class="text-muted">
                                                + ₹{{$wallet->fee_amount}} fee </small>
                                        </td>
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

    </div>

    <input type="hidden" id="stripe-fee" value="{{$fee->paypal_fee}}">
    <input type="hidden" id="auth-email" value="{{auth()->user()->email}}">
    <script type="text/javascript">
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

        $(function(){
        	charge_wallet();
            $("#charge-amount").on('change', function(){
                charge_wallet();
            })

        })
    </script>

</main>

@endsection