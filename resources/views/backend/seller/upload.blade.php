@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Coupons</a></li>
        <li class="breadcrumb-item active">Bulk Upload</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header d-flex align-items-center justify-content-between">

                <span><i class="fal fa-upload"></i> Bulk Upload</span>

                <a href="{{route('seller.upload-start')}}" class="btn btn-primary">
                    <i class="fal fa-plus"></i> Start Bulk Upload </a>

            </div>

            <div class="card-body">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Filename</th>
                                        <th>Products found</th>
                                        <th>Products processed</th>
                                        <th>Products failed</th>
                                        <th>
                                            Status <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The status of your bulk import"></i>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            46 </td>
                                        <td>
                                            generic (1).csv </td>
                                        <td>
                                            11 </td>
                                        <td>
                                            11 </td>
                                        <td>
                                            0 </td>
                                        <td>
                                            PROCESSED </td>
                                        <td class="text-center">
                                            <a class="btn btn-primary" onclick="event.preventDefault();
                                            document.getElementById('upload-list').submit();"
                                                href="">
                                                See Listings </a>
                                        <form id="upload-list" method="POST" action="{{route('seller.upload-submit')}}">
                                            @csrf
                                        </form>
                                        </td>
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