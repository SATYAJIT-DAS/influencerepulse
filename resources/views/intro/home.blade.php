@extends('intro.layouts.app')
@section('content')
<style>
.sprite-icon-walmart {
    background-image: url(intro/img/spritesheet.png);
    background-position: -282px -88px;
    width: 149px;
    height: 44px;
}
.sprite-icon-amazon {
    background-image: url(intro/img/spritesheet.png);
    background-position: -282px -44px;
    width: 149px;
    height: 44px;
}
.sprite-icon-ebay {
    background-image: url(intro/img/spritesheet.png);
    background-position: -282px 0px;
    width: 149px;
    height: 44px;
}
.sprite-icon-jet {
    background-image: url(intro/img/spritesheet.png);
    background-position: -282px -176px;
    width: 149px;
    height: 44px;
}
.sprite-icon-shopify {
    background-image: url(intro/img/spritesheet.png);
    background-position: -282px -132px;
    width: 149px;
    height: 44px;
}
</style>
<main class="main">
    <section id="unlock-exclusive-rebates" class="main-bg">

        <div class="container-fluid home-hero">

            <div class="row align-items-center py-3 py-lg-8">

                <div class="col-md-5 col-lg-5 col-xl-4 col-uxxl-3 offset-uxxl-1">

                    <h4 class="text-dark mb-2-5 lato-lighter">
                        Never pay full price again </h4>

                    <h1 class="text-dark mb-3 mb-lg-7">
                        Up to 100% Exclusive Cash Back Deals and Coupons from Trusted Retailers </h1>

                    <h5 class="text-dark lato-lighter">
                        No more clipping coupons or mailing in UPCs. Just claim, buy, and wait for your check to
                        arrive. </h5>

                    <h4 class="text-dark">
                        Thousands of deals are being claimed every day - get yours now! </h4>

                </div>

                <div class="col-md-4 col-lg-4 col-xxl-3 offset-md-3 offset-lg-3 offset-xl-4 mt-3 mt-md-0">


                    <form id="buyer-sign-up-form" method="post" class="text-left"   action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label class="sr-only" for="name">Full name</label>
                            <div class="form-controls">
                                <div class="input-group input-group-shadow">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="sprite-icon-user"></i></span>
                                    </div>
                                    <input class="form-control" id="name" name="name" maxlength="255" type="text"
                                        value="" autofocus placeholder="Full name">
                                </div>
                            </div>
                        </div>
                        <input type="password"  style="display: none;"  name="password" id="password" value="12345678">
                        <input type="password" style="display: none;" name="password_confirmation" id="password_confirmation" value="12345678">

                        <input type="hidden" name="role_id" value="2">

                        <div class="form-group">
                            <label class="sr-only" for="email">Email address</label>
                            <div class="form-controls">
                                <div class="input-group input-group-shadow">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="sprite-icon-envelope"></i></span>
                                    </div>
                                    <input class="form-control" type="email" id="email" name="email" maxlength="190"
                                        value="" placeholder="Email address">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-lg btn-block btn-coupon" type="submit">
                            Get FREE Access </button>

                        <p class="mt-4 text-center mb-0 px-1 text-medium-grey">
                            <small class=" text-dark">
                                By signing up, you agree to our <a href="{{route('intro.term')}}" target="_blank"
                                    rel="nofollow" class="text-danger">Terms of Service</a>, <a href=""
                                    target="_blank" rel="nofollow" class="text-red">Privacy Policy</a> and to receive
                                Influencer Pulse emails,
                                newsletters & updates. This site is protected the Google <a
                                    href="https://policies.google.com/terms" target="_blank" rel="nofollow"
                                    class="text-danger">Terms of Service</a> and <a
                                    href="https://policies.google.com/privacy" target="_blank" rel="nofollow"
                                    class="text-danger">Privacy Policy</a> apply. </small>
                        </p>

                    </form>

                </div>

            </div>

        </div>

    </section>


    <hr>

    <section>

        <div class="container-fluid py-6">

            <h2 class="section-heading mb-xl-3-5 mb-2 text-center">
                Discover our latest deals... </h2>

            <div class="row">
                @foreach($camps as $key => $camp)
                <div data-e2e="my-card" class="card-deal col-md-6 col-lg-4 col-xl-3 col-uxxl-2">
                    <div id="deal-66822" class="deal deal-container deal-item new" data-id="66822"
                        data-type="rebate">
                        <div class="row mb-2">

                            <div class="col-7 pr-0">
                              <!-- <span class="badge badge-remaining">6d left</span> -->
                              <span class="badge badge-warning">New</span></div>

                            <div class="col-5 pl-0">
                                <!-- <div class="deal-actions">
                                    <div class="share">
                                        <i class="fal fa-share-alt fa-fw" data-toggle="collapse"
                                            data-target="#share-66822" aria-expanded="false" aria-controls="share-66822"
                                            role="button"></i>
                                        <div id="share-66822" class="collapse">
                                            <div class="addthis_share">
                                                <i class="addthis_share_button d-block fab fa-facebook fa-fw"
                                                    data-service="facebook"
                                                    data-url=""
                                                    data-title="PUMA x Selena Gomez Women's Backpack"></i>
                                                <i class="addthis_share_button d-block mt-1 fab fa-twitter fa-fw"
                                                    data-service="twitter"
                                                    data-url=""
                                                    data-title="PUMA x Selena Gomez Women's Backpack"></i>
                                                <i class="addthis_share_button d-block mt-1 fab fa-pinterest fa-fw"
                                                    data-service="pinterest"
                                                    data-url=""
                                                    data-title="PUMA x Selena Gomez Women's Backpack"></i>
                                                <i class="addthis_share_button d-block mt-1 d-lg-none fab fa-whatsapp fa-fw"
                                                    data-service="whatsapp"
                                                    data-url=""
                                                    data-title="PUMA x Selena Gomez Women's Backpack"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="release">
                                        <i class="fal fa-clock fa-fw" data-toggle="tooltip"
                                            title="Deals released @ {{$camp->start_time}}"></i>
                                    </div>
                                </div> -->
                            </div>

                        </div>
                        <a href="{{route('single-page', ['id' => $camp->id,'state'=>'camp'])}}" class="preview">
                            @if(count($camp->pic)>0)
                            <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad"
                                data-background-image="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                style="background-image: url('{{asset('public/images/'.$camp->pic[0]->image_path)}}');">
                            </figure>
                            @else
                            <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad" data-background-image="">
                            </figure>
                            @endif

                        </a>

                        <h3 class="title text-truncate">
                            <a href="{{route('single-page', ['id' => $camp->id,'state'=>'camp'])}}">{{$camp->product_name}}</a>
                        </h3>

                        <div class="line"></div>

                        <div class="row">

                            <div class="col-7 d-flex align-items-center">
                                <span class="full-price strikethrough text-danger">₹{{$camp->price}}</span>
                                <span class="price text-green">₹{{$camp->rebate_price}}</span>
                            </div>

                            <div class="col-5 d-flex align-items-center justify-content-end discount">
                                <div class="percent bg-primary">
                                    <span class="discount">
                                        {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% OFF
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </section>

    <section id="request-access" class="bg-light-grey py-3">

        <div class="container">

            <div class="d-md-flex text-center align-items-center justify-content-center">

                <h4 class="mb-3 mb-md-0 lato-lighter">
                    Would you like to see more deals? </h4>

                <a href="{{route('intro.buyer-signup')}}" class="btn btn-primary btn-lg d-md-inline-block ml-md-3">
                    Sign Up Now! </a>

            </div>

        </div>

    </section>

    <section id="marketplaces">

        <div class="container py-xl-6 py-4">

            <div class="row align-items-center">

                <div class="col-lg-3 col-xl-2 mb-3 mb-lg-0 text-center">

                    <h6 class="section-subheading text-uppercase mb-0">
                        Trusted Retailers </h6>

                </div>

                <div class="col-lg-9 col-xl-10">

                    <div class="row align-items-center text-center">
                        <div class="col-md-4 col-xxl-2 offset-xxl-1 mb-3 mb-xxl-0">
                            <i class="sprite-icon-amazon m-auto"></i>
                        </div>
                        <div class="col-md-4 col-xxl-2 mb-3 mb-xxl-0">
                            <img src="{{asset('intro/icon/flipkart.png')}}" width="135">
                            <!-- <i class="sprite-icon-walmart m-auto"></i>                             -->
                        </div>
                        <div class="col-md-4 col-xxl-2 mb-3 mb-xxl-0">
                            <img src="https://adn-static1.nykaa.com/media/wysiwyg/HeaderIcons/NykaaLogoSvg.svg" width="135">

                            <!-- <i class="sprite-icon-ebay m-auto"></i> -->
                        </div>
                        <div class="col-md-3 col-xxl-2 offset-md-2 offset-xxl-0 mb-3 mb-md-0">
                            <img src="{{asset('intro/icon/snapdeal.png')}}" width="135">

                            <!-- <i class="sprite-icon-jet m-auto"></i> -->
                        </div>
                        <div class="col-md-3 col-xxl-2 offset-md-2 offset-xxl-0">
                            <img src="{{asset('intro/icon/mantra.png')}}" width="135">

                            <!-- <i class="sprite-icon-shopify m-auto"></i> -->
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="bg-primary-light">

        <div class="container">

            <div class="col-xl-8 py-xl-10 py-8 map-bg text-center mx-auto">

                <h2 class="h2 text-white mb-xl-3-5 mb-2">Be part of Influencer Pulse</h2>

                <p class="mb-xl-5 mb-4 text-white">
                    Join tens of thousands of smart and happy shoppers! What are you waiting for? </p>

                <a href="{{route('intro.buyer-signup')}}" class="btn btn-secondary btn-lg text-start px-5-5 start-txt">
                    Start Now! </a>

            </div>

        </div>

    </section>


</main>
<script src="intro/js/e532150e6067777963aa.js"></script>
<script src="intro/js/addthis_widget.js#pubid=ra-5a17677794ca7129"></script>
<script src="intro/js/platform6e2a.js?onload=initGapi" async defer></script>
<script src="intro/js/api62be.js?render=6LfevJ0UAAAAAK322CqRQn5khrtaWqUacoHhytbV"></script>

<noscript>
    <img src='http://trc.taboola.com/1174786/log/3/unip?en=view_content' width='0' height='0' style='display:none' />
</noscript>


@endsection
