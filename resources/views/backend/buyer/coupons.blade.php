@extends('backend.buyer.components.template')
@section('component')

<div class="btn-group w-100 mb-2" role="group" aria-label="Deal types">
    <a class="btn btn-sm btn-rebate  px-1" href="{{route('dashboard')}}" data-e2e="rebates-button">
        <i class="fal fa-percent"></i> Deals ({{count($camps)}})
    </a>
    <a class="btn btn-sm btn-coupon active focus px-1" data-e2e="coupons-button" href="{{route('buyer.coupons')}}">
        <i class="fal fa-tag"></i> Coupons ({{count($coupons)}})
    </a>
</div>

<div id="deals">

    <div id="page-1" class="page">

        <div class="row">
            @if(count($coupons) > 0)
            @foreach($coupons as $key => $coupon)
            <div data-e2e="my-card" class="card-deal col-md-6 col-lg-4 col-xl-3 col-uxxl-2">
                <div id="deal-1422" class="deal deal-container deal-item deal-coupon new"
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
            @endforeach
            @endif

            <div class="modal fade modal-campaign" id="generic-modal" tabindex="-1" role="dialog"
                href="" aria-modal="true">

                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div id="deal-3806" class="deal-container deal-single deal-coupon" data-id="3806"
                            data-type="coupon"
                            data-url="">

                            <div class="modal-header d-flex justify-content-end pt-0-5 pb-0">

                                <div class="mt-1-5 mr-6 mb-0 social d-flex align-items-center">

                                    <div>
                                        <div class="favorite"><i class="text-danger fa-fw fa-heart fal" id="favo_true"></i></div>
                                    </div>

                                    <div class="addthis_inline_share_toolbox"
                                        data-url=""
                                        data-title="1065 Deals(s) - influencerpulse" style="clear: both;">
                                        <div id="atstbx3"
                                            class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show"
                                            aria-labelledby="at-37d88ba7-2587-44f7-8e7d-c7befac9da7d" role="region">
                                            <span id="at-37d88ba7-2587-44f7-8e7d-c7befac9da7d"
                                                class="at4-visually-hidden">AddThis
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
                                                <div class="slick-list draggable" style="height: 330px;">
                                                    <div class="slick-track" id="sub_images"
                                                        style="opacity: 1; height: 198px;">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider-main-img slick-initialized slick-slider"
                                                style="visibility: visible;">
                                                <div class="slick-list draggable">
                                                    <div class="slick-track" style="opacity: 1; width: 1140px;">
                                                        <div class="slick-slide slick-current slick-active"
                                                            data-slick-index="0" aria-hidden="false"
                                                            style="width: 380px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                                            <div><img style="width: 100%; display: inline-block;"
                                                                    id="main_image"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prod-description col mt-3 mt-xl-0 pl-xl-3">

                                        <h5 class="deal-title mb-2-5 roboto-medium" id="product_name">
                                            Emprian Transparent Blue Wax Beans - Waxing Kit for Deep Hair Removal -
                                            Works for Skin on Face, Armpit, Bikini Line, Leg, Arm - Wooden Applicators,
                                            600g Bag of Hard Beads </h5>

                                        <div class="d-flex align-items-center mb-1">
                                            <div class="percent bg-danger text-white">
                                                <span id="per_data"></span>% OFF
                                            </div>
                                            <div class="d-flex align-items-center text-info font-weight-bold ml-3">
                                                <i class="sprite-icon-piggy-bank mr-1"></i>
                                                YOU SAVE ₹<span id="rebate_price"></span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2-5">
                                            <h5 class="old-price lato-medium mb-0 mr-0-5">
                                                <del>₹<span id="price"></span></del></del>
                                            </h5>
                                            <h4 class="new-price text-green roboto-black mb-0">
                                                ₹<span id="save_price"></span>
                                            </h4><small class="d-inline-block ml-0-5" style="color: #989a9c;">+ Free
                                                shipping</small>
                                        </div>
                                        <div class="deal-coupon-code mb-1">
                                            <i class="fal fa-tag"></i>
                                            <div id="coupon_code"></div>
                                        </div>

                                        <a data-e2e="go-to-marketplace" type="button" id="product_url" target="_blank"
                                            data-clipboard-text="50EMPVID"
                                            class="btn btn-primary btn-block btn-clipboard mb-2-5 py-1">
                                            Copy &amp; Go to Marketplace </a>

                                        <div class="sold-by mb-1 small-text">
                                            <small>Sold on <span class="text-primary">Amazon</span> by <span
                                                    class="text-primary">Emprian</span></small>
                                        </div>
                                    </div>

                                </div>

                                <div id="description" class="mt-3 description collapse" id="description">
                                    <p>Emprian Blue Wax Beans Kit:</p>
                                    <p> </p>
                                    <p>An all in one Wax Beans package to use in wax warmer devices. Suitable for all
                                        hair types. Our transparent Hard Wax Beads are designed to tackle thick and
                                        stubborn hair and are perfect for sensitive areas. Your beach body has never
                                        felt so gorgeously smooth.</p>
                                    <p> </p>
                                    <p>Beans Ingredients: </p>
                                    <p> </p>
                                    <p>Paraffin, Rosin, Rosin Glyceride, Hydrogenated Rosin, Hydrogenated Rosin Methyl
                                        Ester, Bees Wax, Carnauba wax, Coloring Agent </p>
                                    <p> </p>
                                    <p>Whats Included: </p>
                                    <ol>
                                        <li>1 * 600gr Wax Beans Package</li>
                                        <li>10 Small Wax Applicators Wooden Spatula</li>
                                        <li>10 Big Wax Applicators Wooden Spatula</li>
                                        <li>10 Plastic Nose Applicator </li>
                                    </ol>
                                    <p> </p>
                                    <p>Safety Warnings:</p>
                                    <p> </p>
                                    <p>*Read all the instructions before using your wax warmer to reduce risk of burns,
                                        electrocution, fire or injury. </p>
                                    <ol>
                                        <li>Keep away from children.</li>
                                        <li>Avoid touching the hot melted wax beans</li>
                                        <li>Test temperature of the wax before putting hand into the device. </li>
                                        <li>DO NOT apply before testing the melted wax temperature </li>
                                    </ol>
                                    <p> </p>
                                    <p>Usage Instructions:</p>
                                    <p> </p>
                                    <ol>
                                        <li>Apply wax with the direction of hair growth and remove against!</li>
                                        <li>Allow 30 to 45 seconds to harden. </li>
                                        <li>Peel off in one quick motion to lessen the pain and enhance the effects.
                                            Also make sure keeping the hair close to the skin when pull it.</li>
                                        <li>To finish the task you have to use random patches of wax for the hair that
                                            didn’t come off. </li>
                                    </ol>
                                </div>

                            </div>

                            <div class="modal-footer p-0">

                                <a data-e2e="see-description-coupon" data-toggle="collapse" href="#description"
                                    role="button" aria-expanded="false" aria-controls="description"
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



            <script>
                function picSelect(pic_id, image_path){
                    $('.opacity-zero').removeClass('slick-current  slick-active');
                    $(".opacity-zero" + pic_id).css("opacity", "1");
                    $('.opacity-zero' + pic_id).addClass('slick-current  slick-active');
                    main_image = `{{asset('public/images/` + image_path + `')}}`;
                    $("#main_image").attr('src', main_image);
                }
            $(document).ready(function() {
                $(".fa-heart").on('click', function(){
                    coupon_id=$(this).data('id');

                    if($(this).hasClass('fas')){
                        $(this).removeClass('fas');
                        $(this).removeClass('fal');
                        $(this).addClass('fal');
                        favo=0;
                    }else{
                        $(this).removeClass('fas');
                        $(this).removeClass('fal');
                        $(this).addClass('fas');
                        favo=1;
                    }

                    $.ajax({
                        url: "{{route('favo-set-coupon')}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            coupon_id: coupon_id,
                            favo:favo
                        },
                        type: "post",
                        dataType: "json",
                        success: function(result) {
                            console.log('dbset',result);
                        },
                        error:function(e){
                            console.log(e);
                        }
                    })
                })

                $(".deal-item").click(function() {


                    // $('#editid').val($(this).data('id'));
                    coupon = $(this).data('coupon');
                    console.log("sdfasd",coupon)
                    $("#product_name").html(coupon.product_name);
                    $("#per_data").html(coupon.off_per);
                    save_price = Math.round((100 - coupon.off_per)/100 * coupon.price * 100)  / 100;
                    $("#rebate_price").html(rebate_price);

                    $("#price").html(coupon.price);

                    rebate_price= Math.round(coupon.off_per/100 * coupon.price * 100)  / 100;

                    $("#save_price").html(save_price);
                    $("#coupon_code").html(coupon.coupon_code);

                    $("#product_url").attr('href', coupon.product_url);

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

                })

            })
            </script>






            @endsection