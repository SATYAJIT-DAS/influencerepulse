@extends('backend.admin.layouts.app')
@section('content')
<main class="main">

    @if (session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{ session('status') }}</div>
        </div>
    </section>
    @endisset
    @if (session('faild'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-danger" role="alert">
                <i class="fal fa-check"></i> {{ session('faild') }}</div>
        </div>
    </section>
    @endisset
    <div class="container-fluid mt-2">


        <div class="row">

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-primary border-primary text-uppercase p-1 p-xl-2">
                        <b>Campaigns</b>
                    </div>
                    <div class="card-body p-1 p-xl-2">
                        <h3>
                            <a href="{{route('camp_manage.index')}}">
                                {{$camps}} </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold">
                            Running Campaigns </small>
                    </div>
                    <div class="card-footer p-1 p-xl-2">

                        <a class="btn btn-dark" href="{{route('camp_manage.index')}}">
                            See List </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-3">
                <div class="card text-center">
                    <div class="card-header bg-dark border-dark text-uppercase p-1 p-xl-2">
                        <b>Coupons</b>
                    </div>
                    <div class="card-body p-1 p-xl-2">
                        <h3>
                            <a href="{{route('coupon_manage.index')}}">
                               {{$coupons}} </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold">
                            Running Coupons </small>
                    </div>
                    <div class="card-footer p-1 p-xl-2">
                        <a class="btn btn-dark" href="{{route('coupon_manage.index')}}">
                            See List </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-3">
                <div class="card text-center">
                    <div class="card-header bg-danger border-danger text-uppercase p-1 p-xl-2">
                        <b>Rebate Disputes</b>
                    </div>
                    <div class="card-body p-1 p-xl-2">
                        <h3>
                            <a href="{{route('order_manage')}}">
                               {{$disputes}}</a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold">
                            Unresolved Disputes </small>
                    </div>
                    <div class="card-footer p-1 p-xl-2">
                        <a class="btn btn-dark" href="{{route('order_manage')}}">
                            See List </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-3">
                <div class="card text-center">
                    <div class="card-header bg-warning border-warning text-uppercase p-1 p-xl-2">
                        <b>Messages</b>
                    </div>
                    <div class="card-body p-1 p-xl-2">
                        <h3>
                            <a data-e2e="rebates-button" href="{{route('service.index')}}">
                                {{$services}} </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold">
                            Unread Messages </small>
                    </div>
                    <div class="card-footer p-1 p-xl-2">
                        <a class="btn btn-dark" href="{{route('service.index')}}">
                            See List </a>
                    </div>
                </div>
            </div>

        </div>



        <div class="row">

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-primary border-primary text-uppercase p-1 p-xl-2">
                        <b>Registed Buyers</b>
                    </div>
                    <div class="card-body p-1 p-xl-2">
                        <h3>
                            <a href="{{route('users.index')}}">
                               {{$buyers}} </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold">
                            Running Buyers </small>
                    </div>
                    <div class="card-footer p-1 p-xl-2">

                        <a class="btn btn-dark" href="{{route('users.index')}}">
                            See List </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-3">
                <div class="card text-center">
                    <div class="card-header bg-danger border-danger text-uppercase p-1 p-xl-2">
                        <b>Registed sellers</b>
                    </div>
                    <div class="card-body p-1 p-xl-2">
                        <h3>
                            <a href="{{route('users.index')}}">
                                {{$sellers}} </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold">
                            Running sellers </small>
                    </div>
                    <div class="card-footer p-1 p-xl-2">
                        <a class="btn btn-dark" href="{{route('users.index')}}">
                            See List </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-3">
                <div class="card text-center">
                    <div class="card-header bg-dark border-dark text-uppercase p-1 p-xl-2">
                        <b>Total Orders</b>
                    </div>
                    <div class="card-body p-1 p-xl-2">
                        <h3>
                            <a href="{{route('order_manage')}}">
                                {{$orders}} </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold">
                            Total Orders </small>
                    </div>
                    <div class="card-footer p-1 p-xl-2">
                        <a class="btn btn-dark" href="{{route('order_manage')}}">
                            See List </a>
                    </div>
                </div>
            </div>



            <div class="col-md-6 col-xxl-3">
                <div class="card text-center">
                    <div class="card-header bg-warning border-warning text-uppercase p-1 p-xl-2">
                        <b>Campaings Pending</b>
                    </div>
                    <div class="card-body p-1 p-xl-2">
                        <h3>
                            <a data-e2e="rebates-button" href="{{route('camp_manage.index')}}">
                               {{$uncamps}} </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold">
                            Unresolved Campaigns </small>
                    </div>
                    <div class="card-footer p-1 p-xl-2">
                        <a class="btn btn-dark" href="{{route('camp_manage.index')}}">
                            See List </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <form  method="POST" action="{{route('fee.store')}}" style="width:100%;" class="fv-form fv-form-bootstrap4">
                @csrf
                <input type="hidden" name="fee_id" value="{{$fee->id}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="controls">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                    </div>
                                    <input class="form-control" id="rebate_fee" name="rebate_fee" step="0.01"
                                        type="number" placeholder="Enter the influencerpulse Fee" value="{{$fee->rebate_fee}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="controls">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>
                                    <input type="number" name="paypal_fee" class="form-control" step="0.01" id="paypal_fee" placeholder="Enter the PayPal Feee" value="{{$fee->paypal_fee}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="row">



            <div class="col-md-6">

                <div class="card">

                    <div class="card-header">
                        Buyer Graph </div>

                    <div class="card-body" >
                        <div class="table-responsive">
                            {!! $buyerChart->container() !!}

                            @if($buyerChart)
                            {!! $buyerChart->script() !!}
                            @endif
                        </div>
                    </div>

                </div>


            </div>


            <div class="col-md-6">

                <div class="card">

                    <div class="card-header">
                        Seller Graph </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            {!! $sellerChart->container() !!}

                            @if($sellerChart)
                            {!! $sellerChart->script() !!}
                            @endif

                        </div>


                    </div>

                </div>

            </div>


            <div class="col-md-6">

                <div class="card">

                    <div class="card-header">
                        Campaign Graph </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            {!! $campChart->container() !!}

                            @if($campChart)
                            {!! $campChart->script() !!}
                            @endif
                        </div>


                    </div>

                </div>

            </div>


            <div class="col-md-6">

                <div class="card">

                    <div class="card-header">
                        Coupons Graph </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            {!! $couponChart->container() !!}

                            @if($couponChart)
                            {!! $couponChart->script() !!}
                            @endif
                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>

    @if($mail_verify == 0)
    <div class="modal fade" id="verify-modal" tabindex="-1" role="dialog" href="/buyer/modal/mailing-address"
        style="padding-right: 17px; display: block;" aria-modal="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header align-items-center">

                    <h5 class="modal-title">Email Verify</h5>

                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>--}}

                </div>

                <div class="modal-body">

                    <form id="mailing-address-form" method="post" action="{{route('password.email')}}"
                        novalidate="novalidate" class="fv-form fv-form-bootstrap4"><button type="submit"
                            class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                        @csrf
                        <div class="form-group fv-has-feedback">
                            <label class="form-control-label" for="name">
                                E-mail Address
                            </label>
                            <div class="controls">
                                <input class="form-control" type="text" name="email" id="email" maxlength="255"
                                    placeholder="E-mail" value="{{Auth()->user()->email}}" data-fv-field="name"
                                    readonly><i style="" class="fv-control-feedback fal fa-asterisk"
                                    data-fv-icon-for="name"></i>
                            </div>
                            <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                data-fv-for="name" data-fv-result="NOT_VALIDATED">The name is required.</small><small
                                style="display: none;" class="form-control-feedback" data-fv-validator="stringLength"
                                data-fv-for="name" data-fv-result="NOT_VALIDATED">The full name is too short.</small>
                        </div>

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <button class="btn btn-primary btn-block" type="submit">
                            Email Verify </button>

                    </form>

                </div>


                <script>
                $(function() {

                    $("#verify-modal").modal({
                            escapeClose: false,
                            clickClose: false,
                            showClose: false,
                            backdrop: 'static',
                            keyboard: false,
                    });

                    $('#mailing-address-form').on('init.field.fv', function(e, data) {
                        const $icon = data.element.data('fv.icon'),
                            options = data.fv.getOptions(), // Entire options
                            validators = data.fv.getOptions(data.field)
                            .validators; // The field validators

                        if (validators.notEmpty && options.icon && options.icon.required) {
                            $icon.addClass(options.icon.required).show();
                        }
                    });

                });
                </script>
            </div>
        </div>
    </div>
    @endif




    <script src="{{asset('/js/Chart.min.js')}}"></script>
</main>
@endsection
