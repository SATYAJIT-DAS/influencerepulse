@extends('backend.buyer.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('buyer.profile')}}">Account</a></li>
        <li class="breadcrumb-item active">Email address</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-envelope"></i> Email address </div>

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-lg-6">

                        <p>
                            You currently use this email address: <b class="text-success" data-toggle="tooltip"
                                data-placement="bottom" title="Email address validated">{{auth()->user()->email}}</b>. If
                            you update your
                            email address, you'll have to follow the email address verification process again.
                        </p>

                    </div>

                    <div class="col-lg-6">

                        <form id="email-address-form" method="post" action="{{route('email-change')}}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="new-email-address">New email
                                    address</label>
                                <div class="controls">
                                    <input class="form-control" type="text" id="new-email-address"
                                        name="new_email_address" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="new-email-address-check">New email
                                    address (again)</label>
                                <div class="controls">
                                    <input class="form-control" type="text" id="new-email-address-check"
                                        name="new_email_address_check" />
                                </div>
                            </div>


                            <button class="btn btn-primary btn-block" type="submit">
                                Update Email Address </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
    $(function() {

        $('#email-address-form').formValidation({
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
                'new_email_address': {
                    validators: {
                        notEmpty: {
                            message: 'Your new email address is required.'
                        },
                        emailAddress: {
                            message: 'Your new email address is invalid.'
                        },
                        identical: {
                            field: 'new_email_address_check',
                            message: 'The new email address and its confirmation are different.'
                        }
                    }
                },
                'new_email_address_check': {
                    validators: {
                        notEmpty: {
                            message: 'The confirmation for your new email address is required.'
                        },
                        emailAddress: {
                            message: 'The confirmation for your new email address is invalid.'
                        },
                        identical: {
                            field: 'new_email_address',
                            message: 'The new email address and its confirmation are different.'
                        }
                    }
                }
            }
        });

    });
    </script>

</main>
@endsection