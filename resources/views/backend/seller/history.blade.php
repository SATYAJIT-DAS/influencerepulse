@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Billing</li>
    </ol>
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-5">

                <div class="card text-center">
                    <div class="card-header bg-primary text-uppercase">
                        <b>Total Charged</b>
                    </div>
                    <div class="card-body">
                        <!-- <h3 id="popover-total-charged" data-toggle="popover-html" title="Details"> -->
                        <h3 id="popover-total-charged">
                            ₹{{$total_charge}} 
                           <!--  <small>
                                <i class="fal fa-info-circle"></i>
                            </small> -->
                            <!-- <div id="popover-total-charged-details" class="none">
                                <div class="row py-0-5">

                                    <div class="col-6">
                                        Deals </div>

                                    <div class="col-6 text-right">
                                        ₹0.00 </div>

                                </div>

                                <hr>

                                <div class="row py-0-5">

                                    <div class="col-6">
                                        Influencer Pulse fees </div>

                                    <div class="col-6 text-right">
                                        + ₹0.00 </div>

                                </div>

                                <hr>

                                <div class="row py-0-5">

                                    <div class="col-6">
                                        Credit card fees </div>

                                    <div class="col-6 text-right">
                                        + ₹0.00 </div>

                                </div>

                                <hr>

                                <div class="row py-0-5">

                                    <div class="col-6">
                                        Total charged </div>

                                    <div class="col-6 text-right">
                                        = ₹0.00 </div>

                                </div>
                            </div> -->
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold text-xs">
                            Total Amount Charged </small>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="card text-center">
                    <div class="card-header bg-primary text-uppercase">
                        <b>Total Refunded</b>
                    </div>
                    <div class="card-body">
                        <h3>
                            ₹{{-1*$total_refund}} </h3>
                        <small class="text-muted text-uppercase font-weight-bold text-xs">
                            Total Amount Refunded </small>
                    </div>
                </div>

            </div>

            <div class="col-lg-3">

                <div class="card text-center">
                    <div class="card-header bg-success text-uppercase">
                        <b>Total In</b>
                    </div>
                    <div class="card-body">
                        <h3>
                            ₹{{$total_refund+$total_charge}} </h3>
                        <small class="text-muted text-uppercase font-weight-bold text-xs">
                            Total Amount In </small>
                    </div>
                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-3">

                <div class="card text-center">
                    <div class="card-header bg-primary text-uppercase">
                        <b>Total Campaigns</b>
                    </div>
                    <div class="card-body">
                        <h3>
                            ₹{{$camp_amount}} </h3>
                        <small class="text-muted text-uppercase font-weight-bold text-xs">
                            Total Amount in Campaign Wallets </small>
                    </div>
                </div>

            </div>

            <div class="col-lg-3">

                <div class="card text-center">
                    <div class="card-header bg-primary text-uppercase">
                        <b>Total Deals</b>
                    </div>
                    <div class="card-body">
                        <!-- <h3 id="popover-total-rebates" data-toggle="popover-html" title="Details"> -->
                        <h3 id="popover-total-rebates">
                            ₹{{$deal_amount}}
                            <!-- <small>
                                <i class="fal fa-info-circle"></i>
                            </small>
                            <div id="popover-total-rebates-details" class="none">
                                <div class="row py-0-5">

                                    <div class="col-6">
                                        Deals paid out </div>

                                    <div class="col-6 text-right">
                                       ₹0.00 </div>

                                </div>

                                <hr>

                                <div class="row py-0-5">

                                    <div class="col-6">
                                        Influencer Pulse fees </div>

                                    <div class="col-6 text-right">
                                        + ₹0.00 </div>

                                </div>

                                <hr>

                                <div class="row py-0-5">

                                    <div class="col-6">
                                        Credit card fees </div>

                                    <div class="col-6 text-right">
                                        +₹0.00 </div>

                                </div>

                                <hr>

                                <div class="row py-0-5">

                                    <div class="col-6">
                                        Total charged </div>

                                    <div class="col-6 text-right">
                                        = ₹0.00 </div>

                                </div>
                            </div> -->
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold text-xs">
                            Total Amount for Deals Paid Out </small>
                    </div>
                </div>

            </div>

            <div class="col-lg-3">

                <div class="card text-center">
                    <div class="card-header bg-primary text-uppercase">
                        <b>Total Wallet</b>
                    </div>
                    <div class="card-body">
                        <h3>
                            ₹{{$wallet_amount}} </h3>
                        <small class="text-muted text-uppercase font-weight-bold text-xs">
                            Total Amount in the Wallet </small>
                    </div>
                </div>

            </div>

            <div class="col-lg-3">

                <div class="card text-center">
                    <div class="card-header bg-danger text-uppercase">
                        <b>Total Cost</b>
                    </div>
                    <div class="card-body">
                        <h3>
                            ₹{{$camp_amount+$wallet_amount-$deal_amount}} </h3>
                        <small class="text-muted text-uppercase font-weight-bold text-xs">
                            Total Costs Amount </small>
                    </div>
                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-history"></i> Billing </div>

            <div class="card-body">

                <div
                    class="alert alert-info text-center text-lg-left d-lg-flex justify-content-between align-items-center">

                    <div>
                        <i class="fal fa-info-circle"></i> You can customize your invoicing information on your
                        profile page.
                    </div>

                    <a class="btn btn-primary mt-2 mt-lg-0 ml-lg-3"
                href="{{route('seller.profile')}}">
                        Edit Invoicing Information </a>

                </div>

                <div class="table-responsive-xl">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center">
                                    No billing transactions yet. </td>
                            </tr>
                        </tbody>

                    </table>

                </div>


            </div>

        </div>

        <div data-e2e="advanced-invoicing" class="card">

            <div class="card-header">
                <i class="fal fa-calendar"></i> Advanced Invoicing </div>

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-xl-6">
                        <i class="fal fa-info-circle"></i>
                        Use this form to get an invoice on a weekly/monthly basis
                        or just pick a customized date range. </div>

                    <div class="col-xl-6">

                        <form method="post" action="">

                            <div class="row align-items-end">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="start-date">
                                            Start date </label>
                                        <div class="controls">
                                            <input data-e2e="invoice-start-date" placeholder="Start date" type="text"
                                                value="Dec 21, 2019" class="form-control" data-toggle="datepicker"
                                                id="start-date" name="start_date" />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="end-date">
                                            End date </label>
                                        <div class="controls">
                                            <input data-e2e="invoice-end-date" placeholder="End date" type="text"
                                                value="Jan 21, 2020" class="form-control" data-toggle="datepicker"
                                                id="end-date" name="end_date" />
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <button data-e2e="generate-invoice" type="submit" class="btn btn-primary btn-block">
                                <i class="fal fa-download"></i> Generate Invoice </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
    $(function() {

        $('[data-toggle=datepicker]').pickadate({
            format: 'mmm d, yyyy',
            formatSubmit: 'mmmm d, yyyy'
        });

        $('[data-toggle=popover-html]').popover({
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            content: function() {
                const $content = $('#' + $(this).attr('id') + '-details').clone();

                return $content.removeClass('none');
            },
            template: '<div class="popover popover-lg" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
        });

    });
    </script>

</main>
@endsection