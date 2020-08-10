@extends('intro.layouts.app')
@section('content')
<script>
// $(".sidebar-fixed").addClass('full-page-wrap gradient-bg sign-up');
// $(".container-fluid").hide();
$(".app-header").hide();
</script>
<style>
footer {
    display: none;
}

.margin-top-80 {
    margin-top: -80px;
}

.sign-up-bg {
    background-image: url({{url('intro/img/signup.jpg')}});
    /* background-repeat: no-repeat;
    background-position: center top;
    background-size: 100%;
    background-size: cover;
    position: fixed;
    right: 0;
    top: 0;
    bottom: 0;
    height: 100vh;
    width: 100%;
    display: flex;
    padding-left: 120px; */
}

.img-text-color{
    color: #c82dea !important;
}

@media (min-width: 1200px) {
    .sign-up-bg {
        z-index: 1021;
    }
}
</style>

<header class="navbar navbar-expand-lg navbar-light app-header margin-top-80"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div class="container d-block">
        <div class="row">
            <div class="col-xl-6 d-flex px-1-5 justify-content-between align-items-center">
                <a class="navbar-brand" href="{{route('intro.home')}}">
                    <img src="{{asset('intro/img/logo.png')}}" alt="InfluencerPulse" class="img-fluid">
                </a>
                <a href="{{route('intro.seller-signup')}}" class="text-decoration-none text-grey lato-medium no-wrap">
                    Sign up as Seller <i class="sprite-icon-arrow-r ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</header>
