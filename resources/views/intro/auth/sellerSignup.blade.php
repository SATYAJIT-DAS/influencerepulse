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

<header class="navbar navbar-expand-lg navbar-light app-header margin-top-80">
    <div class="container d-block">
        <div class="row">
            <div class="col-xl-6 d-flex px-1-5 justify-content-between align-items-center">
                <a class="navbar-brand" href="{{route('intro.home')}}">
                    <img src="{{asset('intro/img/logo.png')}}" alt="influencerpulse" class="img-fluid">
                </a>
                <a href="{{route('intro.buyer-signup')}}" class="text-decoration-none text-grey lato-medium no-wrap">
                    Sign up as Buyer <i class="sprite-icon-arrow-r ml-1"></i>
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

                        <h1 class="mb-2-5">Sign up as Seller</h1>

                        <p class="mb-xxl-6 mb-xl-3 text-grey lato-medium">
                            <small>Already have a influencer pulse account? <a href="{{route('intro.signin')}}"
                                    rel="nofollow">Sign
                                    in</a></small>
                        </p>
                        @error('email')
                        <section class="section section-flash mb-2-5 aos-init aos-animate" data-aos="flip-up">
                            <div class="alert alert-danger" role="alert">
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
                                <a href="{{route('redirect', ['service'=>'facebook', 'userSignUpType' => 'seller'])}}"
                                    class="btn btn-block bg-facebook">
                                    <i class="fab fa-facebook-f mr-1"></i> Facebook
                                </a>
                            </div>

                            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-2">
								<a href="{{route('redirect', ['service'=>'google', 'userSignUpType' => 'seller'])}}" type="button"
									id="btn-google-sign-in" class="btn btn-block bg-google-plus"> <i
									class="fab fa-google mr-1"></i> Google
								</a>
							</div>

                        </div>

                        <div class="d-flex align-items-center mb-md-3 mb-1-5">
                            <span class="line"></span>
                            <span class="mx-2 text-grey small-text">or</span>
                            <span class="line"></span>
                        </div>

                        <form id="seller-sign-up-form" method="post" class="text-left"   action="{{ route('register') }}">
                            @csrf

                            <input type="hidden" name="token">

                            <div class="row">

                                <div class="col-xxl-6">

                                    <div class="form-group">
                                        <label class="sr-only" for="email">Email address</label>
                                        <div class="form-controls">
                                            <div class="input-group input-group-shadow">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="sprite-icon-envelope"></i>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    maxlength="190" placeholder="Email address" value="">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" name="password" id="password" value="12345678">
                                <input type="hidden" name="password_confirmation" id="password_confirmation" value="12345678">

                                <input type="hidden" name="role_id" value="3">

                                <div class="col-xxl-6">

                                    <div class="form-group">
                                        <label class="sr-only" for="name">Full name</label>
                                        <div class="form-controls">
                                            <div class="input-group input-group-shadow">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="sprite-icon-user"></i></span>
                                                </div>
                                                <input class="form-control" id="name" name="name" maxlength="255"
                                                    value="" autofocus placeholder="Full name" type="text">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xxl-12">

                                    <div class="form-group">
                                        <label class="sr-only" for="name">Phone Number</label>
                                        <div class="form-controls">
                                            <div class="input-group input-group-shadow">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="sprite-icon-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="phone" name="phone" maxlength="20" minlength="10"
                                                    value="" placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <button class="btn btn-lg btn-block btn-primary" type="submit">
                                Sign up as Seller </button>

                            <p class="mt-4 text-center small-text mb-0 px-3">
                                By signing up, you agree to our <a href="{{route('intro.term')}}" target="_blank"
                                    rel="nofollow" class="text-danger">Terms
                                    of Service</a>, <a href="{{route('intro.term')}}"
                                    target="_blank" rel="nofollow" class="text-dark"> Privacy
                                    Policy</a> and to receive influencer pulse emails, newsletters & updates. This site is
                                protected by reCAPTCHA and the Google <a href="https://policies.google.com/terms"
                                    target="_blank">Terms of Service</a> and <a
                                    href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a>
                                apply. </p>

                        </form>

                    </div>

                    <div class="col-xl-6 my-2 pr-0 mx-1-5 my-xl-0 mx-xl-0 sign-up-bg">

                        <div class="col-xxl-10 col-lg-11 px-2 m-auto">

                            <p class="my-xxl-2-5 mt-5 mt-lg-2 mb-2-5 mb-lg-1 h1  text-center img-text-color">
                                You Create!</p>

                            <p class="mb-xxl-6 mb-xl-2 h5 lato-medium img-text-color">
                                Set your offer discount and quantity, add pictures and descriptions, add link to your marketplace, and publish!
                            </p>

                            <p class="my-xxl-2-5 mt-5 mt-lg-2 mb-2-5 mb-lg-1 h1  text-center img-text-color">
                                We Promote!</p>

                            <p class="mb-xxl-6 mb-xl-2 h5 lato-medium img-text-color">
                                Buyers select your products, purchase full price directly on your marketplace and then claim the cashback using their order ID.
                            </p>



                            <p class="my-xxl-2-5 mt-5 mt-lg-2 mb-2-5 mb-lg-1 h1  text-center img-text-color">
                                We Deliver!</p>

                            <p class="mb-xxl-6 mb-xl-2 h5 lato-medium img-text-color">
                                We request the buyers to promote your products on their social media platform.  We’ll deposit funds to your happy shoppers!
                            </p>

                         <!--    <ul class="list-unstyled sign-up-list pb-2-5">

                                <li class="mb-xxl-3 mb-1-5 d-flex">
                                    <span>1</span>
                                    <div class="ml-2">
                                        <h4 class="mb-xxl-1-5 ">
                                            Sign Up </h4>
                                        <p class="mb-0 ">
                                            Make sure to enter your full name correctly as this will appear on your
                                            rebate checks. We will also send you a text message code to verify that you
                                            are a US resident. </p>
                                    </div>
                                </li>

                                <li class="mb-xxl-3 mb-1-5 d-flex">
                                    <span>2</span>
                                    <div class="ml-2">
                                        <h4 class="mb-xxl-1-5 ">
                                            Shop </h4>
                                        <p class="mb-0 ">
                                            Browse all the products currently available at 25%-99% off. Select the one
                                            you want and just click on Buy Product! </p>
                                    </div>
                                </li>

                                <li class="mb-xxl-3 mb-1-5 d-flex">
                                    <span>3</span>
                                    <div class="ml-2">
                                        <h4 class="mb-xxl-1-5 ">
                                            Confirm Your Rebate Key </h4>
                                        <p class="mb-0 ">
                                            After you’ve purchased the product you need to confirm your REBATE KEY,
                                            which is often your order number. Once the seller verifies your order, they
                                            will approve the rebate and your cash back will be credited to your account.
                                        </p>
                                    </div>
                                </li>

                                <li class="d-flex">
                                    <span>4</span>
                                    <div class="ml-2">
                                        <h4 class="mb-xxl-1-5 ">
                                            Get Paid </h4>
                                        <p class="mb-0 ">
                                            We hold the funds for 35 days to make sure there is no error or problem, and
                                            after that we will send you a check. </p>
                                    </div>
                                </li>
                            </ul>
 -->
                        </div>

                    </div>

                </div>

            </div>

        </section>


    </main>

    <script src="{{asset('intro/js/platform6e2a.js?onload=initGapi')}}" async defer></script>
    <script src="{{asset('intro/js/api62be.js?render=6LfevJ0UAAAAAK322CqRQn5khrtaWqUacoHhytbV')}}"></script>


    @endsection
