@extends('backend.seller.layouts.app')
@section('content')
<style>
.opacity-zero {
    opacity: 0;
}

.opacity-one {
    opacity: 1;
}
</style>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Coupons</a></li>
        <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Coupon
                #3682</a></li>
        <li class="breadcrumb-item active">Pictures</li>
    </ol>
    <div class="container-fluid">

        <ul class="stepper stepper-horizontal">

            <li>
                <a href="">
                    <span class="circle">1</span>
                    <span class="label">Basics</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span class="circle">2</span>
                    <span class="label">Pictures</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span class="circle">3</span>
                    <span class="label">Settings</span>
                </a>
            </li>

            <li class="active">
                <a href="">
                    <span class="circle">4</span>
                    <span class="label">Preview</span>
                </a>
            </li>

            <li>
                <a href="#" class="disabled">
                    <span class="circle">5</span>
                    <span class="label">
                        Submission </span>
                </a>
            </li>

        </ul>

        <form id="coupon-preview-form" method="post" action="{{route('seller.coupon-preview')}}">
            @csrf
            <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
            <div class="card">

                <div class="card-header">
                    <i class="fal fa-desktop"></i> Coupon Preview </div>

                <div class="card-body">

                    <div class="alert alert-info">
                        <i class="fal fa-info-circle"></i>
                        This is a preview of how buyers will see your coupon. Please check everything is fine:
                        title, description, pictures, pricing before continuing. </div>

                    <div class="bg-dark text-white p-3 my-3">
                        <i class="fal fa-info-circle"></i> Preview of your coupon in product listings </div>

                    <div class="row">

                        <div class="col-md-6 col-lg-4 mx-auto">

                            <div id="deal-3682" class="deal deal-container deal-item deal-coupon unclickable new"
                                data-id="3682" data-type="coupon">
                                <div class="row mb-2">

                                    <div class="col-7 pr-0"><span class="badge badge-warning">New</span></div>

                                    <div class="col-5 pl-0">
                                        <div class="deal-actions">
                                            <div class="share">
                                                <i class="fal fa-share-alt fa-fw" data-toggle="collapse"
                                                    data-target="#share-3682" aria-expanded="false"
                                                    aria-controls="share-3682" role="button"></i>
                                                <div id="share-3682" class="collapse">
                                                    <div class="addthis_share">
                                                        <i class="addthis_share_button d-block fab fa-facebook fa-fw"
                                                            data-service="facebook"
                                                            data-url=""
                                                            data-title="1234567890-987654"></i>
                                                        <i class="addthis_share_button d-block mt-1 fab fa-twitter fa-fw"
                                                            data-service="twitter"
                                                            data-url=""
                                                            data-title="1234567890-987654"></i>
                                                        <i class="addthis_share_button d-block mt-1 fab fa-pinterest fa-fw"
                                                            data-service="pinterest"
                                                            data-url=""
                                                            data-title="1234567890-987654"></i>
                                                        <i class="addthis_share_button d-block mt-1 d-lg-none fab fa-whatsapp fa-fw"
                                                            data-service="whatsapp"
                                                            data-url=""
                                                            data-title="1234567890-987654"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div><a href="" class="preview">

                                    <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad"
                                        data-background-image="{{asset('public/images/'.$images[0]->image_path)}}">
                                    </figure>

                                </a>

                                <h3 class="title text-truncate">
                                    <a
                                        href="">{{$coupon->product_name}}</a>
                                </h3>

                                <div class="line"></div>

                                <div class="row">

                                    <div class="col-7 d-flex align-items-center">
                                        <span
                                            class="full-price strikethrough text-danger">₹{{ number_format($coupon->price, 2, '.', ',') }}</span>
                                        <span
                                            class="price text-green">₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}</span>
                                    </div>

                                    <div class="col-5 d-flex align-items-center justify-content-end discount">
                                        <div class="percent bg-coupon">
                                            <span class="discount">
                                                {{$coupon->off_per}}% OFF
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="bg-dark text-white p-3 mb-3">
                        <i class="fal fa-info-circle"></i>
                        Preview when the buyer clicks on your coupon in the product listings (modal window)
                    </div>

                    <div id="coupon-3682-modal" class="deal-container deal-single">

                        <div class="modal-dialog modal-campaign modal-xl my-0 mx-auto">

                            <div class="modal-content">

                                <div class="modal-header d-flex justify-content-end pt-0-5 pb-0">

                                    <div class="mt-1-5 mr-6 mb-0 social d-flex align-items-center">


                                        <div class="addthis_inline_share_toolbox unclickable"></div>

                                    </div>

                                    <button type="button" class="close unclickable" data-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fal fa-times" aria-hidden="true"></i>
                                    </button>

                                </div>

                                <div class="modal-body">

                                    <div class="d-flex flex-column flex-xl-row">

                                        <div class="deal-slider ml-md-3 mx-md-0 mx-auto">



                                            <div
                                                class="product-gallery col-12 col-md justify-content-center flex-column flex-md-row d-flex">
                                                <div class="slider-nav d-md-block d-none slick-initialized slick-slider slick-vertical"
                                                    style="visibility: visible;">
                                                    <div class="slick-list draggable" style="height: 330px;">
                                                        <div class="slick-track" style="opacity: 1; height: 264px; ">
                                                            @foreach($images as $key => $img)
                                                            <div class="slick-slide  slick-active pic-small{{$key}}"
                                                                data-slick-index="{{$key}}" aria-hidden="false"
                                                                style="width: 60px;" tabindex="-1">
                                                                <div><img src="{{asset('public/images/'.$img->image_path)}}"
                                                                        alt="{{$coupon->product_name}}"
                                                                        style="width: 100%; display: inline-block;">
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
                                                            @foreach($images as $key => $img)
                                                            <div class="slick-slide opacity-zero{{$key}} opacity-zero main-slide"
                                                                data-slick-index="{{$key}}" aria-hidden="true"
                                                                style="width: 380px; position: relative; left: {{-380*$key}}px; top: 0px; z-index: 998; transition: opacity 500ms ease 0s;"
                                                                tabindex="-1">
                                                                <div><img src="{{asset('public/images/'.$img->image_path)}}"
                                                                        alt="{{$coupon->product_name}}"
                                                                        style="width: 100%; display: inline-block;">
                                                                </div>
                                                            </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prod-description col pl-xl-3">

                                            <h1 class="deal-title mb-2-5 roboto-medium">
                                                {{$coupon->product_name}} </h1>

                                            <div class="d-flex align-items-center mb-1">
                                                <div class="percent bg-danger text-white">
                                                    {{$coupon->off_per}}% OFF
                                                </div>
                                                <div class="d-flex align-items-center text-info font-weight-bold ml-3">
                                                    <i class="sprite-icon-piggy-bank mr-1"></i>
                                                    YOU SAVE ₹{{number_format($coupon->price*$coupon->off_per/100, 2, '.', ',')}}
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mb-2-5">
                                                <h5 class="old-price lato-medium mb-0 mr-0-5">
                                                    <del>₹{{ number_format($coupon->price, 2, '.', ',') }}</del>
                                                </h5>
                                                <h4 class="new-price text-green roboto-black mb-0">
                                                    ₹<span>{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}</span>
                                                </h4><small class="d-inline-block ml-0-5" style="color: #989a9c;">+ Free
                                                    shipping</small>
                                            </div>
                                            <div class="deal-coupon-code mb-1">
                                                <i class="fal fa-tag"></i>
                                                <div>{{$coupon->coupon_code}}</div>
                                            </div>

                                            <button type="button"
                                                class="btn btn-primary btn-block mb-2-5 py-1 unclickable">
                                                Copy &amp; Go to Marketplace </button>

                                            <div class="sold-by mb-1 small-text">
                                                <small>Sold on <span class="text-primary">{{$coupon->market->market_name}}</span> by <span
                                                        class="text-primary">{{$coupon->brand_name}}</span></small>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="description-3682" class="mt-3 description collapse">
                                        <p>{!! $coupon->description !!}</p>
                                    </div>

                                </div>

                                <div class="modal-footer p-0">

                                    <a data-toggle="collapse" href="#description-3682" role="button"
                                        aria-expanded="false" aria-controls="description-3682"
                                        class="modal-description btn w-100 border-top py-2-5 text-dark text-center roboto-medium collapsed">
                                        <span class="show-description">See product description</span>
                                        <span class="hide-description">Hide product description</span>
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer text-right">

                    <form method="post">

                        <button class="btn btn-primary" type="submit" name="action" value="continue">
                            <i class="fal fa-arrow-right"></i> Continue </button>

                    </form>

                </div>

            </div>

        </form>

    </div>

    <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a17677794ca7129"></script>


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


        RK.Deal.slider($('#coupon-3682-modal').find('.slider-main-img'));

    });
    </script>

</main>


@endsection