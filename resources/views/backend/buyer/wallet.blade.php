@extends('backend.buyer.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Wallet</li>
    </ol>
    @isset($msg)
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{ $msg }}</div>
        </div>
    </section>
    @endisset
    <div class="container-fluid">

        <div class="alert alert-info">
            <i class="fal fa-info-circle"></i>
            Your wallet provides information about your payouts that are coming. Payouts are sent once a day
            automatically at 07:00 pm EST. </div>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-suitcase"></i> Wallet </div>

            <div class="card-body">

                <div class="row text-center">

                    <div class="col-md-6">

                        <h5 class="my-3">Pending Balance</h5>

                        <h1 class="my-3 display-4">
                            <span data-e2e="pending-balance" class="text-info">
                                ₹{{$wallet_sum}} </span>
                        </h1>

                        <small class="text-muted d-inline-block text-center">
                            <i class="fal fa-balance-scale"></i> Total pending balance </small>

                    </div>

                    <div class="col-md-6">

                        <h5 class="my-3">
                            Next Payout </h5>

                        <h1 class="my-3 display-4">
                            <span class="text-muted"><i class="fal fa-times"></i></span>
                        </h1>

                    </div>

                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                ₹ Payout Payment Method </div>

            <div class="card-body">

                <form id="payout-method-form" method="post">

                    <input type="hidden" name="action" value="payment-method">

                    <div class="row text-center">

                        <div class="col-md-4 offset-md-1">

                            <h3 class="mt-3 mb-0">
                                Cash Back </h3>

                            <p class="mt-3 mb-0">
                                Receive your cashback in your bank,gpay, phonepay, paytm. </p>

                            <h6 class="mt-3 mb-0 pb-3">
                                <span class="text-success">FREE for weekly / monthly payout</span>
                                
                            </h6>

                            <div class="custom-control custom-radio custom-radio-no-label my-1-5" data-toggle="tooltip"
                                data-placement="bottom" title="This is the current selected payment method for payouts">
                    <input data-e2e=" payout-method-check" type="radio" name="payout_method" id="payout-method-check"
                                value="check" class="custom-control-input" checked>
                                <label class="custom-control-label" for="payout-method-check">
                                    <span class="sr-only">Select Check payment method</span>
                                </label>
                            </div>

                            <hr class="d-md-none mt-5 mb-3">

                        </div>

                        <div class="col-md-4 offset-md-2">

                            <h3 class="mt-3 mb-0">
                                PayPal </h3>

                            <p class="mt-3 mb-0">
                                Connect with PayPal and receive your payout directly to your <a
                                    href="https://www.paypal.com/gf/smarthelp/article/how-do-i-verify-my-paypal-account-faq619"
                                    target="_blank" data-toggle="tooltip"
                                    title="Make sure your PayPal account is verified before using the Connect with PayPal button">verified</a>
                                PayPal account. </p>

                            <h6 class="mt-3 mb-0 pb-3">
                                <span class="text-success">FREE for weekly / monthly payout</span>
                                <br>
                                <small class="text-muted">
                                    Otherwise <b>₹0.30</b> fee / payout </small>
                            </h6>

                            <div class="custom-control custom-radio custom-radio-no-label my-1-5" data-toggle="tooltip"
                                data-placement="bottom"
                                title="PayPal payment method is only available once your first check has been remitted">
                                <input data-e2e="payout-method-paypal" type="radio" name="payout_method"
                                    id="payout-method-paypal" value="paypal" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="payout-method-paypal">
                                    <span class="sr-only">Select Paypal payment method</span>
                                </label>
                            </div>

                        </div>

                    </div>

                </form>

            </div>

            <div class="card-footer">

                <form id="payout-frequency-form" method="post">

                    <input type="hidden" name="action" value="payout-frequency">

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="form-group mb-xl-0">
                                <label class="form-control-label" for="payout-frequency">
                                    How frequently do you want to receive your payout? </label>
                                <div class="controls">
                                    <div class="input-group">
                                        <select data-e2e="payout-frequency" name="payout_frequency"
                                            id="payout-frequency" class="form-control">
                                            <option value="day">Daily</option>
                                            <option value="week" selected>Weekly</option>
                                            <option value="month">Monthly</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button data-e2e="save-payout-frequency" class="btn btn-primary"
                                                type="submit">
                                                Save </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-5">

                            <p class="text-muted mb-0">
                                <small>
                                    <i>
                                        Consolidate your claims per week or per month to avoid additional fees.
                                        By default, we send your payout weekly.
                                    </i>
                                </small>
                            </p>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-clock"></i> Claims </div>

            <div class="card-body">

                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" id="payouts-tab" role="tablist">
                    <li class="nav-item">
                        <a data-e2e="next-check-tab" class="nav-link active" id="next-check-tab" data-toggle="tab"
                            href="#next-check" role="tab" aria-controls="home" aria-selected="true">
                            Next Payout <i class="fal fa-info-circle" data-toggle="tooltip"
                                title="Include all Deals reported before Dec 16, 2019 07:00 pm IST"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-e2e="coming-tab" class="nav-link" id="coming-tab" data-toggle="tab" href="#coming"
                            role="tab" aria-controls="profile" aria-selected="false">Future
                            Payouts</a>
                    </li>
                </ul>

                <div class="tab-content" id="payouts-tab-content">

                    <div class="tab-pane fade show active" id="next-check" role="tabpanel"
                        aria-labelledby="next-check-tab">

                        <div class="table-responsive-xl">

                            <table data-e2e="next-check-table" class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Provided on</th>
                                        <th>Payout</th>
                                        <th>On</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($wallets) != 0)
                                    @foreach($wallets as $key => $wallet)
                                    <tr>
                                        <td>{{$wallet->id}}</td>
                                        <td>
                                            @if($wallet->camp_id)
                                            <img alt="product name" src="{{asset('public/images/'.$wallet->getCamp->pic[0]->image_path)}}"
                                                width="50">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 450px;">
                                            @if($wallet->camp_id)
                                            <label style="width:100%">
                                                {{$wallet->getCamp->product_name}}
                                            </label>
                                            @endif
                                        </td>
                                        <td>{{$wallet->amount}}</td>
                                        <td>
                                            @if($wallet->camp_id)
                                            from {{$wallet->getCamp->user->name}}
                                            @endif
                                        </td>
                                        <td>{{$wallet->operation}}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No rebates yet. </td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="coming" role="tabpanel" aria-labelledby="coming-tab">

                        <div class="table-responsive-xl">

                            <table data-e2e="future-payouts-table" class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>Pricing</th>
                                        <th>Provided on</th>
                                        <th>Payout</th>
                                        <th>On</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No payouts yet. </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
    $(function() {

        $('#payout-method-form').on('change', 'input[type=radio]:not(:disabled)', function() {
            $(this).parents('form').trigger('submit');
        });

    });
    </script>

</main>
@endsection