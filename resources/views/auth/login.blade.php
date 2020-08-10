@extends('intro.layouts.app')
@section('content')
<style>
.navbar-main-menu {
    display: none;
}

.nav-user {
    display: none;
}

footer {
    display: none;
}
</style>

<main class="main">
    <section class="position-relative">

        <div class="container mx-1 my-auto mx-sm-auto">

            <div class="col-xxl-4 col-xl-5 col-lg-8 col-md-10 px-0-5 mx-auto my-2 my-lg-4">

                <h1 class="text-center mb-2-5">
                    Sign in </h1>

                <p class="text-center mb-3 mb-lg-6 text-grey">
                    <small>
                        New in influencerpulse? <a href="{{route('intro.buyer-signup')}}" rel="nofollow">Sign up</a>
                    </small>
                </p>

                @if ($errors->has('email') || $errors->has('password'))
                <section class="section section-flash mb-2-5 aos-init aos-animate" data-aos="flip-up">
                    <div class="alert alert-danger" role="alert">
                        <i class="fal fa-exclamation-triangle"></i> The email and password did not match.
                    </div>
                </section>
                 @endif


                <div class="d-flex align-items-center mb-md-3 mb-1-5">
                    <span class="line"></span>
                    <span class="mx-2 text-grey small-text">sign in with your social network</span>
                    <span class="line"></span>
                </div>

                <div class="row align-items-center social-login-buttons mb-xl-3">

                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-2">
                        <a href="{{route('redirect','facebook')}}"
                            class="btn btn-block bg-facebook">
                            <i class="fab fa-facebook-f mr-1"></i> Facebook
                        </a>
                    </div>

                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-2">
                        <a href="{{route('redirect','google')}}" type="button" id="btn-google-sign-in" class="btn btn-block bg-google-plus">
                            <i class="fab fa-google mr-1"></i>
                            Google
                        </a>
                    </div>

                </div>

                <div class="d-flex align-items-center mb-md-3 mb-1-5">
                    <span class="line"></span>
                    <span class="mx-2 text-grey small-text">or</span>
                    <span class="line"></span>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="hidden" name="token">

                    <div class="form-group">
                        <label class="sr-only" for="email">Email address</label>
                        <div class="form-controls">
                            <div class="input-group input-group-shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="sprite-icon-envelope"></i></span>
                                </div>
                                <input class="form-control" type="email" name="email" id="email" autofocus
                                    placeholder="Email address" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="form-controls">
                            <div class="input-group input-group-shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="sprite-icon-pass"></i></span>
                                </div>
                                <input class="form-control" type="password" id="password" name="password"
                                    placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-lg btn-block mb-2 mb-lg-5" type="submit">
                        Sign in </button>

                    <div class="text-center">
<!--
                        <a href="lost-password.html" rel="nofollow">
                            Forgot password? </a> -->

                        <a href="{{route('password.request')}}" rel="nofollow">
                            Forgot password? </a>

                        <p class="mt-4 small-text mb-0 px-3">
                            This site is protected by reCAPTCHA and the Google <a
                                href="https://policies.google.com/terms" target="_blank">Terms of Service</a>
                            and <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a>
                            apply. </p>

                    </div>

                </form>

            </div>

        </div>

    </section>


</main>

<script src="intro/js/platform6e2a.js?onload=initGapi" async defer></script>
<script src="intro/js/api62be.js?render=6LfevJ0UAAAAAK322CqRQn5khrtaWqUacoHhytbV"></script>

@endsection
