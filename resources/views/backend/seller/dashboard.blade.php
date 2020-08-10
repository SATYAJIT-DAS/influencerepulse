@extends('backend.seller.layouts.app')
@section('content')
    <main class="main">
        @if (session('status'))
            <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        <i class="fal fa-check"></i> {{ session('status') }}</div>
                </div>
            </section>
        @endif

        <div class="container-fluid mt-2">


            <div class="row">

                <div class="col-md-6 col-xxl-3">

                    <div class="card text-center">
                        <div class="card-header bg-primary border-primary text-uppercase p-1 p-xl-2">
                            <b>Campaigns</b>
                        </div>
                        <div class="card-body p-1 p-xl-2">
                            <h3>
                                <a href="{{route('seller.campaigns')}}">
                                    {{$camps}}   </a>
                            </h3>
                            <small class="text-muted text-uppercase font-weight-bold">
                                Running Campaigns </small>
                        </div>
                        <div class="card-footer p-1 p-xl-2">
                            <a class="btn btn-primary" href="{{route('seller.add-campa')}}">
                                <i class="fal fa-plus"></i> Create </a>
                            <a class="btn btn-dark" href="{{route('seller.campaigns')}}">
                                See List </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xxl-3">
                    <div class="card text-center">
                        <div class="card-header bg-dark border-dark text-uppercase p-1 p-xl-2">
                            <b>Deals</b>
                        </div>
                        <div class="card-body p-1 p-xl-2">
                            <h3>
                                <a href="{{route('seller.queue')}}">
                                    {{count($orders)}} </a>
                            </h3>
                            <small class="text-muted text-uppercase font-weight-bold">
                                Pending Approval </small>
                        </div>
                        <div class="card-footer p-1 p-xl-2">
                            <a class="btn btn-dark" href="{{route('seller.queue')}}">
                                Process Deals </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xxl-3">
                    <div class="card text-center">
                        <div class="card-header bg-danger border-danger text-uppercase p-1 p-xl-2">
                            <b>Deals Disputes</b>
                        </div>
                        <div class="card-body p-1 p-xl-2">
                            <h3>
                                <a href="{{route('seller.queue')}}">
                                    {{count($disputes)}} </a>
                            </h3>
                            <small class="text-muted text-uppercase font-weight-bold">
                                Unresolved Disputes </small>
                        </div>
                        <div class="card-footer p-1 p-xl-2">
                            <a class="btn btn-dark" href="{{route('seller.queue')}}">
                                Resolve Disputes </a>
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
                                <a data-e2e="rebates-button" href="{{route('seller.msg')}}">
                                    {{count($msgs)}}    </a>
                            </h3>
                            <small class="text-muted text-uppercase font-weight-bold">
                                Unread Messages </small>
                        </div>
                        <div class="card-footer p-1 p-xl-2">
                            <a class="btn btn-dark" href="{{route('seller.msg')}}">
                                Read Messages </a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">


                <div class="col-md-6">

                    <div class="card">

                        <div class="card-header">
                            Total Campaigns
                        </div>

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
                            Total Orders
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                {!! $ordersChart->container() !!}

                                @if($ordersChart)
                                    {!! $ordersChart->script() !!}
                                @endif
                            </div>


                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="card">

                        <div class="card-header">
                            Total Disputes
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                {!! $disputesChart->container() !!}

                                @if($disputesChart)
                                    {!! $disputesChart->script() !!}
                                @endif
                            </div>


                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="card">

                        <div class="card-header">
                            Total Messages
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                {!! $msgsChart->container() !!}

                                @if($msgsChart)
                                    {!! $msgsChart->script() !!}
                                @endif
                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>
        {{--@if(auth()->user()->phone_verify == 0)
            @switch(session('phone_check'))
                @case('code_check')
                <div class="modal fade" id="check-sms-modal" tabindex="-1" role="dialog" href="/buyer/modal/sms/check"
                     aria-modal="true" style="padding-right: 17px; display: block;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">

                                <h5 class="modal-title">Confirm your phone number and Set Password</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fal fa-times" aria-hidden="true"></i>
                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="row my-2">

                                    <div class="col-md-8 mx-auto">

                                        <section class="section section-flash mb-2-5 aos-init aos-animate"
                                                 data-aos="flip-up">
                                            <div class="alert alert-info" role="alert">
                                                <i class="fal fa-info-circle"></i> Please check your phone, we just sent
                                                you a code by
                                                SMS. it should arrive really soon. Enter below the verification code (4
                                                digits) provided
                                                in the text.
                                            </div>
                                        </section>
                                        <form id="check-sms-form" method="post" novalidate="novalidate"
                                              class="fv-form fv-form-bootstrap4" action="{{route('code-check')}}">
                                            @csrf
                                            <button type="submit" class="fv-hidden-submit"
                                                    style="display: none; width: 0px; height: 0px;"></button>


                                            <div class="form-group fv-has-feedback">
                                                <label class="form-control-label" for="new-password">Set
                                                    Password</label>
                                                <div class="controls">
                                                    <div class="input-group">

                                                        <input type="password" id="new-password" name="new_password"
                                                               class="form-control" maxlength="20"
                                                               placeholder="Enter your password" value=""
                                                               data-fv-field="password">

                                                    </div>
                                                    <i class="fv-control-feedback fv-bootstrap-icon-input-group fal fa-asterisk"
                                                       data-fv-icon-for="new-password" style=""></i>
                                                </div>
                                                <small class="form-control-feedback" data-fv-validator="stringLength"
                                                       data-fv-for="new-password"
                                                       data-fv-result="NOT_VALIDATED" style="display: none;">Your
                                                    password is too short.</small><small class="form-control-feedback"
                                                                                         data-fv-validator="notEmpty"
                                                                                         data-fv-for="new-password"
                                                                                         data-fv-result="NOT_VALIDATED"
                                                                                         style="display: none;">The
                                                    Password is required.</small>
                                            </div>

                                            <div class="form-group fv-has-feedback">
                                                <label class="form-control-label" for="code">Code</label>
                                                <div class="controls">
                                                    <div class="input-group">
                                                        <input type="number" name="code" class="form-control" id="code"
                                                               placeholder="Enter the verification code" maxlength="4"
                                                               data-fv-field="code">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary">Verify
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <i class="fv-control-feedback fv-bootstrap-icon-input-group fal fa-asterisk"
                                                       data-fv-icon-for="code" style=""></i>
                                                </div>
                                                <small class="form-control-feedback" data-fv-validator="stringLength"
                                                       data-fv-for="code"
                                                       data-fv-result="NOT_VALIDATED" style="display: none;">The
                                                    verification code requires
                                                    4 digits.</small><small class="form-control-feedback"
                                                                            data-fv-validator="notEmpty"
                                                                            data-fv-for="code"
                                                                            data-fv-result="NOT_VALIDATED"
                                                                            style="display: none;">The
                                                    verification code is required.</small><small
                                                    class="form-control-feedback"
                                                    data-fv-validator="integer" data-fv-for="code"
                                                    data-fv-result="NOT_VALIDATED"
                                                    style="display: none;">Please enter a valid number</small>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <p class="text-center text-muted mt-3">
                                    <small>
                                        Didn't receive the verification code? <a href="{{route('againSend')}}">Try
                                            again</a>
                                    </small>
                                </p>

                                <script>
                                    $(function () {

                                        $("#check-sms-modal").modal({
                                            escapeClose: false,
                                            clickClose: false,
                                            showClose: false
                                        });

                                        $('#check-sms-form').on('init.field.fv', function (e, data) {
                                            const $icon = data.element.data('fv.icon'),
                                                options = data.fv.getOptions(), // Entire options
                                                validators = data.fv.getOptions(data.field)
                                                    .validators; // The field validators

                                            if (validators.notEmpty && options.icon && options.icon.required) {
                                                $icon.addClass(options.icon.required).show();
                                            }
                                        }).formValidation({
                                            framework: 'bootstrap4',
                                            icon: {
                                                required: 'fal fa-asterisk',
                                                valid: 'fal fa-check',
                                                invalid: 'fal fa-times',
                                                validating: 'fal fa-refresh'
                                            },
                                            addOns: {
                                                mandatoryIcon: {
                                                    icon: 'fal fa-asterisk'
                                                }
                                            },
                                            fields: {
                                                'new-password': {
                                                    validators: {
                                                        stringLength: {
                                                            min: 8,
                                                            message: 'Your password is too short.'
                                                        },
                                                        notEmpty: {
                                                            message: 'The password is required.'
                                                        }
                                                    }
                                                },
                                                'code': {
                                                    validators: {
                                                        stringLength: {
                                                            min: 4,
                                                            max: 4,
                                                            message: 'The verification code requires 4 digits.'
                                                        },
                                                        notEmpty: {
                                                            message: 'The verification code is required.'
                                                        }
                                                    }
                                                }
                                            }
                                        });

                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
                @break


                @case('code_faild')
                <div class="modal fade" id="faild-code" tabindex="-1" role="dialog" href="/buyer/modal/sms/check"
                     aria-modal="true" style="padding-right: 17px; display: block;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">

                                <h5 class="modal-title">Confirm your phone number</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fal fa-times" aria-hidden="true"></i>
                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="row my-2">

                                    <div class="col-md-8 mx-auto">

                                        <section class="section section-flash mb-2-5 aos-init aos-animate"
                                                 data-aos="flip-up">
                                            <div class="alert alert-danger" role="alert">
                                                <i class="fal fa-exclamation-triangle"></i> This code is invalid.
                                            </div>
                                        </section>
                                        <form id="check-sms-form" method="post" novalidate="novalidate"
                                              class="fv-form fv-form-bootstrap4" action="{{route('code-check')}}">
                                            @csrf
                                            <button type="submit" class="fv-hidden-submit"
                                                    style="display: none; width: 0px; height: 0px;"></button>

                                            <div class="form-group fv-has-feedback">
                                                <label class="form-control-label" for="code">Code</label>
                                                <div class="controls">
                                                    <div class="input-group">
                                                        <input type="number" name="code" class="form-control" id="code"
                                                               placeholder="Enter the verification code" maxlength="4"
                                                               data-fv-field="code">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary">Verify
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <i class="fv-control-feedback fv-bootstrap-icon-input-group fal fa-asterisk"
                                                       data-fv-icon-for="code" style=""></i>
                                                </div>
                                                <small class="form-control-feedback" data-fv-validator="stringLength"
                                                       data-fv-for="code"
                                                       data-fv-result="NOT_VALIDATED" style="display: none;">The
                                                    verification code requires
                                                    4 digits.</small><small class="form-control-feedback"
                                                                            data-fv-validator="notEmpty"
                                                                            data-fv-for="code"
                                                                            data-fv-result="NOT_VALIDATED"
                                                                            style="display: none;">The
                                                    verification code is required.</small><small
                                                    class="form-control-feedback"
                                                    data-fv-validator="integer" data-fv-for="code"
                                                    data-fv-result="NOT_VALIDATED"
                                                    style="display: none;">Please enter a valid number</small>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <p class="text-center text-muted mt-3">
                                    <small>
                                        Didn't receive the verification code? <a href="{{route('againSend')}}">Try
                                            again</a>
                                    </small>
                                </p>

                                <script>
                                    $(function () {

                                        $("#faild-code").modal();

                                        $('#check-sms-form').on('init.field.fv', function (e, data) {
                                            const $icon = data.element.data('fv.icon'),
                                                options = data.fv.getOptions(), // Entire options
                                                validators = data.fv.getOptions(data.field)
                                                    .validators; // The field validators

                                            if (validators.notEmpty && options.icon && options.icon.required) {
                                                $icon.addClass(options.icon.required).show();
                                            }
                                        }).formValidation({
                                            framework: 'bootstrap4',
                                            icon: {
                                                required: 'fal fa-asterisk',
                                                valid: 'fal fa-check',
                                                invalid: 'fal fa-times',
                                                validating: 'fal fa-refresh'
                                            },
                                            addOns: {
                                                mandatoryIcon: {
                                                    icon: 'fal fa-asterisk'
                                                }
                                            },
                                            fields: {
                                                'code': {
                                                    validators: {
                                                        stringLength: {
                                                            min: 4,
                                                            max: 4,
                                                            message: 'The verification code requires 4 digits.'
                                                        },
                                                        notEmpty: {
                                                            message: 'The verification code is required.'
                                                        }
                                                    }
                                                }
                                            }
                                        });

                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>

                @break

                @default
                <div class="modal fade" id="verify-sms-modal" tabindex="-1" role="dialog" href=""
                     aria-modal="true" style="padding-right: 17px; display: block;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">

                                <h5 class="modal-title">Confirm your phone number</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fal fa-times" aria-hidden="true"></i>
                                </button>

                            </div>

                            <div class="modal-body">

                                <form id="verify-sms-form" method="post" novalidate="novalidate"
                                      class="fv-form fv-form-bootstrap4" action="{{route('phone_code_send')}}">
                                    @csrf
                                    <button type="submit" class="fv-hidden-submit"
                                            style="display: none; width: 0px; height: 0px;"></button>

                                    <div class="row my-2">

                                        <div class="col-md-8 mx-auto">

                                            <section class="section section-flash mb-2-5 aos-init aos-animate"
                                                     data-aos="flip-up">
                                                @if (session('error'))
                                                    <div class="alert alert-danger" role="alert">
                                                        <i class="fal fa-exclamation-triangle"></i> This is not a valid
                                                        cellphone number: {{session('error')}}
                                                    </div>
                                                @endif

                                                <div class="alert alert-info" role="alert">
                                                    <i class="fal fa-info-circle"></i>
                                                    Please enter your cellphone number so we can send you an SMS with
                                                    your unique
                                                    verification code.
                                                </div>
                                            </section>
                                            <div class="form-group fv-has-feedback">
                                                <label class="form-control-label" for="number">Cellphone number</label>
                                                <div class="controls">
                                                    <div class="input-group">
                                                        <!-- <div class="input-group-prepend">
                                                            <span class="input-group-text">+1</span>
                                                        </div> -->
                                                        <input type="number" id="number" name="number"
                                                               class="form-control"
                                                               maxlength="20" placeholder="Enter your cellphone number"
                                                               value=""
                                                               data-fv-field="number">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary btn-block">Send
                                                                SMS
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <i class="fv-control-feedback fv-bootstrap-icon-input-group fal fa-asterisk"
                                                       data-fv-icon-for="number" style=""></i>
                                                </div>
                                                <small class="form-control-feedback" data-fv-validator="stringLength"
                                                       data-fv-for="number" data-fv-result="NOT_VALIDATED"
                                                       style="display: none;">The phone
                                                    requires 10 digits.</small><small class="form-control-feedback"
                                                                                      data-fv-validator="notEmpty"
                                                                                      data-fv-for="number"
                                                                                      data-fv-result="NOT_VALIDATED"
                                                                                      style="display: none;">The phone
                                                    number is required.</small><small
                                                    class="form-control-feedback" data-fv-validator="integer"
                                                    data-fv-for="number"
                                                    data-fv-result="NOT_VALIDATED" style="display: none;">Please enter a
                                                    valid
                                                    number</small>
                                            </div>


                                        </div>

                                    </div>

                                </form>

                                <script>
                                    $(function () {

                                        $('#verify-sms-modal').modal({
                                            escapeClose: false,
                                            clickClose: false,
                                            showClose: false
                                        });

                                        $('#verify-sms-form').on('init.field.fv', function (e, data) {
                                            const $icon = data.element.data('fv.icon'),
                                                options = data.fv.getOptions(), // Entire options
                                                validators = data.fv.getOptions(data.field)
                                                    .validators; // The field validators

                                            if (validators.notEmpty && options.icon && options.icon.required) {
                                                $icon.addClass(options.icon.required).show();
                                            }
                                        }).formValidation({
                                            framework: 'bootstrap4',
                                            icon: {
                                                required: 'fal fa-asterisk',
                                                valid: 'fal fa-check',
                                                invalid: 'fal fa-times',
                                                validating: 'fal fa-refresh'
                                            },
                                            addOns: {
                                                mandatoryIcon: {
                                                    icon: 'fal fa-asterisk'
                                                }
                                            },
                                            fields: {
                                                'number': {
                                                    validators: {
                                                        stringLength: {
                                                            min: 6,
                                                            max: 20,
                                                            message: 'The phone requires 6-20 digits.'
                                                        },
                                                        notEmpty: {
                                                            message: 'The phone number is required.'
                                                        }
                                                    }
                                                }
                                            }
                                        });

                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            @endswitch
        @else--}}
        @if($mail_verify == 0)
            <div class="modal fade" id="mailing-address-form" tabindex="-1" role="dialog"
                 href="/buyer/modal/mailing-address" style="padding-right: 17px; display: none;" aria-modal="true">
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
                                  novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                                <button type="submit"
                                        class="fv-hidden-submit"
                                        style="display: none; width: 0px; height: 0px;"></button>
                                @csrf
                                <div class="form-group fv-has-feedback">
                                    <section class="section section-flash mb-2-5 aos-init aos-animate"
                                             data-aos="flip-up">
                                        <div class="alert alert-info" role="alert">
                                            <i class="fal fa-info-circle"></i>
                                            You can set password using Email verify
                                        </div>
                                    </section>
                                    <label class="form-control-label" for="name">
                                        E-mail Address
                                    </label>
                                    <div class="controls">
                                        <input class="form-control" type="text" name="email" id="email"
                                               maxlength="255"
                                               placeholder="E-mail" value="{{Auth()->user()->email}}"
                                               data-fv-field="name" readonly><i
                                            style="" class="fv-control-feedback fal fa-asterisk"
                                            data-fv-icon-for="name"></i>
                                    </div>
                                    <small style="display: none;" class="form-control-feedback"
                                           data-fv-validator="notEmpty"
                                           data-fv-for="name" data-fv-result="NOT_VALIDATED">The name is
                                        required.</small><small
                                        style="display: none;" class="form-control-feedback"
                                        data-fv-validator="stringLength"
                                        data-fv-for="name" data-fv-result="NOT_VALIDATED">The full name is too
                                        short.</small>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <button class="btn btn-primary btn-block" type="submit">
                                    Email Verify
                                </button>

                            </form>

                        </div>

                        <script>
                            $(function () {

                                $("#mailing-address-form").modal({
                                    escapeClose: false,
                                    clickClose: false,
                                    showClose: false,
                                    backdrop: 'static',
                                    keyboard: false,
                                });

                                $('#mailing-address-form').on('init.field.fv', function (e, data) {
                                    const $icon = data.element.data('fv.icon'),
                                        options = data.fv.getOptions(), // Entire options
                                        validators = data.fv.getOptions(data.field)
                                            .validators; // The field validators

                                    if (validators.notEmpty && options.icon && options.icon.required) {
                                        $icon.addClass(options.iczon.required).show();
                                    }
                                });

                            });
                        </script>
                    </div>
                </div>
            </div>
    @endif
    {{--@endif--}}

    <!-- @if($mail_verify == 0)
        <div class="modal fade" id="verify-modal" tabindex="-1" role="dialog"
            href="/buyer/modal/mailing-address" style="padding-right: 17px; display: block;" aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header align-items-center">

                        <h5 class="modal-title">Email Verify</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times" aria-hidden="true"></i>
                        </button>

                    </div>

                    <div class="modal-body">

                        <form id="mailing-address-form" method="post" action="{{route('password.email')}}"
                        novalidate="novalidate" class="fv-form fv-form-bootstrap4"><button type="submit"
                            class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                            @csrf
            <div class="form-group fv-has-feedback">
                <label class="form-control-label" for="name">
                    E-mail  Address
                </label>
                <div class="controls">
                    <input class="form-control" type="text" name="email" id="email" maxlength="255"
                        placeholder="E-mail" value="{{Auth()->user()->email}}" data-fv-field="name" readonly><i
                                    style="" class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="name"></i>
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

        $("#verify-modal").modal();

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
@endif -->

        <script src="{{asset('/js/Chart.min.js')}}"></script>


    </main>
@endsection
