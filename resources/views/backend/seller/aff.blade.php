@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Affiliate Program</li>
    </ol>
    <div class="container-fluid">


        <div class="card border-primary">

            <div class="card-header bg-primary">
                <i class="fal fa-link"></i> Affiliate URL </div>

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-xl-6">

                        <div class="form-group form-group-lg mb-0">
                            <label class="sr-only" for="affiliate-url">Affiliate URL</label>
                            <div class="controls controls-no-label">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text px-2">
                                            <i class="fal fa-link"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" readonly id="affiliate-url"
                                        value="https://localhsot.com/?aff=332658">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-dark clipboard px-2"
                                            data-clipboard-target="#affiliate-url">
                                            <i class="fal fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-6 mt-2 mt-xl-0 text-center">

                        <p>Don't remember how the Affiliate Program works?</p>
                        <a href=""
                            data-modal-size="modal-lg" class="btn btn-outline-dark" data-toggle="modal"
                            data-target="#instruction">
                            Read Instructions </a>

                    </div>

                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-chart-bar"></i> Statistics
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-6 col-lg-7">
                        Referrals <i class="fal fa-info-circle" data-toggle="tooltip"
                            title="Number of referrals you have."></i>
                    </div>

                    <div class="col-6 col-lg-5">
                        0 </div>

                </div>

                <hr class="my-2">

                <div class="row">

                    <div class="col-6 col-lg-7">
                        Commissions pending <i class="fal fa-info-circle" data-toggle="tooltip"
                            title="Amount of unpaid commissions you have collected."></i>
                    </div>

                    <div class="col-6 col-lg-5">
                        $0.00 USD
                    </div>

                </div>

                <hr class="my-2">

                <div class="row">

                    <div class="col-6 col-lg-7">
                        Current balance <i class="fal fa-info-circle" data-toggle="tooltip"
                            title="Amount of commission that rolled over from previous payment cycles"></i>
                    </div>

                    <div class="col-6 col-lg-5">
                        $0.00 USD
                    </div>

                </div>

                <hr class="my-2">

                <div class="row">

                    <div class="col-6 col-lg-7">
                        Next payout date </div>

                    <div class="col-6 col-lg-5">
                        Min payment not met </div>

                </div>

                <hr class="my-2">

                <div class="row align-items-center">

                    <div class="col-6 col-lg-7">
                        PayPal account </div>

                    <div class="col-6 col-lg-5">
                        <span id="btn-paypal"></span>
                        <script src="https://www.paypalobjects.com/js/external/connect/api.js"></script>
                        <script>
                        paypal.use(['login'], function(login) {
                            login.render({
                                "appid": "AYfTlep3tBtCu0yM4EiEwz5PidHoC4m_aUAldsgymIpfdJX5tM_MMZwRqXzUaMjj4DXTsBYJjmZpQMUO",
                                "authend": "live",
                                "scopes": "openid email profile https://uri.paypal.com/services/paypalattributes",
                                "containerid": "btn-paypal",
                                "responseType": "code id_Token",
                                "locale": "en-us",
                                "buttonType": "CWP",
                                "buttonShape": "pill",
                                "buttonSize": "lg",
                                "fullPage": "true",
                                "returnurl": "https://influencerpulse.com/seller/paypal.html"
                            });
                        });
                        </script>
                    </div>

                </div>

            </div>

        </div>

        <script>
        $(function() {

            new Clipboard('.clipboard').on('success', function(e) {
                const $button = $(e.trigger);
                $button.attr('title', 'Affiliate URL copied to clipboard').tooltip('show');
                setTimeout(function() {
                    $button.tooltip('hide').tooltip('dispose');
                }, 2000);
            });

        });
        </script>
        <div class="card">

            <div class="card-header">
                Commissions & Payouts </div>

            <div class="card-body">

                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="commissions-tab" href="#commissions" role="tab" data-toggle="tab"
                            aria-controls="commissions-tab">Commissions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="payouts-tab" href="#payouts" data-toggle="tab" role="tab"
                            aria-controls="payouts-tab">Payouts</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="referrals-tab" href="#referrals" role="tab" data-toggle="tab"
                            aria-controls="referrals-tab">Referrals</a>
                    </li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="commissions" role="tabpanel"
                        aria-labelledby="commissions-tab">

                        <div class="table-responsive">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Seller</th>
                                        <th>Rebates</th>
                                        <th>Commission</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    <tr>
                                        <td colspan="5" class="text-center">No commissions yet.</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="payouts" role="tabpanel" aria-labelledby="commissions-tab">

                        <div class="table-responsive">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Amount</th>
                                        <th>Sent on</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    <tr>
                                        <td colspan="5" class="text-center">No payouts yet..</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="referrals" role="tabpanel" aria-labelledby="commissions-tab">

                        <div class="table-responsive">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Signed up on</th>
                                        <th>Rebates approved</th>
                                        <th>Commission expected</th>
                                        <th>Rebates paid out</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    <tr>
                                        <td colspan="5" class="text-center">No referrals yet.</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" id="instruction" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header align-items-center">

                    <h5 class="modal-title">How Does It Work?</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>

                </div>

                <div class="modal-body">

                    <ol class="mb-0">
                        <li>
                            <p>Send your seller friends to influencerpulse by using your affiliate URL:</p>

                            <div class="form-group form-group">
                                <label class="sr-only" for="affiliate-url">Affiliate URL</label>
                                <div class="controls controls-no-label">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fal fa-link"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" type="text" readonly="" id="affiliate-url-modal"
                                            value="https://localshot.com/?aff=332658">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-dark clipboard"
                                                data-clipboard-target="#affiliate-url-modal">
                                                <i class="fal fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <p>Each seller you refer to influencerpulse will be automatically linked to your affiliate
                                account.</p>
                        </li>
                        <li>
                            <p>Earned commission will be added to your balance once the rebate is paid to your
                                affiliated seller.</p>

                            <table class="table table-sm">

                                <thead>
                                    <tr>
                                        <th>Rebates paid</th>
                                        <th>Commission</th>
                                        <th>
                                            Cumulative <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title=""
                                                data-original-title="The cumulative amount of commissions you will be paid for an affiliate when they reach a level"></i>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>


                                    <tr>
                                        <td>4+</td>
                                        <td>$1</td>
                                        <td>$1</td>
                                    </tr>


                                    <tr>
                                        <td>24+</td>
                                        <td>$5</td>
                                        <td>$6</td>
                                    </tr>


                                    <tr>
                                        <td>56+</td>
                                        <td>$8</td>
                                        <td>$14</td>
                                    </tr>


                                    <tr>
                                        <td>100+</td>
                                        <td>$11</td>
                                        <td>$25</td>
                                    </tr>


                                    <tr>
                                        <td>160+</td>
                                        <td>$15</td>
                                        <td>$40</td>
                                    </tr>


                                    <tr>
                                        <td>256+</td>
                                        <td>$24</td>
                                        <td>$64</td>
                                    </tr>


                                    <tr>
                                        <td>560+</td>
                                        <td>$76</td>
                                        <td>$140</td>
                                    </tr>


                                    <tr>
                                        <td>1080+</td>
                                        <td>$130</td>
                                        <td>$270</td>
                                    </tr>


                                    <tr>
                                        <td>1760+</td>
                                        <td>$170</td>
                                        <td>$440</td>
                                    </tr>


                                    <tr>
                                        <td>4000+</td>
                                        <td>$560</td>
                                        <td>$1000</td>
                                    </tr>
                                </tbody>

                            </table>
                        </li>
                        <li>
                            <p class="mb-0">Receive a payout by check if your balance reaches $50 USD on the first day
                                of the month.</p>
                        </li>
                    </ol>

                </div>

                <script>
                $(function() {

                    new Clipboard('.clipboard').on('success', function(e) {
                        const $button = $(e.trigger);
                        $button.attr('title', 'Affiliate URL copied to clipboard').tooltip('show');
                        setTimeout(function() {
                            $button.tooltip('hide').tooltip('dispose');
                        }, 2000);
                    });

                    $('[data-toggle=tooltip]').tooltip();

                });
                </script>
            </div>
        </div>
    </div>

</main>
@endsection