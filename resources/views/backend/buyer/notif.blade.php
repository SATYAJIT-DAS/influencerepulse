@extends('backend.buyer.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Notifications</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-bell"></i> Notifications </div>

            <div class="card-body">

                <div class="table-responsive-xl">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Picture</th>
                                <th>Product</th>
                                <th>Pricing</th>
                                <th>Last Notified</th>
                                <th>Status</th>
                                <th>Methods</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center">
                                    No notifications yet. </td>
                            </tr>
                        </tbody>

                    </table>

                </div>


            </div>

        </div>

    </div>

    <script>
    $(function() {

        $(document).on('click', '.actions .btn', function() {
            const $button = $(this);
            Project.Campaign.notifyMethod($button.parents('.notification'), $(this).data('type'))
                .then(function(response) {
                    $button.attr('title', response.tooltip).tooltip('dispose').tooltip().tooltip(
                        'show');
                    if (response.enabled) {
                        $button.find('.fal').removeClass('text-danger').addClass('text-success');
                    } else {
                        $button.find('.fal').removeClass('text-success').addClass('text-danger');
                    }
                });
        });

    });
    </script>

</main>
@endsection