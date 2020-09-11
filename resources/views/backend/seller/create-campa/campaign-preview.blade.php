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
        <li class="breadcrumb-item"><a href="{{route('seller.campaigns')}}">Campaigns</a></li>
        <li class="breadcrumb-item"><a href="{{route('seller.campaigns')}}">Campaign
                #67856</a></li>
        <li class="breadcrumb-item active">Preview</li>
    </ol>
    @isset($msg)
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up"><div class="container-fluid"> <div class="alert alert-success" role="alert">
            <i class="fal fa-check"></i> {{$msg}}</div></div></section>
    @endisset


    <div class="container-fluid">


        <ul class="stepper stepper-horizontal">

             <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'basics'))}}">
                    <span class="circle">1</span>
                    <span class="label">Basics</span>
                </a>
            </li>

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'pic'))}}">
                    <span class="circle">2</span>
                    <span class="label">Pictures</span>

                </a>
            </li>

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'set'))}}" >
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
                    <span class="label">Payment</span>
                </a>
            </li>

            <li>
                <a href="#" class="disabled">
                    <span class="circle">6</span>
                    <span class="label">
                        Submission </span>
                </a>
            </li>

        </ul>

        <form id="create-campaign-form" method="post" action="{{route('campaign-preview')}}">
            @csrf
            <input type="hidden" name="camp_id" value="{{$camp->id}}">
            <div class="card">

                <div class="card-header">
                    <i class="fal fa-desktop"></i> Campaign Preview </div>

                <div class="card-body">

                    <div class="alert alert-info">
                        <i class="fal fa-info-circle"></i>
                        This is a preview of how buyers will see your campaign. Please check everything is fine:
                        title, description, pictures, pricing before continuing. </div>

                    <div class="bg-dark text-white p-3 my-3">
                        <i class="fal fa-info-circle"></i> Preview of your campaign in product listings </div>

                    <div class="row">

                        <div class="col-md-6 col-lg-4 mx-auto">

                            <div id="deal-67856" class="deal deal-container deal-item deal-rebate unclickable new"
                                data-id="67856" data-type="rebate">
                                <div class="row mb-2">

                                    <div class="col-7 pr-0"><span class="badge badge-warning">New</span></div>

                                    <div class="col-5 pl-0">
                                        <div class="deal-actions">
                                            <div class="share">
                                                <i class="fal fa-share-alt fa-fw" data-toggle="collapse"
                                                    data-target="#share-67856" aria-expanded="false"
                                                    aria-controls="share-67856" role="button"></i>
                                                <div id="share-67856" class="collapse">
                                                    <div class="addthis_share">
                                                        <i class="addthis_share_button d-block fab fa-facebook fa-fw"
                                                            data-service="facebook"
                                                            data-url=""
                                                            data-title="qwerqwerqwerqwer"></i>
                                                        <i class="addthis_share_button d-block mt-1 fab fa-twitter fa-fw"
                                                            data-service="twitter"
                                                            data-url=""
                                                            data-title="qwerqwerqwerqwer"></i>
                                                        <i class="addthis_share_button d-block mt-1 fab fa-pinterest fa-fw"
                                                            data-service="pinterest"
                                                            data-url=""
                                                            data-title="qwerqwerqwerqwer"></i>
                                                        <i class="addthis_share_button d-block mt-1 d-lg-none fab fa-whatsapp fa-fw"
                                                            data-service="whatsapp"
                                                            data-url=""
                                                            data-title="qwerqwerqwerqwer"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="release">
                                                <i class="fal fa-clock fa-fw" data-toggle="tooltip"
                                                    title="Rebates released @ 10:05 am EST"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div><a href="" class="preview">


                                    @if(count($images)!=0)
                                    <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad"
                                        data-background-image="{{asset('public/images/'.$images[0]->image_path)}}">
                                    </figure>
                                    @else
                                    <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad"
                                        data-background-image="">
                                    </figure>
                                    @endif

                                </a>

                                <h3 class="title text-truncate">
                                    <a href="">{{$camp->product_name}}</a>
                                </h3>

                                <div class="line"></div>

                                <div class="row">

                                    <div class="col-7 d-flex align-items-center">
                                        <span
                                            class="full-price strikethrough text-danger">₹{{ number_format($camp->price, 2, '.', ',') }}</span>
                                        <span
                                            class="price text-green">₹{{ number_format($camp->rebate_price, 2, '.', ',') }}</span>
                                    </div>

                                    <div class="col-5 d-flex align-items-center justify-content-end discount">
                                        <div class="percent bg-primary">
                                            <span class="discount">
                                                {{round(100-($camp->rebate_price)/($camp->price)*100)}}% OFF
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="bg-dark text-white p-3 mb-3">
                        <i class="fal fa-info-circle"></i>
                        Preview when the buyer clicks on your campaign in the product listings (modal window)
                    </div>

                    <div id="deal-67856-modal" class="deal-container deal-single deal-rebate">

                        <div class="modal-dialog modal-campaign modal-xl my-0 mx-auto">

                            <div class="modal-content">

                                <div class="modal-header d-flex justify-content-end pt-0-5 pb-0">

                                    <div class="mt-1-5 mr-6 mb-0 social d-flex align-items-center">


                                        <div class="addthis_inline_share_toolbox unclickable"
                                            data-url=""></div>

                                    </div>

                                    <button type="button" class="close unclickable" data-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fal fa-times" aria-hidden="true"></i>
                                    </button>

                                </div>

                                <div class="modal-body">

                                    <div class="d-flex flex-column flex-xl-row">

                                        <div class="deal-slider ml-md-3 mx-md-0 mx-auto">


                                            <div class="product-gallery col-12 col-md justify-content-center flex-column flex-md-row d-flex">
                                                <div class="slider-nav d-md-block d-none slick-initialized slick-slider slick-vertical"
                                                    style="visibility: visible;">
                                                    <div class="slick-list draggable" style="height: 330px;">
                                                        <div class="slick-track" style="opacity: 1; height: 264px; ">
                                                            @if($images)
                                                            @foreach($images as $key => $img)
                                                            <div class="slick-slide  slick-active pic-small{{$key}}"
                                                                data-slick-index="{{$key}}" aria-hidden="false"
                                                                style="width: 60px;" tabindex="-1">
                                                                <div><img src="{{asset('public/images/'.$img->image_path)}}"
                                                                        alt="{{$camp->product_name}}"
                                                                        style="width: 100%; display: inline-block;">
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slider-main-img slick-initialized slick-slider"
                                                    style="visibility: visible;">
                                                    <div class="slick-list draggable">
                                                        <div class="slick-track" style="opacity: 1; width: 1520px;">
                                                            @if($images)
                                                            @foreach($images as $key => $img)
                                                            <div class="slick-slide opacity-zero{{$key}} opacity-zero main-slide"
                                                                data-slick-index="{{$key}}" aria-hidden="true"
                                                                style="width: 380px; position: relative; left: {{-380*$key}}px; top: 0px; z-index: 998; transition: opacity 500ms ease 0s;"
                                                                tabindex="-1">
                                                                <div><img src="{{asset('public/images/'.$img->image_path)}}"
                                                                        alt="{{$camp->product_name}}"
                                                                        style="width: 100%; display: inline-block;">
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="prod-description col pl-xl-3" style="max-width: 50%;">

                                            <h1 class="deal-title mb-3 roboto-medium">
                                                {{$camp->product_name}} </h1>

                                            <div class="d-flex justify-content-between align-items-start mb-2-5">
                                                <div>
                                                    <div class="d-flex align-items-center lato-medium">
                                                        <div class="percent bg-danger text-white mr-1 mb-1">
                                                            Discount:
                                                            <span class="discount text-white">{{round(100-($camp->rebate_price)/($camp->price)*100)}}%</span>
                                                        </div>
                                                        <h4 class="old-price lato-medium">
                                                            <del>₹{{ number_format($camp->price, 2, '.', ',') }}</del>
                                                        </h4>
                                                    </div>
                                                    <h3 class="new-price text-green roboto-black h1 mb-0">
                                                        <span>₹{{ number_format($camp->rebate_price, 2, '.', ',') }}</span>
                                                    </h3>
                                                </div>

                                                <div class="lato-medium">
                                                    <p class="mb-0 text-dark d-flex justify-content-between">
                                                        <i class="sprite-icon-piggy-bank mr-0-5 mr-md-1-5"></i>
                                                        Savings
                                                        ₹{{ number_format(($camp->price-$camp->rebate_price), 2, '.', ',') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary btn-block mb-3-5 py-1 mt-3 unclickable">
                                                Buy Product </a>
                                            <div class="d-md-flex align-items center justify-content-between">

                                                <div class="text-center small-text mb-1">
                                                    <small>
                                                        Only <b>{{$camp->daily_rebates-$camp->daily_count}}</b> more available today! </small>
                                                </div>

                                                <div class="d-flex justify-content-center small-text">
                                                    <div class="sold-by mb-1 small-text">
                                                        <small>Sold on <span
                                                                class="text-primary">{{$camp->market->market_name}}</span>
                                                            by
                                                            <span
                                                                class="text-primary">{{$camp->brand_name}}</span></small>
                                                    </div>
                                                    <div class="mb-1 ml-0-5">
                                                        <div class="release">
                                                            <i class="fal fa-clock fa-fw" data-toggle="tooltip" title=""
                                                                data-original-title="Rebates released @ {{$camp->start_time}}"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                    <div id="description-67856" class="mt-3 description collapse">
                                        {!! $camp->description !!}
                                    </div>

                                </div>

                                <div class="modal-footer p-0">

                                    <a data-toggle="collapse" href="#description-67856" role="button"
                                        aria-expanded="false" aria-controls="description-67856"
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


                    <button class="btn btn-primary" type="submit" name="action" value="continue">
                        <i class="fal fa-arrow-right"></i> Continue </button>


                </div>

            </div>

        </form>

    </div>



    <script src="{{asset('backend/js/addthis_widget.js#pubid=ra-5a17677794ca7129')}}"></script>
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


    });
    </script>

</main>

@endsection

