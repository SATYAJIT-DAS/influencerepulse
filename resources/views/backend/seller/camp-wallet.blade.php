@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('seller.campaigns')}}">Campaigns</a></li>
        <li class="breadcrumb-item"><a href="{{route('seller.summary',$camp->id)}}">Campaign {{$camp->id}}</a>
        </li>
        <li class="breadcrumb-item active">Wallet</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-suitcase"></i>
                Wallet for campaign {{$camp->product_name}} </div>

            <div class="card-body">

                <div class="table-responsive-xl">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($wallets)!=0)
                            @foreach($wallets as $key => $wallet)
                            <tr>
                                <td>
                                    {{ date('j F, Y  h:m ', strtotime($wallet->date)) }}<br>
                                    {{ date('h:m ', strtotime($wallet->date)) }} EST </td>
                                <td>
                                    ₹{{$wallet->amount}} <br>
                                    <small class="text-muted">
                                        + ₹{{$wallet->fee_amount}} fee </small>
                                </td>
                                <td>
                                   {{$wallet->payment_method}} </td>
                                <td class="w-50" style="max-width: 500px !important;">{{$wallet->description}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">
                                    No billing transactions yet.
                                </td>
                            </tr>
                            @endif

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="card-footer">
                Total amount in the campaign wallet: <b>₹{{$wallet_sum}}</b> </div>

        </div>

    </div>

</main>
@endsection