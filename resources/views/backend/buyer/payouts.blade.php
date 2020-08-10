@extends('backend.buyer.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">Payouts</a></li>
        <li class="breadcrumb-item active">Checks</li>
    </ol>
    <div class="container-fluid">


        <div class="card">

            <div class="card-header">
                <i class="fal fa-dollar-sign"></i> Payouts </div>

            <div class="card-body">


                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of payouts received by checks">
                        <a class="nav-link active" data-toggle="tab" href="#checks">Checks (0)</a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of payouts received from PayPal">
                        <a class="nav-link" data-toggle="tab" href="#paypal">PayPal (0)</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="checks" role="tabpanel" aria-labelledby="checks-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Amount</th>
                                        <th>Remitted on</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Expected on</th>
                                        <th>Delivery</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No checks yet. </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="checks-tab">

                        <div class="table-responsive-xl">

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
                                        <td colspan="8" class="text-center">
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


</main>
@endsection