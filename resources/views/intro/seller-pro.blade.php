@extends('intro.layouts.app')
@section('content')
<style>
.affiliate-bg {
    background: url(intro/img/affiliate-bg.jpg) no-repeat center;
    background-size: cover;
}
</style>
<main class="main">
    <section class="affiliate-bg">

        <div class="container py-xl-20 py-5">

            <div class="row">

                <div class="col-lg-6 col-md-10 mx-auto mx-xl-0 text-center text-xl-left mt-0 d-flex px-2 px-sm-0">
                    <div class="m-auto">
                        <h1 class="mb-3 text-white">influencerpulse Seller Affiliate Program</h1>
                        <p class="mb-3 text-white lato-medium">
                            Make money by spreading the word with your seller friends! </p>
                        <p class="font-italic text-white italic-main-text mb-5">
                            If you are part of the seller community on Amazon, eBay or any other marketplace, do
                            not lose the opportunity to receive an extra income. By referring your seller
                            friends while you offer your products in influencerpulse, you will make your business
                            grow. </p>
                        <a data-scroll href="#seller-sign-up-form" class="btn btn-primary px-xl-9 mb-0 smooth-scroll">
                            Join Affiliate Program </a>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <section>

        <div class="container pt-xl-10 pt-6">
            <div class="mb-6 text-center">
                <h3 class="mb-2-5">Join now!</h3>
                <p class="mb-0">
                    Earn up to <b>$1,000</b> per referral that have signed up.</p>
            </div>
        </div>

        <div class="container mb-xl-9 mb-4">

            <div class="row align-items-center">

                <div class="col-lg-5 mb-3 mb-lg-0">

                    <h5 class="mb-3 text-center text-lg-left">
                        How does it work and what are the benefits? </h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <p>
                                <i class="sprite-icon-li-check mr-1"></i>
                                Joining is easy and free. </p>
                        </li>
                        <li>
                            <p>
                                <i class="sprite-icon-li-check mr-1"></i>
                                As your referrals get their rebates redeemed, you will be credited. </p>
                        </li>
                        <li>
                            <p>
                                <i class="sprite-icon-li-check mr-1"></i>
                                The more redeemed rebates they get, the higher your commission gets: </p>

                            <table class="table table-sm table-striped text-center mb-2-5">

                                <thead>
                                    <tr class="text-dark">
                                        <th>Rebates redeemed</th>
                                        <th>Commission</th>
                                        <th>
                                            Cumulative <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="The cumulative amount of commissions you will be paid for an affiliate when they reach a level"></i>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="text-grey">

                                    <tr>
                                        <td>4+</td>
                                        <td>
                                            $1</td>
                                        <td>$1</td>
                                    </tr>

                                    <tr>
                                        <td>24+</td>
                                        <td>
                                            $5</td>
                                        <td>$6</td>
                                    </tr>

                                    <tr>
                                        <td>56+</td>
                                        <td>
                                            $8</td>
                                        <td>$14</td>
                                    </tr>

                                    <tr>
                                        <td>100+</td>
                                        <td>
                                            $11</td>
                                        <td>$25</td>
                                    </tr>

                                    <tr>
                                        <td>160+</td>
                                        <td>
                                            $15</td>
                                        <td>$40</td>
                                    </tr>

                                    <tr>
                                        <td>256+</td>
                                        <td>
                                            $24</td>
                                        <td>$64</td>
                                    </tr>

                                    <tr>
                                        <td>560+</td>
                                        <td>
                                            $76</td>
                                        <td>$140</td>
                                    </tr>

                                    <tr>
                                        <td>1,080+</td>
                                        <td>
                                            $130</td>
                                        <td>$270</td>
                                    </tr>

                                    <tr>
                                        <td>1,760+</td>
                                        <td>
                                            $170</td>
                                        <td>$440</td>
                                    </tr>

                                    <tr>
                                        <td>4,000+</td>
                                        <td>
                                            $560</td>
                                        <td>$1,000</td>
                                    </tr>
                                </tbody>

                            </table>
                        </li>
                        <li>
                            <p>
                                <i class="sprite-icon-li-check mr-1"></i>
                                Our cookie based tracking software allows affiliates to be credited up to 30
                                days after the first click. </p>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6 offset-lg-1 mb-3 mb-lg-0">
                    <img src="intro/img/affiliate1.jpg" class="img-fluid"
                        alt="Seller Affiliate Program">
                </div>

            </div>

        </div>

    </section>

    <hr />

    <section>

        <div class="container py-xl-10 py-6 dollar-bg">

            <div class="col-xl-6 mx-auto">

                <h3 class="mb-6 text-center">
                    So, what are you waiting for?<br>
                    Enroll now, it is FREE! </h3>


                <form id="seller-sign-up-form" method="post">

                    <input type="hidden" name="token">

                    <div class="form-group">
                        <label class="sr-only" for="name">Full name</label>
                        <div class="form-controls">
                            <div class="input-group input-group-shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="sprite-icon-user"></i></span>
                                </div>
                                <input class="form-control" id="name" name="name" maxlength="255" type="text" value=""
                                    placeholder="Full name">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-7">

                            <div class="form-group">
                                <label class="sr-only" for="email">Email address</label>
                                <div class="form-controls">
                                    <div class="input-group input-group-shadow">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="sprite-icon-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" maxlength="190"
                                            placeholder="Email address" value="">
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-5">

                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <div class="form-controls">
                                    <div class="input-group input-group-shadow">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="sprite-icon-pass"></i></span>
                                        </div>
                                        <input class="form-control" type="password" name="password" id="password"
                                            placeholder="Password">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <button class="btn btn-lg btn-block btn-primary" type="submit">
                        Join Affiliate Program </button>

                    <p class="mt-4 text-center small-text mb-0 px-3">
                        By signing up, you agree to our <a href="../../legal/terms.html" target="_blank">Terms
                            of Service</a>, <a href="../../legal/privacy.html" target="_blank">Privacy
                            Policy</a> and to receive influencerpulse emails, newsletters & updates. This site is
                        protected by reCAPTCHA and the Google <a href="https://policies.google.com/terms"
                            target="_blank">Terms of Service</a> and <a href="https://policies.google.com/privacy"
                            target="_blank">Privacy Policy</a> apply.
                    </p>

                </form>

            </div>

        </div>

    </section>


</main>
</div>

<script src="intro/js/platform6e2a.js?onload=initGapi" async defer></script>
<script src="intro/js/api62be.js?render=6LfevJ0UAAAAAK322CqRQn5khrtaWqUacoHhytbV"></script>

@endsection