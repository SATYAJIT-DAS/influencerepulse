@extends('backend.admin.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Transaction History</li>
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

            <div class="card-header d-flex align-items-center justify-content-between">

                <span><i class="fal fa-upload"></i> Transaction History</span>

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
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                        <th>Status <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The status of transction"></i></th>
                                        <th>
                                            Pay Out
                                        </th>
                                        <th>
                                           Transaction ID
                                        </th>
                                        <th>
                                            Payment Source
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($transactions as $key=> $transaction)

                                    <tr>
                                        <td>
                                            {{$key+1}} </td>
                                        <td style="max-width: 30%;">
                                            @if($transaction->getCamp)
                                            <label style="width: 100%;">{{$transaction->getCamp->product_name}}</label>
                                            @endif
                                        </td>

                                        <td>
                                            {{$transaction->date}}
                                        </td>
                                        <td>
                                            {{ dynamicCurrency() }}{{$transaction->amount}}
                                        </td>
                                        <td>{{$transaction->status}}</td>
                                        <td>
                                        	pay out
                                        </td>
                                        <td>
                                            {{$transaction->transaction_num}}
                                        </td>
                                        <td>{{$transaction->status}}</td>
                                    </tr>
                                    @endforeach
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
