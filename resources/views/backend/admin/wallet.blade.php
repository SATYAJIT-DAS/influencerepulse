@extends('backend.admin.layouts.app')
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

                <h5 class="my-5">Current Balance</h5>

                <h1 class="my-4">
                    <span class="text-info">₹{{$wallet_sum}}</span>
                </h1>

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
                                            <!--<small class="text-muted">-->
                                            <!--    + ₹{{$wallet->fee_amount}} fee </small>-->
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

</main>

@endsection