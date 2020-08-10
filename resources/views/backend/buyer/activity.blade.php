@extends('backend.buyer.layouts.app')
@section('content')
<main class="main">
    <div class="container-fluid mt-2">


        <div id="activity-section" class="row d-lg-flex collapse">

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-primary border-primary text-uppercase p-1 p-xl-2">
                        <b>Purchases</b>
                    </div>
                    <div
                        class="card-body d-flex flex-row flex-xl-column align-items-center justify-content-center p-1 p-xl-2">
                        <h3 class="mb-0 mb-xl-1">
                            <a href="{{route('buyer.purchases')}}">0</a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold ml-1 ml-xl-0">
                            Unclaimed Purchases </small>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-light border-light text-uppercase p-1 p-xl-2">
                        <b>Next Payout</b>
                    </div>
                    <div
                        class="card-body d-flex flex-row flex-xl-column align-items-center justify-content-center p-1 p-xl-2">
                        <h3 class="mb-0 mb-xl-1">
                            <a href="{{route('buyer.wallet')}}">
                                <i class="fal fa-times text-muted"></i>
                            </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold ml-1 ml-xl-0">
                            No payout coming </small>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-danger border-danger text-uppercase p-1 p-xl-2">
                        <b>Disputes</b>
                    </div>
                    <div
                        class="card-body d-flex flex-row flex-xl-column align-items-center justify-content-center p-1 p-xl-2">
                        <h3 class="mb-0 mb-xl-1">
                            <a href="{{route('buyer.purchases')}}">
                                0 </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold ml-1 ml-xl-0">
                            Unresolved Disputes </small>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-warning border-warning text-uppercase p-1 p-xl-2">
                        <b>Messages</b>
                    </div>
                    <div
                        class="card-body d-flex flex-row flex-xl-column align-items-center justify-content-center p-1 p-xl-2">
                        <h3 class="mb-0 mb-xl-1">
                            <a href="{{route('buyer.msg')}}">
                                0 </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold ml-1 ml-xl-0">
                            Unread messages </small>
                    </div>
                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-shopping-cart"></i> Latest Purchases </div>

            <div class="card-body">

                <div class="table-responsive-xl">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Picture</th>
                                <th>Product</th>
                                <th>Pricing</th>
                                <th>Payout</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center">
                                    No unclaimed purchases yet. </td>
                            </tr>
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</main>
@endsection