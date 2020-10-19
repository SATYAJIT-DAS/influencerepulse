@extends('backend.buyer.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Favorites</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-heart"></i> Favorites </div>

            <div class="card-body">
            @if(count($camps) != 0 || count($coupons) != 0)

                <div class="row">
                    @foreach($coupons as $key => $coupon)
                    <div data-e2e="my-card" class="card-deal col-md-6 col-lg-4 col-xl-3 col-uxxl-2">
                        <div id="deal-1422" class="deal deal-container deal-item deal-coupon new" data-id="1422" data-type="coupon"
                            data-coupon="{{$coupon}}" data-image="{{$coupon->coupon_image}}" data-type="coupon">
                            <div class="row mb-2">

                                <div class="col-7 pr-0"><span class="badge badge-warning">New</span></div>

                                <div class="col-5 pl-0">
                                    <div class="deal-actions">
                                        <div class="favorite">
                                            @if($coupon->favorite ==1)
                                            <i class="text-danger fa-fw fa-heart fas" data-id="{{$coupon->id}}"></i>
                                            @else
                                            <i class="text-danger fa-fw fa-heart fal" data-id="{{$coupon->id}}"></i>
                                            @endif
                                        </div>
                                        <div class="share">
                                            <i class="fal fa-share-alt fa-fw" data-toggle="collapse" data-target="#share-1422"
                                                aria-expanded="false" aria-controls="share-1422" role="button"></i>
                                            <div id="share-1422" class="collapse">
                                                <div class="addthis_share">
                                                    <i class="addthis_share_button d-block fab fa-facebook fa-fw"
                                                        data-service="facebook"
                                                        data-url=""
                                                        data-title="EnjoyTheLittleThings Canvas Wall Art Prints - Bedroom Home Living Room Office Kitchen Decorations - Modern Artwork Motivational Phrases [Set of 3]"></i>
                                                    <i class="addthis_share_button d-block mt-1 fab fa-twitter fa-fw"
                                                        data-service="twitter"
                                                        data-url=""
                                                        data-title="EnjoyTheLittleThings Canvas Wall Art Prints - Bedroom Home Living Room Office Kitchen Decorations - Modern Artwork Motivational Phrases [Set of 3]"></i>
                                                    <i class="addthis_share_button d-block mt-1 fab fa-pinterest fa-fw"
                                                        data-service="pinterest"
                                                        data-url=""
                                                        data-title="EnjoyTheLittleThings Canvas Wall Art Prints - Bedroom Home Living Room Office Kitchen Decorations - Modern Artwork Motivational Phrases [Set of 3]"></i>
                                                    <i class="addthis_share_button d-block mt-1 d-lg-none fab fa-whatsapp fa-fw"
                                                        data-service="whatsapp"
                                                        data-url=""
                                                        data-title="EnjoyTheLittleThings Canvas Wall Art Prints - Bedroom Home Living Room Office Kitchen Decorations - Modern Artwork Motivational Phrases [Set of 3]"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><a
                                href=""
                                class="preview">
                                @if(count($coupon->coupon_image)>0)

                                <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad"
                                    data-background-image="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}">

                                </figure>
                                @else
                                <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad" data-background-image="">
                                </figure>

                                @endif


                            </a>

                            <h3 class="title text-truncate">
                                <a
                                    href="">
                                    {{$coupon->product_name}}
                                </a>
                            </h3>

                            <div class="line"></div>

                            <div class="row">

                                <div class="col-7 d-flex align-items-center">
                                    <span
                                        class="full-price strikethrough text-danger">{{ dynamicCurrency() }}{{ number_format($coupon->price, 2, '.', ',') }}</span>
                                    <span
                                        class="price text-green">{{ dynamicCurrency() }}{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}</span>
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
                    @endforeach


                    @foreach($camps as $key => $camp)
                    <div data-e2e="my-card" class="card-deal col-md-6 col-lg-4 col-xl-3 col-uxxl-2">
                        <div id="deal-67248" class="deal deal-container deal-item deal-rebate new" data-id="67248"  data-type="camp"
                            data-camp="{{$camp}}" data-image="{{$camp->pic}}" data-type="rebate">
                            <div class="row mb-2">

                                <div class="col-7 pr-0"><span class="badge badge-warning">New</span></div>

                                <div class="col-5 pl-0">
                                    <div class="deal-actions">
                                        <div class="favorite">
                                            <i class="text-danger fa-fw fa-heart fas" data-id="{{$camp->id}}"></i>
                                        </div>
                                        <div class="share">
                                            <i class="fal fa-share-alt fa-fw" data-toggle="collapse"
                                                data-target="#share-67248" aria-expanded="false" aria-controls="share-67248"
                                                role="button"></i>
                                            <div id="share-67248" class="collapse">
                                                <div class="addthis_share">
                                                    <i class="addthis_share_button d-block fab fa-facebook fa-fw"
                                                        data-service="facebook"
                                                        data-url=""
                                                        data-title="ObuWare Premium Biodegradable Compostable Bagasse Bowls (130pcs 12oz) Eco-Friendly All Natural Sugarcane Fiber | Classy High-End, No Leaks | Holds Hot, Cold &amp; Liquid Food | Microwave &amp; Freezer Safe"></i>
                                                    <i class="addthis_share_button d-block mt-1 fab fa-twitter fa-fw"
                                                        data-service="twitter"
                                                        data-url=""
                                                        data-title="ObuWare Premium Biodegradable Compostable Bagasse Bowls (130pcs 12oz) Eco-Friendly All Natural Sugarcane Fiber | Classy High-End, No Leaks | Holds Hot, Cold &amp; Liquid Food | Microwave &amp; Freezer Safe"></i>
                                                    <i class="addthis_share_button d-block mt-1 fab fa-pinterest fa-fw"
                                                        data-service="pinterest"
                                                        data-url=""
                                                        data-title="ObuWare Premium Biodegradable Compostable Bagasse Bowls (130pcs 12oz) Eco-Friendly All Natural Sugarcane Fiber | Classy High-End, No Leaks | Holds Hot, Cold &amp; Liquid Food | Microwave &amp; Freezer Safe"></i>
                                                    <i class="addthis_share_button d-block mt-1 d-lg-none fab fa-whatsapp fa-fw"
                                                        data-service="whatsapp"
                                                        data-url=""
                                                        data-title="ObuWare Premium Biodegradable Compostable Bagasse Bowls (130pcs 12oz) Eco-Friendly All Natural Sugarcane Fiber | Classy High-End, No Leaks | Holds Hot, Cold &amp; Liquid Food | Microwave &amp; Freezer Safe"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="release">
                                            <i class="fal fa-clock fa-fw" data-toggle="tooltip"
                                                title="Rebates released @ 03:01 am EST"></i>
                                        </div>
                                    </div>
                                </div>

                            </div><a href="" class="preview">



                                <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad"
                                    data-background-image="{{asset('public/images/'.$camp->pic[0]->image_path)}}">
                                </figure>

                            </a>

                            <h3 class="title text-truncate">
                                <a
                                    href="">
                                    {{$camp->product_name}}
                                </a>
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
                @else

                    <div id="no-favorites" class="text-center">
                        <p class="text-muted">
                            You don't have yet favorites. Browse deals and save your preferred items for future
                            sessions. </p>

                        <a href="" class="btn btn-primary">
                            See deals </a>
                    </div>
                @endif

            </div>

        </div>

    </div>

    <div class="modal fade modal-campaign" id="generic-modal" tabindex="-1" role="dialog"
        href="/buyer/modal/rebate/view.html?id=54584" aria-modal="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="deal-69963" class="deal-container deal-single deal-rebate" data-id="69963" data-type="rebate">

                    <div class="modal-header d-flex justify-content-end pt-0-5 pb-0">

                        <div class="mt-1-5 mr-6 mb-0 social d-flex align-items-center">

                            <div>
                                <div class="favorite">
                                    <i class="text-danger fa-fw fa-heart"  id="favo_true">
                                    </i>
                                </div>
                            </div>

                            <div class="addthis_inline_share_toolbox"
                                data-url=""
                                data-title="1065 rebate(s) - influencerpulse" style="clear: both;">
                                <div id="atstbx3"
                                    class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show"
                                    aria-labelledby="at-37d88ba7-2587-44f7-8e7d-c7befac9da7d" role="region"><span
                                        id="at-37d88ba7-2587-44f7-8e7d-c7befac9da7d" class="at4-visually-hidden">AddThis
                                        Sharing Buttons</span>

                                </div>
                            </div>

                        </div>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                    </div>

                    <div class="modal-body p-lg-5">

                        <div class="d-flex flex-column flex-xl-row align-items-center">

                            <div class="deal-slider ml-md-3 mx-md-0 mx-auto">



                                <div
                                    class="product-gallery col-12 col-md justify-content-center flex-column flex-md-row d-flex">
                                    <div class="slider-nav d-md-block d-none slick-initialized slick-slider slick-vertical"
                                        style="visibility: visible;">
                                        <div class="arrow-up slick-arrow" style=""><i
                                                class="fas fa-chevron-up text-center"></i></div>
                                        <div class="slick-list draggable" style="height: 330px;">
                                            <div class="slick-track" style="opacity: 1; height: 1122px;"
                                                id="sub_images">


                                            </div>
                                        </div>
                                        <div class="arrow-down slick-arrow" style=""><i
                                                class="fas fa-chevron-down text-center"></i></div>
                                    </div>
                                    <div class="slider-main-img slick-initialized slick-slider"
                                        style="visibility: visible;">
                                        <div class="slick-list draggable">
                                            <div class="slick-track" style="opacity: 1; width: 2280px;">
                                                <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                                    aria-hidden="false"
                                                    style="width: 380px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                                    <div><img alt="Washi Tape Gift set"
                                                            style="width: 100%; display: inline-block;" id="main_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prod-description col mt-3 mt-xl-0 pl-xl-3">

                                <h5 class="deal-title mb-2-5 roboto-medium" id="product_name">
                                </h5>

                                <div class="d-flex align-items-center mb-1">
                                    <div class="percent bg-danger text-white">
                                         Discount: <span id="per_data"></span>%
                                    </div>
                                    <div class="d-flex align-items-center text-info font-weight-bold ml-3">
                                        <i class="sprite-icon-piggy-bank mr-1"></i>
                                        YOU SAVE {{ dynamicCurrency() }}<span id="rebate_price"></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-2-5">
                                    <h5 class="old-price lato-medium mb-0 mr-0-5">
                                        <del>{{ dynamicCurrency() }}<span id="price"></span></del>
                                    </h5>
                                    <h4 class="new-price text-green roboto-black mb-0">
                                        {{ dynamicCurrency() }}<span id="save_price"></span>
                                    </h4><small class="d-inline-block ml-0-5" style="color: #989a9c;">+ Free
                                        shipping</small>
                                </div>

                                <div class="deal-coupon-code mb-1 camp-hide">
                                    <i class="fal fa-tag"></i>
                                    <div id="coupon_code"></div>
                                </div>

                                <a id="product_url" class="btn btn-primary btn-block mb-2-5 py-1">
                                    Buy Product </a>

                                <div class="d-md-flex align-items center justify-content-between">

                                    <div class="text-center small-text mb-1 remove-coupon">
                                        <small>
                                            Only <b id="daily_count"></b> more available today! </small>
                                    </div>

                                    <div class="d-flex justify-content-center small-text">
                                        <div class="sold-by mb-1 small-text">
                                            <small>Sold on <span class="text-primary" id="marketplace"></span> by
                                                <span class="text-primary">Gift Bee</span></small>
                                        </div>
                                        <div class="mb-1 ml-0-5">
                                            <div class="release">
                                                <i class="fal fa-clock fa-fw" data-toggle="tooltip"
                                                    title="Rebates released @ 04:00 am EST" id=></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div id="description" class="mt-3 description collapse">

                        </div>

                    </div>

                    <div class="modal-footer p-0">

                        <a data-toggle="collapse" href="#description" role="button" aria-expanded="false"
                            aria-controls="description"
                            class="modal-description btn w-100 border-top py-2-5 text-dark text-center roboto-medium collapsed">
                            <span class="show-description">See product description</span>
                            <span class="hide-description">Hide product description</span>
                        </a>

                    </div>


                    <noscript>
                        <img src='//trc.taboola.com/1174786/log/3/unip?en=view_content' width='0' height='0'
                            style='display:none' />
                    </noscript>

                </div>

            </div>
        </div>
    </div>

    <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a17677794ca7129"></script>
    <script>
        function picSelect(pic_id, image_path){
            $('.opacity-zero').removeClass('slick-current  slick-active');
            $(".opacity-zero" + pic_id).css("opacity", "1");
            $('.opacity-zero' + pic_id).addClass('slick-current  slick-active');
            main_image = `{{asset('public/images/` + image_path + `')}}`;
            $("#main_image").attr('src', main_image);
        }
    $(function() {

        $(".deal-item").click(function() {
            if($(this).data('type') ==  'camp'){
                camp = $(this).data('camp');
                $(".camp-hide").css('display','none');
                $("#product_name").html(camp.product_name);
                per_data = Math.round((100 - camp.rebate_price / camp.price * 100) * 100) / 100;
                $("#per_data").html(per_data);
                $("#rebate_price").html(camp.price - camp.rebate_price);
                $("#price").html(camp.price);
                $("#save_price").html(camp.rebate_price);

                $("#daily_count").html(camp.daily_count);
                // $("#marketplace").html(camp..market_name);
                $("#start_time").attr('title', 'Rebates released ' + camp.start_time);
                $("#description").html(camp.description);

                let url = "{{ route('buyer.buy_confirm', ':id') }}";
                url = url.replace(':id', camp.id);

                start_time=Date.parse(camp.start_date+' '+camp.start_time);
                current_time=Date.parse(new Date());

                if(start_time > current_time){
                    $("#product_url").addClass('disabled');
                    btn_content="Deals starts on "+ camp.start_date +" at "+ camp.start_time +" time. ";
                    console.log(btn_content);
                    $("#product_url").html(btn_content);

                }else if( camp.daily_count <= 0 ){
                    $("#product_url").addClass('disabled');
                    $("#product_url").html('Count Limit');
                }else{
                    $("#product_url").attr('href', url);
                    $("#product_url").removeClass('disabled');
                    $("#product_url").html('Buy Product');
                }


                $("#favo_true").removeClass("fas");
                $("#favo_true").removeClass("fal");

                if (camp.favorite == 1) {
                    $("#favo_true").addClass("fas");
                } else {
                    $("#favo_true").addClass("fal");
                }

                image = $(this).data('image');
                main_image = image[0].image_path;
                main_image = `{{asset('public/images/` + main_image + `')}}`;


                console.log("sdf", main_image)

                $("#main_image").attr('src', main_image);
                $("#main_image").attr('alt', camp.product_name);

                sub_images = "";
                sub_images =
                    `<div class="slick-slide  slick-current slick-active opacity-zero opacity-zero0" data-slick-index="-5" aria-hidden="true" tabindex="-1" style="width: 60px;" onclick="picSelect(0,'`+image[0].image_path+`' )">
                    <div><img src="{{asset('public/images/`;
                sub_images += image[0].image_path + `')}}" alt="` + camp.product_name +
                    `" style="width: 100%; display: inline-block;"></div></div>`;
                console.log("sub_images", sub_images);

                for ($i = 1; $i < image.length; $i++) {
                    sub_images +=
                        `<div class="slick-slide slick-cloned opacity-zero opacity-zero`+$i+`" data-slick-index="-5" aria-hidden="true" tabindex="-1" style="width: 60px;" onclick="picSelect(`+$i+`,'`+ image[$i].image_path+`')"><div><img src="{{asset('public/images/`;
                    sub_images += image[$i].image_path + `')}}" alt="` + camp.product_name +
                        `" style="width: 100%; display: inline-block;"></div></div>`;
                }

                $("#sub_images").html(sub_images);

            }else{

                coupon = $(this).data('coupon');
                    console.log("sdfasd",coupon)
                    $(".camp-hide").css('display','flex');
                    $("#product_name").html(coupon.product_name);
                    $("#per_data").html(coupon.off_per);
                    save_price = Math.round((100 - coupon.off_per)/100 * coupon.price * 100)  / 100;
                    $("#rebate_price").html(rebate_price);

                    $("#price").html(coupon.price);

                    rebate_price= Math.round(coupon.off_per/100 * coupon.price * 100)  / 100;

                    $("#save_price").html(save_price);
                    $("#coupon_code").html(coupon.coupon_code);

                    $(".remove-coupon").css('display','none');
                    $("#product_url").attr('target', "_blank");
                    $("#product_url").attr('href', coupon.product_url);
                    $("#product_url").removeClass('disabled');
                    $("#product_url").html('Copy &amp; Go to Marketplace');

                    $("#daily_rebates").html(coupon.daily_rebates);
                    // $("#marketplace").html(camp..market_name);
                    $("#start_time").attr('title', 'Rebates released ' + coupon.start_time);
                    $("#description").html(coupon.description);


                    // modal favorite
                    $("#favo_true").attr('data-id',coupon.id);

                    $("#favo_true").removeClass("fas");
                    $("#favo_true").removeClass("fal");

                    if (coupon.favorite == 1) {
                        $("#favo_true").addClass("fas");
                    } else {
                        $("#favo_true").addClass("fal");
                    }
                    // favorite end

                    image = $(this).data('image');
                    main_image = image[0].image_path;
                    main_image = `{{asset('public/images/` + main_image + `')}}`;


                    console.log("sdf", main_image)

                    $("#main_image").attr('src', main_image);
                    $("#main_image").attr('alt', coupon.product_name);

                    sub_images = "";

                    sub_images =
                        `<div class="slick-slide  slick-current slick-active  opacity-zero opacity-zero0" data-slick-index="-5" aria-hidden="true" tabindex="-1" style="width: 60px;"  onclick="picSelect(0,'`+ image[0].image_path+`')"><div><img src="{{asset('public/images/`;
                    sub_images += image[0].image_path + `')}}" alt="` + coupon.product_name +
                        `" style="width: 100%; display: inline-block;"></div></div>`;
                    console.log("sub_images", sub_images);

                    for ($i = 1; $i < image.length; $i++) {
                        sub_images +=
                            `<div class="slick-slide slick-cloned  opacity-zero opacity-zero`+$i+`" data-slick-index="-5" aria-hidden="true" tabindex="-1" style="width: 60px;" onclick="picSelect(`+$i+`,'`+ image[$i].image_path+`')"><div><img src="{{asset('public/images/`;
                        sub_images += image[$i].image_path + `')}}" alt="` + coupon.product_name +
                            `" style="width: 100%; display: inline-block;"></div></div>`;
                    }

                    $("#sub_images").html(sub_images);
            }
            // $('#editid').val($(this).data('id'));







        })

        typeof addthis.share !== 'undefined' && addthis.share();

        $(document).on('favorite:removed', function(event, $deal) {
            $deal.parent().fadeOut(function() {
                $(this).remove();
                if ($('.card-deal').length === 0) {
                    $('#no-favorites').fadeIn();
                }
            });
        });

    });
    </script>

</main>
@endsection
