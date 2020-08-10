@extends('backend.seller.layouts.app')
@section('content')


<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Coupons</a></li>
        <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Bulk Upload</a></li>
        <li class="breadcrumb-item"><a
                href="{{route('seller.listings')}}">Upload #49</a></li>
        <li class="breadcrumb-item active">Listings</li>
    </ol>
    <div class="container-fluid">

        <div class="alert alert-info">
            <i class="fal fa-spin fa-spinner"></i>
            We are now processing listings one by one, please be patient. It could take time if you uploaded
            hundreds of listings... </div>

        <div class="card">

            <div class="card-header">

                <i class="fal fa-upload"></i> Bulk upload #49
            </div>

            <div class="card-body">

                <div class="table-responsive-xl">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Code</th>
                                <th>Discount</th>
                                <th>Expiration</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    153732678455 </td>
                                <td>
                                    MYCOUPON </td>
                                <td style="width: 30%;">
                                    50%
                                </td>
                                <td>
                                    Expires on Dec 31, 2025 </td>
                                <td>
                                    <span class="text-info">CREATED</span>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </div>


            </div>

        </div>

    </div>

    <script>
        setInterval(function () {
            window.location.reload();
        }, 30000);
    </script>

</main>

            
@endsection