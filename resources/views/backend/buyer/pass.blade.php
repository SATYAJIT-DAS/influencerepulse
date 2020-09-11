@extends('backend.buyer.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('buyer.profile')}}">Account</a></li>
        <li class="breadcrumb-item active">Password</li>
    </ol>
    @if(session('faild'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-danger" role="alert">
                <i class="fal fa-exclamation-triangle"></i> Your current password is not correct.
            </div>
        </div>
    </section>
    @endif
    @if(session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> Your password has been reset.
            </div>
        </div>
    </section>
    @endif
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-lock"></i> Password </div>

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-lg-6">

                        <p>
                            Use the following form to modify your password. Your password should be at least 8
                            characters. We highly recommend you to use numbers, letters, punctuation characters.
                        </p>

                    </div>

                    <div class="col-lg-6">

                        <form id="password-form" method="post" action="{{route('pass-reset')}}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="current-password">Current
                                    password</label>
                                <div class="controls">
                                    <input class="form-control" type="password" id="current-password" name="current_password" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="new-password">New password</label>
                                <div class="controls">
                                    <input class="form-control" type="password" id="new-password" name="new_password" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="new-password-check">New password
                                    (again)</label>
                                <div class="controls">
                                    <input class="form-control" type="password" id="new-password-check" name="new_password_check" />
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">
                                Update Password </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        $(function() {

            $('#password-form').formValidation({
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
                    'current_password': {
                        validators: {
                            notEmpty: {
                                message: 'Your current password is required.'
                            }
                        }
                    },
                    'new_password': {
                        validators: {
                            notEmpty: {
                                message: 'Your new password is required.'
                            },
                            stringLength: {
                                min: 8,
                                message: 'Your new password is too short.'
                            },
                            identical: {
                                field: 'new_password_check',
                                message: 'The new password and its confirmation are different.'
                            }
                        }
                    },
                    'new_password_check': {
                        validators: {
                            notEmpty: {
                                message: 'The confirmation for your new password is required.'
                            },
                            identical: {
                                field: 'new_password',
                                message: 'The new password and its confirmation are different.'
                            }
                        }
                    }
                }
            });

        });
    </script>

</main>
@endsection