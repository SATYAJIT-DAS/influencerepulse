@extends('intro.layouts.app')
@section('content')
<style>
/*.opacity-zero {*/
/*    opacity: 1;*/
/*}*/

/*.opacity-one {*/
/*    opacity: 1;*/
/*}*/
</style>
<main class="main">
    <section>

        <div id="deal-71227" class="container py-1 py-xl-5 deal-container deal-single deal-rebate"
            data-id="71227" data-type="rebate">

            <div class="row">

                <div class="col-xxl-10 col-lg-11 mx-auto pb-3">

                    <div class="d-flex flex-column flex-xl-row">

                        <div class="deal-slider ml-md-3 mx-md-0 mx-md-auto ">



                            <div class="product-gallery col-12 col-md justify-content-md-center flex-column-reverse flex-md-row d-flex">
                                <div class="slider-nav d-md-block  slick-initialized slick-slider slick-vertical "
                                    style="visibility: visible;">
                                    <div class="slick-list draggable" style="height: 330px;">
                                        <div class="slick-track" style="opacity: 1; height: 264px; ">
                                            @foreach($camp->pic as $key => $img)
                                            <div class="slick-slide  slick-active pic-small{{$key}}"
                                                data-slick-index="{{$key}}" aria-hidden="false"
                                                style="width: 60px;" tabindex="-1">
                                                <div>
                                                    <img src="{{asset('public/images/'.$img->image_path)}}"
                                                        alt="{{$camp->product_name}}"
                                                        style="width:auto ;height: 100%; display: inline-block;">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-main-img slick-initialized slick-slider"
                                    style="visibility: visible;">
                                    <div class="slick-list draggable">
                                        <div class="slick-track" style="opacity: 1; width: 1520px;">
                                            @foreach($camp->pic as $key => $img)
                                            <div class="slick-slide opacity-zero{{$key}} opacity-zero main-slide deal-slider-img-sat"
                                                data-slick-index="{{$key}}" aria-hidden="true"
                                                style=" position: relative; left: {{-380*$key}}px; top: 0px; z-index: 998; transition: opacity 500ms ease 0s;"
                                                tabindex="-1">
                                                <div><img src="{{asset('public/images/'.$img->image_path)}}"
                                                        alt="{{$camp->product_name}}"
                                                        style="height: 100%; width:auto; display: inline-block;">
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="prod-description col pl-xl-3">

                            <h5 class="deal-title mt-2 mb-2-5 roboto-medium" style="font-size: 20px;">
                                {{$camp->product_name}}</h5>

                            {{-- <div class="d-flex align-items-center mb-1 justify-content-center">
                                <div>
                                   <h3>{{ dynamicCurrency() }}{{$camp->rebate_price}} After Discount</h3>
                                </div>
                                <div class="percent bg-danger text-white">
                                    Deal: {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}%
                                </div>
                                <div class="d-flex align-items-center text-info font-weight-bold ml-3">
                                    <i class="sprite-icon-piggy-bank mr-1"></i>
                                    YOU SAVE {{ dynamicCurrency() }}{{$camp->price-$camp->rebate_price}}
                                </div>
                            </div> --}}
                            <div class="d-flex align-items-center mb-1 justify-content-center">
                                <div>
                                    <h2>{{ dynamicCurrency() }}{{$camp->rebate_price}} After Discount</h2>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-1 justify-content-center">
                                <div>
                                    <p>You will purchase for {{ dynamicCurrency() }}{{$camp->price}} </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-1 justify-content-center">
                                <div>
                                    <p>You will recive cashback for {{ dynamicCurrency() }}{{$camp->price-$camp->rebate_price}} </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-1 justify-content-center">
                                <div>
                                    <h3 class="p-1 " style="color:#f86c6b">You save {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}% </h3>
                                </div>
                            </div>
                            {{-- <div class="d-flex align-items-center mb-2-5">
                                <h5 class="old-price lato-medium mb-0 mr-0-5">
                                    <del>{{ dynamicCurrency() }}{{$camp->price}}</del>
                                </h5>
                                <h4 class="new-price text-green roboto-black mb-0">
                                    {{ dynamicCurrency() }}<span>{{$camp->rebate_price}}</span>
                                </h4>
                            </div> --}}
                            {{--<div class="mb-2-5"><small class="d-block">
                                    <i class="fal fa-fw fa-link"></i> See this <a
                                        href="https://www.amazon.com/Lego-Sets/dp/B07QQ39RY3"
                                        target="_blank">Lego Sets</a> on {{$camp->market->market_name}}
                                </small><small class="d-block">
                                    <i class="fal fa-fw fa-folder-tree"></i> Get more Rebates up to 100% for <a
                                        href="https://rebatekey.com/rebates/toys-games">Toys & Games</a>
                                </small>
                            </div>--}}
                            <div class="mt-4">

                                {{--<h5 class="text-dark mb-1">
                                    Starting soon... </h5>--}}

                                <p class="mb-2-5">
                                    The Deals starts on {{$camp->start_date."  ".$camp->start_time."  EST" }} </p>

                                <a style="color:white;" class="btn btn-primary btn-block mb-2-5 py-1" id="camp-url" href="{{route('buyer.buy_confirm',$camp->id)}}">
                                    Buy Product
                                </a>
                            </div>
                        </div>
                    </div>
                    {{--<p class="text-center text-muted mt-3 mb-0 mx-1 mx-xxl-10">
                        <small>
                            Note: You have to register with <a href="{{route('intro.home')}}">RebateKey.com</a>
                            to be able to claim a rebate for Lego Sets. Rebates are guaranteed as long as you
                            follow the rules. </small>
                    </p>--}}
                </div>
            </div>
            <hr>
            <div class="row">

                <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-12 mx-auto pt-xl-7-5 pt-4 lato-medium">
                    {!! $camp->description !!}

                </div>

            </div>

        </div>

    </section>




    <section id="more-deals" class="">

        <div class="container-fluid py-xl-10 py-6">

            <h2 class="mb-xl-6 mb-3 text-center">
                Similar Deals and Coupons </h2>

            <div class="row mt-5">
                @foreach($camps as $key => $camp)
                <div data-e2e="my-card" class="card-deal col-md-6 col-lg-4 col-xl-3 col-uxxl-2">
                    <div id="deal-67715" class="deal deal-container deal-item deal-rebate" data-id="67715"
                        data-type="rebate">
                        <div class="row mb-2">
                            <div class="col-10 pr-0">
                                <small>
                                    <i class="fal fa-fw fa-folder-tree text-muted"></i>
                                    <a href="" class="text-muted">
                                        {{$camp->getCategory->name}}
                                    </a>
                                </small>
                            </div>

                            <div class="col-2 pl-0">
                                <div class="deal-actions">
                                    <div class="share">
                                        <i class="fal fa-share-alt fa-fw" data-toggle="collapse"
                                            data-target="#share-67715" aria-expanded="false"
                                            aria-controls="share-67715" role="button"></i>
                                        <div id="share-67715" class="collapse">
                                            <div class="addthis_share">
                                                <i class="addthis_share_button d-block fab fa-facebook fa-fw"
                                                    data-service="facebook"
                                                    data-url=""
                                                    data-title="100% Organic Cotton Flannel Sheet Set (Queen, Gray) - Should not apply any coupon"></i>
                                                <i class="addthis_share_button d-block mt-1 fab fa-twitter fa-fw"
                                                    data-service="twitter"
                                                    data-url=""
                                                    data-title="100% Organic Cotton Flannel Sheet Set (Queen, Gray) - Should not apply any coupon"></i>
                                                <i class="addthis_share_button d-block mt-1 fab fa-pinterest fa-fw"
                                                    data-service="pinterest"
                                                    data-url=""
                                                    data-title="100% Organic Cotton Flannel Sheet Set (Queen, Gray) - Should not apply any coupon"></i>
                                                <i class="addthis_share_button d-block mt-1 d-lg-none fab fa-whatsapp fa-fw"
                                                    data-service="whatsapp"
                                                    data-url=""
                                                    data-title="100% Organic Cotton Flannel Sheet Set (Queen, Gray) - Should not apply any coupon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <a
                            href="{{route('single-page', ['id' => $camp->id,'state'=>'camp'])}}"
                            class="preview">



                            @if($camp->pic[0])

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
                            <a  href="{{route('single-page', ['id' => $camp->id,'state'=>'camp'])}}">{{$camp->product_name}}</a>
                        </h3>

                        <div class="line"></div>

                        <div class="row">

                            <div class="col-7 d-flex align-items-center">
                                <span class="full-price strikethrough text-danger">{{ dynamicCurrency() }}{{$camp->price}}</span>
                                <span class="price text-green">{{ dynamicCurrency() }}{{$camp->rebate_price}}</span>
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

    <section class="bg-primary-light">

        <div class="container">

            <div class="col-xl-8 py-xl-10 py-8 map-bg text-center mx-auto">

                <h2 class="h2 text-white mb-xl-3-5 mb-2">
                    You'd like to get access to hundreds of deals? </h2>

                <p class="mb-xl-5 mb-4 text-white">
                    Join tens of thousands of smart and happy shoppers! What are you waiting for? </p>

                <a href="{{route('intro.buyer-signup')}}" rel="nofollow"
                    class="btn btn-secondary btn-lg text-primary-light px-5-5">
                    Sign Up Now! </a>

            </div>

        </div>

    </section>


</main>
<script>


    $('.slick-slide').on('click', function() {
        $('.slick-slide').removeClass('slick-current  slick-active');
        $(".main-slide").css("opacity", "0");

        //small
        $(this).addClass('slick-current');
        //big
        $key = $(this).data('slick-index');
        $(".opacity-zero" + $key).css("opacity", "1");
    });
    </script>
    <script>
    $(function() {

        $(".opacity-zero0").css("opacity", "1");
        $(".pic-small0").addClass("slick-current");

        RK.Deal.slider($('#deal-67856-modal').find('.slider-main-img'));

    });
    </script>

<!-- <script type="text/javascript">
    $(function(){
        camp_id=$("#camp_id").val();
        camp_url='https://'+window.location.hostname+'/shop_site/buyer/buy_confirm/'+camp_id;
        console.log(camp_url)
        $("#camp-url").attr('href',camp_url);

    })

</script> -->

</div>

@endsection