<div class="app-body">
    <main class="main">
        <section>

            <div class="container">

                <div class="row">

                    <div class="col-xl-6 px-1-5 px-lg-0-8 my-2 text-xl-left text-center">

                        <h1 class="mb-2-5 ">Sign up as Buyer</h1>

                        <p class="mb-xxl-6 mb-xl-3 text-grey lato-medium">
                            <small>Already a member of Influencer Pulse <a href="{{route('intro.signin')}}"   rel="nofollow">Sign
                                    in</a></small>
                        </p>
                        @error('email')
                            <section class="section section-flash mb-2-5 aos-init aos-animate" data-aos="flip-up"><div class="alert alert-danger" role="alert">
                                        <i class="fal fa-exclamation-triangle"></i>
                                    The email address is already in use.
                                </div>
                            </section>
                        @enderror


                        <div class="d-flex align-items-center mb-md-3 mb-1-5">
                            <span class="line"></span>
                            <span class="mx-2 text-grey small-text">sign up with your social network</span>
                            <span class="line"></span>
                        </div>

                        <div class="row align-items-center social-login-buttons mb-xxl-6 mb-xl-3">

                            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-2">
                                <a href="{{route('redirect',  ['service'=>'facebook', 'userSignUpType' => 'buyer'])}}"
                                    class="btn btn-block bg-facebook">
                                    <i class="fab fa-facebook-f mr-1"></i> Facebook
                                </a>
                            </div>

                            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-2">
                                <a href="{{route('redirect',  ['service'=>'google', 'userSignUpType' => 'buyer'])}}" type="button" id="btn-google-sign-in" class="btn btn-block bg-google-plus">
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


                        <form id="buyer-sign-up-form" method="post" class="text-left"  action="{{ route('register') }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="sr-only" for="email">{{ __('E-Mail Address') }}</label>
                                        <div class="form-controls">
                                            <div class="input-group input-group-shadow">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="sprite-icon-envelope"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email"
                                                    maxlength="190" value="" placeholder="Email address">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <input type="password"  style="display: none;"  name="password" id="password" value="12345678">
                                <input type="password" style="display: none;" name="password_confirmation" id="password_confirmation" value="12345678">

                                <input type="hidden" name="role_id" value="2">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="sr-only" for="name">Full name</label>
                                        <div class="form-controls">
                                            <div class="input-group input-group-shadow">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="sprite-icon-user"></i></span>
                                                </div>
                                                <input class="form-control" id="name" name="name" maxlength="255"
                                                    type="text" value="" autofocus placeholder="Full name">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="sr-only" for="name">Phone Name</label>
                                        <div class="form-controls">
                                            <div class="input-group input-group-shadow">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="sprite-icon-phone"></i></span>
                                                </div>
                                                <input class="form-control" id="phone" name="phone" minlength="6"
                                                    type="text" value="" autofocus placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <button class="btn btn-lg btn-block btn-dark" type="submit">
                                Sign Up and Start Shopping </button>

                            <p class="mt-4 text-center small-text mb-0 px-3">
                                By signing up, you agree to our <a href="{{route('intro.term')}}" target="_blank"
                                    rel="nofollow" class="text-danger">Terms of Service</a>, <a href="{{route('intro.term')}}"
                                    target="_blank" rel="nofollow" class="text-dark">Privacy Policy</a> and to receive
                                Influencer Pulse emails,
                                newsletters & updates. This site is protected the Google <a
                                    href="https://policies.google.com/terms" target="_blank" rel="nofollow"
                                    class="text-danger">Terms of Service</a> and <a
                                    href="https://policies.google.com/privacy" target="_blank" rel="nofollow"
                                    class="text-danger">Privacy Policy</a> apply. </small>

                        </form>

                    </div>

                    <div class="col-xl-6 my-2 pr-0 mx-1-5 my-xl-0 mx-xl-0 sign-up-bg">

                        <div class="col-xxl-10 col-lg-11 px-2 m-auto">

                            <p class="my-xxl-2-5 mt-5 mt-lg-2 mb-2-5 mb-lg-1 h1 img-text-color">
                                What is Influencer Pulse?   </p>

                            <p class="mb-xxl-6 mb-xl-2  lato-medium img-text-color">
                                InfluencerPulse gives you direct access to exclusive manufactures deals for top selling brands and products. Just sign up, purchase any product listed in our site and get your cashback sent directly to your GPAY, PHONEPE OR BANK! Here is how it works
                            </p>

                            <ul class="list-unstyled sign-up-list pb-2-5">

                                <li class="mb-xxl-3 mb-1-5 d-flex">
                                    <span>1</span>
                                    <div class="ml-2">
                                        <h4 class="mb-xxl-1-5 img-text-color">
                                            Sign Up </h4>
                                        <p class="mb-0 img-text-color">
                                            Make sure to enter your full name, phone number, address correctly, so that payments reach you.  </p>
                                    </div>
                                </li>

                                <li class="mb-xxl-3 mb-1-5 d-flex">
                                    <span>2</span>
                                    <div class="ml-2">
                                        <h4 class="mb-xxl-1-5 img-text-color">
                                            Shop </h4>
                                        <p class="mb-0 img-text-color">
                                            Browse all the products currently available at 30%-99% off. Select the one you want and just click on Buy Product! </p>
                                    </div>
                                </li>

                                <li class="mb-xxl-3 mb-1-5 d-flex">
                                    <span>3</span>
                                    <div class="ml-2">
                                        <h4 class="mb-xxl-1-5 img-text-color">
                                            Confirm Your OrderNumber.  </h4>
                                        <p class="mb-0 img-text-color">
                                            After you’ve purchased the product you need to confirm your OrderNumber,  Once the seller verifies your order, they will approve the cashback it will automatically added to your wallet amount.
                                        </p>
                                    </div>
                                </li>

                                <li class="d-flex">
                                    <span>4</span>
                                    <div class="ml-2">
                                        <h4 class="mb-xxl-1-5 img-text-color">
                                            Get Paid </h4>
                                        <p class="mb-0 img-text-color">
                                            We hold the funds for 15 days max, to make sure there is no error or problem, and after that it will be deposited to your bank.  </p>
                                    </div>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </section>


    </main>

    <script src="{{asset('intro/js/platform6e2a.js?onload=initGapi')}}" async defer></script>
    <script src="{{asset('intro/js/api62be.js?render=6LfevJ0UAAAAAK322CqRQn5khrtaWqUacoHhytbV')}}"></script>
    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfevJ0UAAAAAK322CqRQn5khrtaWqUacoHhytbV', {
                action: 'sign_up_buyer'
            })
            .then(function(token) {
                $('input[name=token]').val(token);
            });
    });
    RK.User.validateBuyerSignUp();

    function onSuccess(googleUser) {
        window.location.href = '../user/sign-in.html?access_token=' + googleUser.getAuthResponse().id_token;
    }

    function initGapi() {
        gapi.load('auth2', function() {
            auth2 = gapi.auth2.init({
                client_id: '449923061200-uhmioehto8h35c03u0oqkngntm8o13hc.apps.googleusercontent.com'
            });

            // Attach the click handler to the sign-in button
            auth2.attachClickHandler('btn-google-sign-in', {}, onSuccess);
        });
    }
    </script>
    <script>
    fbq("trackCustom", "RK Buyer SignUp", [])
    </script>
    <script>
    _tfa.push({
        notify: 'event',
        name: 'view_content',
        id: 1174786
    });
    </script>
    <noscript>
        <img src='http://trc.taboola.com/1174786/log/3/unip?en=view_content' width='0' height='0'
            style='display:none' />
    </noscript>
    <script>
    snaptr("track", "VIEW_CONTENT", [])
    </script> <!-- Hotjar Tracking Code for www.rebatekey.com -->
    <script>
    (function(h, o, t, j, a, r) {
        h.hj = h.hj || function() {
            (h.hj.q = h.hj.q || []).push(arguments)
        };
        h._hjSettings = {
            hjid: 756120,
            hjsv: 6
        };
        a = o.getElementsByTagName("head")[0];
        r = o.createElement("script");
        r.async = 1;
        r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
        a.appendChild(r);
    })(window, document, "https://static.hotjar.com/c/hotjar-", ".js?sv=");
    </script>

    @endsection
