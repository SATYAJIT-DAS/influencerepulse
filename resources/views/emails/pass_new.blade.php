@auth
    @switch(Auth()->user()->role_id)
        @case(1)
        <?php  $parent = 'backend.admin.layouts.app';  ?>
        @break

        @case(2)
        <?php  $parent = 'backend.buyer.layouts.app';  ?>
        @break

        @default
        <?php  $parent = 'backend.seller.layouts.app';  ?>
    @endswitch
@else
    <?php  $parent = 'intro.layouts.app';  ?>
@endauth

@extends($parent)

@section('content')
    @auth
        <main class="main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard')}}"><i class="fal fa-home"></i>Home</a>
                </li>
                <li class="breadcrumb-item"><a href="">Account</a></li>
                <li class="breadcrumb-item active">Password</li>
            </ol>
            <div class="container-fluid">

                <div class="card">

                    <div class="card-header">

                        <i class="fal fa-lock"></i> Password
                    </div>

                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col-lg-6">

                                <p>
                                    Use the following form to modify your password. Your password should be at least 8
                                    characters. We highly recommend you to use numbers, letters, punctuation characters.
                                </p>

                            </div>

                            <div class="col-lg-6">

                                <form id="password-form" method="post" action="{{ route('pass_update') }}">
                                @csrf
                                    <!-- <input type="hidden" name="token" value="{{ $token }}"> -->
                                    <input id="email" style="display:none;" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $email ?? old('email') }}" required readonly>

                                    <div class="form-group">
                                        <label class="form-control-label" for="new-password">New password</label>
                                        <div class="controls">
                                            <input class="form-control" type="password" id="new-password"
                                                   name="new_password"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="new-password-check">New password
                                            (again)</label>
                                        <div class="controls">
                                            <input class="form-control" type="password" id="new-password-check"
                                                   name="new_password_check"/>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block" type="submit">
                                        Update Password
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <script>
                $(function () {

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


    @else
        <main class="main">
            <section class="position-relative gradient-bg">

                <div class="container mx-1 my-auto mx-sm-auto">

                    <div class="col-xl-4 col-lg-8 col-md-10 px-0-5 mx-auto my-4">

                        <h1 class="text-center mb-2-5">
                            Reset Password </h1>

                        <p class="text-center mb-6 text-grey">
                            You are about to reset your password for the account <strong>{{$email}}</strong>. </p>


                        <form id="reset-password-form" method="post" class="fv-plugins-bootstrap fv-plugins-framework"
                              action="{{ route('password.update') }}"
                              novalidate="novalidate">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                   style="display: none;">

                            <div class="form-group fv-plugins-icon-container">
                                <label class="sr-only" for="password1">New password</label>
                                <div class="form-controls">
                                    <div class="input-group input-group-shadow focused">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="sprite-icon-pass"></i></span>
                                        </div>
                                        <input class="form-control" type="password" name="password" id="password"
                                               autofocus=""
                                               maxlength="255" placeholder="New password">
                                    </div>
                                    <i data-field="password1" class="fv-plugins-icon fal fa-asterisk"></i>
                                </div>
                                <div class="fv-plugins-message-container"></div>
                            </div>

                            <div class="form-group fv-plugins-icon-container">
                                <label class="sr-only" for="password2">New password (again)</label>
                                <div class="form-controls">
                                    <div class="input-group input-group-shadow">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="sprite-icon-pass"></i></span>
                                        </div>
                                        <input class="form-control" type="password" name="password_confirmation"
                                               id="password-confirm"
                                               maxlength="255" placeholder="New password (again)">
                                    </div>
                                    <i data-field="password2" class="fv-plugins-icon fal fa-asterisk"></i>
                                </div>
                                <div class="fv-plugins-message-container"></div>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">
                                Reset Password
                            </button>

                            <div></div>
                            <button type="submit" style="display: none; height: 0px; width: 0px;"></button>
                        </form>

                    </div>

                </div>

                <script>
                    $(function () {

                        $('#reset-password-form').formValidation({
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


            </section>


        </main>
    @endauth
@endsection
