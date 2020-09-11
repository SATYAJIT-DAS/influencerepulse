@extends('backend.buyer.layouts.app')
@section('content')

    <style type="text/css">
        .sort {
            color: #23282c !important;
        }

        .sort:hover {
            cursor: pointer;
        }

        .opacity-zero {
            opacity: 1;
        }

        .opacity-one {
            opacity: 1;
        }
    </style>

    <main class="main">
        @if (session('status'))
            <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        <i class="fal fa-check"></i> {{ session('status') }}</div>
                </div>
            </section>
        @endif
        <div class="container-fluid mt-2">


            <a class="btn btn-outline-dark btn-block btn-sm mb-2 d-lg-none" data-toggle="collapse"
               href="#search-section"
               role="button" aria-expanded="false" aria-controls="searchSection">
                <i class="fal fa-search-plus"></i> Search</a>

            <div id="search-section" class="card d-lg-block collapse">

                <div class="card-body">

                    <form id="search-form" method="post" action="{{route('buyer.search_global')}}">
                        @csrf

                        <input type="hidden" name="search[sort]" value="" id="sort">

                        <div class="row">

                            <div class="col-xl-8 col-xxl-9">

                                <div id="filters">

                                    <div id="main-filters" class="row align-items-center">

                                        <div class="col-md-6 col-xl-7">

                                            <div class="form-group mb-2 mb-xl-0">
                                                <label for="search" class="sr-only">Search</label>
                                                @isset($term)
                                                    <input data-e2e="search-field" class="form-control" type="text"
                                                           name="search[term]" id="search" value="{{$term}}"
                                                           placeholder="Search deals..."
                                                           autofocus>
                                                @else
                                                    <input data-e2e="search-field" class="form-control" type="text"
                                                           name="search[term]" id="search" value=""
                                                           placeholder="Search deals..."
                                                           autofocus>
                                                @endisset
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-xl-5">
                                            <div class="form-group mb-2 mb-xl-0">
                                                <label class="sr-only" for="category-id">Category</label>
                                                <select data-e2e="category-id" name="search[category_id][]"
                                                        id="category-id"
                                                        class="form-control" size="1" multiple="multiple"
                                                        placeholder="Select categories">
                                                    @foreach($categories as $key => $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="advanced-filters" class="collapse">

                                        <div class="row align-items-center">

                                            <div class="col-xxl-6 d-md-flex align-items-center justify-content-between">

                                                <div class="form-group mb-xl-0 mt-xl-2">
                                                    <label class="sr-only" for="min-price">Min Price</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₹</span>
                                                        </div>
                                                        @isset($min_price)
                                                            <input data-e2e="min-price" type="number" step="0.01"
                                                                   min="0"
                                                                   class="form-control" id="min-price"
                                                                   name="search[min_price]"
                                                                   value="{{$min_price}}" placeholder="Min Price"/>
                                                        @else
                                                            <input data-e2e="min-price" type="number" step="0.01"
                                                                   min="0"
                                                                   class="form-control" id="min-price"
                                                                   name="search[min_price]"
                                                                   value="" placeholder="Min Price"/>
                                                        @endisset
                                                    </div>
                                                </div>

                                                <div class="mb-0 mb-md-2 mt-xl-3 px-1 d-none d-md-block">-</div>

                                                <div class="form-group mb-xl-0 mt-xl-2">
                                                    <label class="sr-only" for="max-price">Max Price</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">₹</span>
                                                        </div>
                                                        @isset($max_price)
                                                            <input data-e2e="max-price" type="number" step="0.01"
                                                                   min="0"
                                                                   class="form-control" id="max-price"
                                                                   name="search[max_price]"
                                                                   value="{{$max_price}}" placeholder="Max Price"/>
                                                        @else
                                                            <input data-e2e="max-price" type="number" step="0.01"
                                                                   min="0"
                                                                   class="form-control" id="max-price"
                                                                   name="search[max_price]"
                                                                   value="" placeholder="Max Price"/>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-xxl-3">
                                                <div class="form-group mb-xl-0 mt-xl-2">
                                                    <label class="sr-only" for="marketplace-id">Marketplace</label>
                                                    <select data-e2e="marketplace-id" name="search[marketplace_id]"
                                                            id="marketplace-id" class="form-control">
                                                        <option value="">Select marketplace</option>
                                                        @foreach($markets as $key=> $market)
                                                            <option
                                                                value="{{$market->id}}">{{$market->market_name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-4 col-xxl-3">
                                                <div class="form-group mb-xl-0 mt-xl-2">
                                                    <div class="form-check">
                                                        <input data-e2e="only-available" class="form-check-input"
                                                               type="checkbox" value="1" id="available"
                                                               name="search[available]">
                                                        <label class="form-check-label" for="available">
                                                            Only show available </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-4 col-xxl-3">

                                <div class="btn-group w-100">
                                    <button data-e2e="search-button" class="btn btn-primary" type="submit">
                                        <i class="fal fa-search"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button class="btn btn-dark btn-block dropdown-toggle" type="button"
                                                id="sort-btn"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fal fa-sort-amount-down-alt"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('dashboard')}}"
                                               class="dropdown-item">
                                                Default </a>
                                            <a data-key='newest'
                                               class="dropdown-item sort">
                                                Newest </a>
                                            <a data-key='end'
                                               class="dropdown-item sort">
                                                Ending </a>
                                            <a data-key='per-dis'
                                               class="dropdown-item sort">
                                                % Discount </a>
                                            <a data-key='low-dis'
                                               class="dropdown-item sort">
                                                Lowest Discount </a>
                                            <a data-key='high-dis'
                                               class="dropdown-item sort">
                                                Highest Discount </a>
                                            <a data-key='low-list-price'
                                               class="dropdown-item sort">
                                                Lowest Listing Price </a>
                                            <a data-key='high-list-price'
                                               class="dropdown-item sort">
                                                Highest Listing Price </a>
                                            <a data-key='low-price'
                                               class="dropdown-item sort">
                                                Lowest Price </a>
                                            <a data-key='high-price'
                                               class="dropdown-item sort">
                                                Highest Price </a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button data-e2e="filters-btn"
                                                class="btn btn-outline-dark btn-block dropdown-toggle" type="button"
                                                id="filters-btn" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            <i class="fal fa-filter"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-e2e="advanced-filters" href="#" class="dropdown-item"
                                               data-toggle="collapse" data-target="#advanced-filters">
                                                <i class="fal fa-plus"></i> Advanced search
                                            </a>
                                            <a href="{{route('dashboard')}}" class="dropdown-item">
                                                <i class="fal fa-eraser"></i> Clear filters
                                            </a>
                                            <div class="dropdown-header text-center">
                                                <strong>Default filters</strong>
                                            </div>
                                            <!-- <a data-e2e="save-filters" href=""
                                                class="dropdown-item" data-toggle="modal" data-target="#generic-modal">
                                                <i class="fal fa-save"></i> Save filters
                                            </a> -->
                                            <a data-e2e="reset-filters"
                                               href="{{route('dashboard')}}"
                                               class="dropdown-item">
                                                <i class="fal fa-times"></i> Reset filters
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>
            <div class="btn-group w-100 mb-2" role="group" aria-label="Deal types">
                <a class="btn btn-sm btn-rebate active focus px-1" href="{{route('buyer.index')}}"
                   data-e2e="rebates-button">
                    <i class="fal fa-percent"></i> Deals ({{count($camps)}})
                </a>
                <a class="btn btn-sm btn-coupon px-1" data-e2e="coupons-button" href="{{route('buyer.coupons')}}">
                    <i class="fal fa-tag"></i> Coupons ({{count($coupons)}})
                </a>
            </div>

            <div id="deals">


                <div class="row">
                    @if(count($camps)!=0)
                        @foreach($camps as $key => $camp)
                            <div data-e2e="my-card" class="card-deal col-md-6 col-lg-4 col-xl-3 col-uxxl-2">
                                <div id="deal-67248" class="deal deal-container deal-item deal-rebate new"
                                     data-id="67248"
                                     data-camp="{{$camp}}" data-image="{{$camp->pic}}" data-type="rebate">
                                    <div class="row mb-2">

                                        <div class="col-7 pr-0"><span class="badge badge-warning">New</span></div>

                                        <div class="col-5 pl-0">
                                            <div class="deal-actions">
                                                <div class="favorite">
                                                    @if($camp->favorite ==1)
                                                        <i class="text-danger fa-fw fa-heart fas favo-{{$camp->id}}"
                                                           data-id="{{$camp->id}}"></i>
                                                    @else
                                                        <i class="text-danger fa-fw fa-heart fal favo-{{$camp->id}}"
                                                           data-id="{{$camp->id}}"></i>
                                                    @endif
                                                </div>
                                                <div class="share">
                                                    <i class="fal fa-share-alt fa-fw" data-toggle="collapse"
                                                       data-target="#share-67248" aria-expanded="false"
                                                       aria-controls="share-67248"
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
                                                       title="Release Deals @ 03:01 am IST"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <a
                                        href=""
                                        class="preview">


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
                    @endif

                </div>

            </div>

        </div>

        <div class="page-load-status">
            <div class="loader-ellipse infinite-scroll-request">
                <span class="loader-ellipse-dot"></span>
                <span class="loader-ellipse-dot"></span>
                <span class="loader-ellipse-dot"></span>
                <span class="loader-ellipse-dot"></span>
            </div>
            <p class="infinite-scroll-last">No more rebates</p>
            <p class="infinite-scroll-error">No more pages to load</p>
        </div>

        </div>


        <div class="modal fade modal-campaign" id="generic-modal" tabindex="-1" role="dialog"
             href="/buyer/modal/rebate/view.html?id=54584" aria-modal="true">

            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div id="deal-69963" class="deal-container deal-single deal-rebate" data-id="69963"
                         data-type="rebate">

                        <div class="modal-header d-flex justify-content-end pt-0-5 pb-0">

                            <div class="mt-1-5 mr-6 mb-0 social d-flex align-items-md-center">

                                <div>
                                    <div class="favorite">

                                        <i class="text-danger fa-fw fa-heart fas" id="favo_true">
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

                            <div class="d-flex flex-column flex-xl-row align-items-md-center">

                                <div class="deal-slider ml-md-3 mx-md-0">


                                    <div
                                        class="product-gallery col-12 col-md justify-content-center flex-column-reverse flex-md-row d-flex">
                                        <div
                                            class="slider-nav d-md-block  slick-initialized slick-slider slick-vertical d-flex flex-sm-column flex-md-row"
                                            style="visibility: visible;">
                                            <div class="arrow-up slick-arrow d-none d-md-block" style=""><i
                                                    class="fas fa-chevron-up text-center"></i></div>
                                            <div class="slick-list draggable buyer-slick-img">
                                                <div class="slick-track" style="opacity: 1; height: 1122px;"
                                                     id="sub_images">

                                                </div>
                                            </div>
                                            <div class="arrow-down slick-arrow d-none d-md-block" style=""><i
                                                    class="fas fa-chevron-down text-center"></i></div>
                                        </div>
                                        <div class="slider-main-img slick-initialized slick-slider main-slide"
                                             style="visibility: visible;">
                                            <div class="slick-list draggable">
                                                <div class="slick-track" style="opacity: 1; width: 2280px;">
                                                    <div class="slick-slide slick-current slick-active"
                                                         data-slick-index="0"
                                                         aria-hidden="false"
                                                         style="width: 380px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                                        <div><img alt=""
                                                                  style="height: 100%;width: auto;display: inline-block;"
                                                                  id="main_image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="prod-description col mt-3 mt-xl-0 pl-xl-3">

                                    <h5 class="deal-title mb-2-5 roboto-medium" style="font-size:20px;" id="product_name">

                                    </h2>
                                    <div class="d-flex align-items-center mb-1 justify-content-center">
                                        <div>
                                            <h3>₹<span id="save_price"></span> After Discount</h3>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1 justify-content-center">
                                        <div>
                                            <p>You will purchase for ₹<span id="price"></span> </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1 justify-content-center">
                                        <div>
                                            <p>You will recive cashback for ₹<span id="rebate_price"> </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1 justify-content-center">
                                        <div>
                                            <h4 class="p-1" style="color:#f86c6b">You save <span id="per_data"></span>% </h4>
                                        </div>
                                    </div>

                                    {{-- <div class="d-flex align-items-center mb-1">
                                        <div class="percent bg-danger text-white">
                                            Discount: <span id="per_data"></span>%
                                        </div>
                                        <div class="d-flex align-items-center text-info font-weight-bold ml-3">
                                            <i class="sprite-icon-piggy-bank mr-1"></i>
                                            YOU SAVE ₹<span id="rebate_price"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2-5">
                                        <h5 class="old-price lato-medium mb-0 mr-0-5">
                                            <del>₹<span id="price"></span></del>
                                        </h5>
                                        <h4 class="new-price text-green roboto-black mb-0">
                                            ₹<span id="save_price"></span>
                                        </h4><small class="d-inline-block ml-0-5" style="color: #989a9c;">+ Free
                                            shipping</small>
                                    </div> --}}

                                    <a id="product_url" class="btn btn-primary btn-block mb-2-5 py-1">
                                        Buy Product </a>

                                    <div class="d-md-flex align-items center justify-content-between">

                                        <div class="text-center small-text mb-1">
                                            <small>
                                                Only <b id="daily_count"></b> more available today! </small>
                                        </div>

                                        {{-- <div class="d-flex justify-content-center small-text">
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
                                        </div> --}}
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
                                 style='display:none'/>
                        </noscript>

                    </div>

                </div>
            </div>
        </div>


        {{--@if(auth()->user()->phone_verify == 0)
            @switch(session('phone_check'))
                @case('code_check')
                <div class="modal fade" id="check-sms-modal" tabindex="-1" role="dialog" href="/buyer/modal/sms/check"
                     aria-modal="true" style="padding-right: 17px; display: block;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">

                                <h5 class="modal-title">Confirm your phone number</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fal fa-times" aria-hidden="true"></i>
                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="row my-2">

                                    <div class="col-md-8 mx-auto">

                                        <section class="section section-flash mb-2-5 aos-init aos-animate"
                                                 data-aos="flip-up">
                                            <div class="alert alert-info" role="alert">
                                                <i class="fal fa-info-circle"></i> Please check your phone, we just sent
                                                you a code by
                                                SMS. it should arrive really soon. Enter below the verification code (4
                                                digits) provided
                                                in the text.
                                            </div>
                                        </section>
                                        <form id="check-sms-form" method="post" novalidate="novalidate"
                                              class="fv-form fv-form-bootstrap4" action="{{route('code-check')}}">
                                            @csrf
                                            <button type="submit" class="fv-hidden-submit"
                                                    style="display: none; width: 0px; height: 0px;"></button>

                                            <div class="form-group fv-has-feedback">
                                                <label class="form-control-label" for="code">Code</label>
                                                <div class="controls">
                                                    <div class="input-group">
                                                        <input type="number" name="code" class="form-control" id="code"
                                                               placeholder="Enter the verification code" maxlength="4"
                                                               data-fv-field="code">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary">Verify
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <i class="fv-control-feedback fv-bootstrap-icon-input-group fal fa-asterisk"
                                                       data-fv-icon-for="code" style=""></i>
                                                </div>
                                                <small class="form-control-feedback" data-fv-validator="stringLength"
                                                       data-fv-for="code"
                                                       data-fv-result="NOT_VALIDATED" style="display: none;">The
                                                    verification code requires
                                                    4 digits.</small><small class="form-control-feedback"
                                                                            data-fv-validator="notEmpty"
                                                                            data-fv-for="code"
                                                                            data-fv-result="NOT_VALIDATED"
                                                                            style="display: none;">The
                                                    verification code is required.</small><small
                                                    class="form-control-feedback"
                                                    data-fv-validator="integer" data-fv-for="code"
                                                    data-fv-result="NOT_VALIDATED"
                                                    style="display: none;">Please enter a valid number</small>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <p class="text-center text-muted mt-3">
                                    <small>
                                        Didn't receive the verification code? <a href="{{route('againSend')}}">Try
                                            again</a>
                                    </small>
                                </p>

                                <script>
                                    $(function () {

                                        $("#check-sms-modal").modal();

                                        $('#check-sms-form').on('init.field.fv', function (e, data) {
                                            const $icon = data.element.data('fv.icon'),
                                                options = data.fv.getOptions(), // Entire options
                                                validators = data.fv.getOptions(data.field)
                                                    .validators; // The field validators

                                            if (validators.notEmpty && options.icon && options.icon.required) {
                                                $icon.addClass(options.icon.required).show();
                                            }
                                        }).formValidation({
                                            framework: 'bootstrap4',
                                            icon: {
                                                required: 'fal fa-asterisk',
                                                valid: 'fal fa-check',
                                                invalid: 'fal fa-times',
                                                validating: 'fal fa-refresh'
                                            },
                                            addOns: {
                                                mandatoryIcon: {
                                                    icon: 'fal fa-asterisk'
                                                }
                                            },
                                            fields: {
                                                'code': {
                                                    validators: {
                                                        stringLength: {
                                                            min: 4,
                                                            max: 4,
                                                            message: 'The verification code requires 4 digits.'
                                                        },
                                                        notEmpty: {
                                                            message: 'The verification code is required.'
                                                        }
                                                    }
                                                }
                                            }
                                        });

                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
                @break


                @case('code_faild')
                <div class="modal fade" id="faild-code" tabindex="-1" role="dialog" href="/buyer/modal/sms/check"
                     aria-modal="true" style="padding-right: 17px; display: block;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">

                                <h5 class="modal-title">Confirm your phone number</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fal fa-times" aria-hidden="true"></i>
                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="row my-2">

                                    <div class="col-md-8 mx-auto">

                                        <section class="section section-flash mb-2-5 aos-init aos-animate"
                                                 data-aos="flip-up">
                                            <div class="alert alert-danger" role="alert">
                                                <i class="fal fa-exclamation-triangle"></i> This code is invalid.
                                            </div>
                                        </section>
                                        <form id="check-sms-form" method="post" novalidate="novalidate"
                                              class="fv-form fv-form-bootstrap4" action="{{route('code-check')}}">
                                            @csrf
                                            <button type="submit" class="fv-hidden-submit"
                                                    style="display: none; width: 0px; height: 0px;"></button>

                                            <div class="form-group fv-has-feedback">
                                                <label class="form-control-label" for="code">Code</label>
                                                <div class="controls">
                                                    <div class="input-group">
                                                        <input type="number" name="code" class="form-control" id="code"
                                                               placeholder="Enter the verification code" maxlength="4"
                                                               data-fv-field="code">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary">Verify
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <i class="fv-control-feedback fv-bootstrap-icon-input-group fal fa-asterisk"
                                                       data-fv-icon-for="code" style=""></i>
                                                </div>
                                                <small class="form-control-feedback" data-fv-validator="stringLength"
                                                       data-fv-for="code"
                                                       data-fv-result="NOT_VALIDATED" style="display: none;">The
                                                    verification code requires
                                                    4 digits.</small><small class="form-control-feedback"
                                                                            data-fv-validator="notEmpty"
                                                                            data-fv-for="code"
                                                                            data-fv-result="NOT_VALIDATED"
                                                                            style="display: none;">The
                                                    verification code is required.</small><small
                                                    class="form-control-feedback"
                                                    data-fv-validator="integer" data-fv-for="code"
                                                    data-fv-result="NOT_VALIDATED"
                                                    style="display: none;">Please enter a valid number</small>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <p class="text-center text-muted mt-3">
                                    <small>
                                        Didn't receive the verification code? <a href="{{route('againSend')}}">Try
                                            again</a>
                                    </small>
                                </p>

                                <script>
                                    $(function () {

                                        $("#faild-code").modal();

                                        $('#check-sms-form').on('init.field.fv', function (e, data) {
                                            const $icon = data.element.data('fv.icon'),
                                                options = data.fv.getOptions(), // Entire options
                                                validators = data.fv.getOptions(data.field)
                                                    .validators; // The field validators

                                            if (validators.notEmpty && options.icon && options.icon.required) {
                                                $icon.addClass(options.icon.required).show();
                                            }
                                        }).formValidation({
                                            framework: 'bootstrap4',
                                            icon: {
                                                required: 'fal fa-asterisk',
                                                valid: 'fal fa-check',
                                                invalid: 'fal fa-times',
                                                validating: 'fal fa-refresh'
                                            },
                                            addOns: {
                                                mandatoryIcon: {
                                                    icon: 'fal fa-asterisk'
                                                }
                                            },
                                            fields: {
                                                'code': {
                                                    validators: {
                                                        stringLength: {
                                                            min: 4,
                                                            max: 4,
                                                            message: 'The verification code requires 4 digits.'
                                                        },
                                                        notEmpty: {
                                                            message: 'The verification code is required.'
                                                        }
                                                    }
                                                }
                                            }
                                        });

                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>

                @break

                @default
                <div class="modal fade" id="verify-sms-modal" tabindex="-1" role="dialog" href=""
                     aria-modal="true" style="padding-right: 17px; display: block;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">

                                <h5 class="modal-title">Confirm your phone number</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fal fa-times" aria-hidden="true"></i>
                                </button>

                            </div>

                            <div class="modal-body">

                                <form id="verify-sms-form" method="post" novalidate="novalidate"
                                      class="fv-form fv-form-bootstrap4" action="{{route('phone_code_send')}}">
                                    @csrf
                                    <button type="submit" class="fv-hidden-submit"
                                            style="display: none; width: 0px; height: 0px;"></button>

                                    <div class="row my-2">

                                        <div class="col-md-8 mx-auto">

                                            <section class="section section-flash mb-2-5 aos-init aos-animate"
                                                     data-aos="flip-up">
                                                @if (session('error'))
                                                    <div class="alert alert-danger" role="alert">
                                                        <i class="fal fa-exclamation-triangle"></i> This is not a valid
                                                        cellphone number: {{session('error')}}
                                                    </div>
                                                @endif

                                                <div class="alert alert-info" role="alert">
                                                    <i class="fal fa-info-circle"></i>
                                                    Please enter your cellphone number so we can send you an SMS with
                                                    your unique
                                                    verification code.
                                                </div>
                                            </section>
                                            <div class="form-group fv-has-feedback">
                                                <label class="form-control-label" for="number">Cellphone number</label>
                                                <div class="controls">
                                                    <div class="input-group">
                                                        <!-- <div class="input-group-prepend">
                                                            <span class="input-group-text">+1</span>
                                                        </div> -->
                                                        <input type="number" id="number" name="number"
                                                               class="form-control"
                                                               maxlength="20" placeholder="Enter your cellphone number"
                                                               value=""
                                                               data-fv-field="number">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary btn-block">Send
                                                                SMS
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <i class="fv-control-feedback fv-bootstrap-icon-input-group fal fa-asterisk"
                                                       data-fv-icon-for="number" style=""></i>
                                                </div>
                                                <small class="form-control-feedback" data-fv-validator="stringLength"
                                                       data-fv-for="number" data-fv-result="NOT_VALIDATED"
                                                       style="display: none;">The phone
                                                    requires 10 digits.</small><small class="form-control-feedback"
                                                                                      data-fv-validator="notEmpty"
                                                                                      data-fv-for="number"
                                                                                      data-fv-result="NOT_VALIDATED"
                                                                                      style="display: none;">The phone
                                                    number is required.</small><small
                                                    class="form-control-feedback" data-fv-validator="integer"
                                                    data-fv-for="number"
                                                    data-fv-result="NOT_VALIDATED" style="display: none;">Please enter a
                                                    valid
                                                    number</small>
                                            </div>


                                        </div>

                                    </div>

                                </form>

                                <script>
                                    $(function () {

                                        $('#verify-sms-modal').modal();
                                        $('#verify-sms-form').on('init.field.fv', function (e, data) {
                                            const $icon = data.element.data('fv.icon'),
                                                options = data.fv.getOptions(), // Entire options
                                                validators = data.fv.getOptions(data.field)
                                                    .validators; // The field validators

                                            if (validators.notEmpty && options.icon && options.icon.required) {
                                                $icon.addClass(options.icon.required).show();
                                            }
                                        }).formValidation({
                                            framework: 'bootstrap4',
                                            icon: {
                                                required: 'fal fa-asterisk',
                                                valid: 'fal fa-check',
                                                invalid: 'fal fa-times',
                                                validating: 'fal fa-refresh'
                                            },
                                            addOns: {
                                                mandatoryIcon: {
                                                    icon: 'fal fa-asterisk'
                                                }
                                            },
                                            fields: {
                                                'number': {
                                                    validators: {
                                                        stringLength: {
                                                            min: 6,
                                                            max: 20,
                                                            message: 'The phone requires 6-20 digits.'
                                                        },
                                                        notEmpty: {
                                                            message: 'The phone number is required.'
                                                        }
                                                    }
                                                }
                                            }
                                        });

                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>

            @endswitch

        @else--}}
            @if($mail_verify == 0)
                <div class="modal fade" id="mailing-address-form" tabindex="-1" role="dialog"
                     href="/buyer/modal/mailing-address" style="padding-right: 17px; display: none;" aria-modal="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">

                                <h5 class="modal-title">Email Verify</h5>

                                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fal fa-times" aria-hidden="true"></i>
                                </button>--}}

                            </div>

                            <div class="modal-body">

                                <form id="mailing-address-form" method="post" action="{{route('password.email')}}"
                                      novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                                    <button type="submit"
                                            class="fv-hidden-submit"
                                            style="display: none; width: 0px; height: 0px;"></button>
                                    @csrf
                                    <div class="form-group fv-has-feedback">
                                        <section class="section section-flash mb-2-5 aos-init aos-animate"
                                                 data-aos="flip-up">
                                            <div class="alert alert-info" role="alert">
                                                <i class="fal fa-info-circle"></i>
                                                You can set password using Email verify
                                            </div>
                                        </section>
                                        <label class="form-control-label" for="name">
                                            E-mail Address
                                        </label>
                                        <div class="controls">
                                            <input class="form-control" type="text" name="email" id="email"
                                                   maxlength="255"
                                                   placeholder="E-mail" value="{{Auth()->user()->email}}"
                                                   data-fv-field="name" readonly><i
                                                style="" class="fv-control-feedback fal fa-asterisk"
                                                data-fv-icon-for="name"></i>
                                        </div>
                                        <small style="display: none;" class="form-control-feedback"
                                               data-fv-validator="notEmpty"
                                               data-fv-for="name" data-fv-result="NOT_VALIDATED">The name is
                                            required.</small><small
                                            style="display: none;" class="form-control-feedback"
                                            data-fv-validator="stringLength"
                                            data-fv-for="name" data-fv-result="NOT_VALIDATED">The full name is too
                                            short.</small>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <button class="btn btn-primary btn-block" type="submit">
                                        Email Verify
                                    </button>

                                </form>

                            </div>

                            <script>
                                $(function () {

                                    $("#mailing-address-form").modal({
                                        escapeClose: false,
                                        clickClose: false,
                                        showClose: false,
                                        backdrop: 'static',
                                        keyboard: false,
                                    });

                                    $('#mailing-address-form').on('init.field.fv', function (e, data) {
                                        const $icon = data.element.data('fv.icon'),
                                            options = data.fv.getOptions(), // Entire options
                                            validators = data.fv.getOptions(data.field)
                                                .validators; // The field validators

                                        if (validators.notEmpty && options.icon && options.icon.required) {
                                            $icon.addClass(options.iczon.required).show();
                                        }
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
            @endif
        {{--@endif--}}



        @isset($category_id)
            <script type="text/javascript">
                $(function () {
                    cate_ids = [];
                    <?php foreach ($category_id as $key => $id): ?>
                    cate_ids.push(<?php echo $id ?>);
                    <?php endforeach ?>
                    console.log("rrrr", cate_ids)
                    $("#category-id").val(cate_ids);
                })
            </script>
        @endisset


        @isset($marketplace_id)
            <input type="hidden" id="marketplace_id" value="{{$marketplace_id}}">

            <script type="text/javascript">
                $(function () {
                    marketplace_id = $("#marketplace_id").val();
                    $("#marketplace-id").val(marketplace_id);
                })
            </script>

        @endisset


        @isset($sort)
            <input type="hidden" id="sort_val" value="{{$sort}}">
            <script type="text/javascript">
                $(function () {
                    sort_val = $("#sort_val").val();

                    $("#sort").val('');
                    $("#sort").val(sort_val);
                })
            </script>
        @endisset


        <script>

            function picSelect(pic_id, image_path) {
                $('.opacity-zero').removeClass('slick-current  slick-active');
                $(".opacity-zero" + pic_id).css("opacity", "1");
                $('.opacity-zero' + pic_id).addClass('slick-current  slick-active');
                main_image = `{{asset('public/images/` + image_path + `')}}`;
                $("#main_image").attr('src', main_image);
            }

            $(function () {

                //big


                $(".sort").click(function () {
                    sort_key = $(this).data('key');
                    console.log("sort_key", sort_key);
                    $("#sort").val(sort_key);
                })


                $(".fa-heart").on('click', function () {

                    camp_id = $(this).data('id');

                    if ($(this).hasClass('fas')) {
                        $(this).removeClass('fas');
                        $(this).removeClass('fal');
                        $(this).addClass('fal');
                        favo = 0;
                    } else {
                        $(this).removeClass('fas');
                        $(this).removeClass('fal');
                        $(this).addClass('fas');
                        favo = 1;
                    }

                    $.ajax({
                        url: "{{route('favo-set')}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            camp_id: camp_id,
                            favo: favo
                        },
                        type: "post",
                        dataType: "json",
                        success: function (result) {
                            console.log('dbset', result);
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    })
                })

                $(".deal-item").click(function () {
                    camp = $(this).data('camp');
                    $("#product_name").html("<label style='width:100%'>" + camp.product_name + "</label>");
                    per_data = Math.round((100 - camp.rebate_price / camp.price * 100) * 100) / 100;
                    $("#per_data").html(per_data);
                    $("#rebate_price").html(camp.price - camp.rebate_price);
                    $("#price").html(camp.price);
                    $("#save_price").html(camp.rebate_price);

                    $("#daily_count").html(camp.remaining_deals_for_the_day);
                    // $("#marketplace").html(camp..market_name);
                    $("#start_time").attr('title', 'Rebates released ' + camp.start_time);
                    $("#description").html(camp.description);

                    let url = "{{ route('buyer.buy_confirm', ':id') }}";
                    url = url.replace(':id', camp.id);

                    start_time = Date.parse(camp.start_date + ' ' + camp.start_time);
                    current_time = Date.parse(new Date());

                    if (start_time > current_time) {
                        $("#product_url").addClass('disabled');
                        btn_content = "Deals starts on " + camp.start_date + " at " + camp.start_time + " time. ";
                        console.log(btn_content);
                        $("#product_url").html(btn_content);

                    } else if (camp.remaining_deals_for_the_day <= 0) {
                        $("#product_url").addClass('disabled');
                        $("#product_url").html('Count Limit');
                    } else {
                        $("#product_url").attr('href', url);
                        $("#product_url").removeClass('disabled');
                        $("#product_url").html('Buy Product');
                    }

                    $("#favo_true").removeAttr('class').attr('class', 'text-danger fa-fw fa-heart  favo-' + camp.id);

                    $("#favo_true").attr('value', camp.id)

                    $("#favo_true").attr('data-id', camp.id);

                    $.ajax({
                        url: "{{route('favo-get')}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            camp_id: camp.id,
                        },
                        type: "post",
                        dataType: "json",
                        success: function (result) {
                            console.log("modal", result);
                            if (result == 1) {
                                $("#favo_true").addClass("fas");
                            } else {
                                $("#favo_true").addClass("fal");
                            }
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    })

                    image = $(this).data('image');
                    main_image = image[0].image_path;
                    main_image = `{{asset('public/images/` + main_image + `')}}`;


                    $("#main_image").attr('src', main_image);
                    $("#main_image").attr('alt', camp.product_name);

                    sub_images = "";
                    sub_images =
                        `<div class="slick-slide  slick-current slick-active opacity-zero opacity-zero0" data-slick-index="-5" aria-hidden="true" tabindex="-1" style="width: 60px;" onclick="picSelect(0,'` + image[0].image_path + `' )">
                <div><img src="{{asset('public/images/`;
            sub_images += image[0].image_path + `')}}" alt="` + camp.product_name +
                        `" style="width: 100%; display: inline-block;"></div></div>`;
                    console.log("sub_images", sub_images);

                    for ($i = 1; $i < image.length; $i++) {
                        sub_images +=
                            `<div class="slick-slide slick-cloned opacity-zero opacity-zero` + $i + `" data-slick-index="-5" aria-hidden="true" tabindex="-1" style="width: 60px;" onclick="picSelect(` + $i + `,'` + image[$i].image_path + `')"><div><img src="{{asset('public/images/`;
                sub_images += image[$i].image_path + `')}}" alt="` + camp.product_name +
                            `" style="width: 100%; display: inline-block;"></div></div>`;
                    }
                    $("#sub_images").html(sub_images);
                })

                $('#search-form').on('shown.bs.collapse', '.collapse', function () {
                    $(this).parents('form').find("[data-toggle=collapse] i").toggleClass("fa-plus fa-minus");
                }).on('hidden.bs.collapse', '.collapse', function () {
                    $(this).parents('form').find("[data-toggle=collapse] i").toggleClass("fa-minus fa-plus");
                }).find('#category-id').multiselect({
                    maxHeight: 300,
                    buttonWidth: '100%',
                    buttonClass: 'btn btn-category',
                    nonSelectedText: 'Select categories',
                    includeSelectAllOption: true,
                    selectAllText: 'Select all categories',
                    allSelectedText: 'All categories'
                });

                $('#deals').infiniteScroll({
                    path: '.next a',
                    append: '.page',
                    status: '.page-load-status'
                }).on('append.infiniteScroll', function () {
                    $('[data-toggle=tooltip]').tooltip();
                    Project.initLazyLoader();
                });


            });

        </script>
        <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a17677794ca7129"></script>

        <!-- Hotjar Tracking Code for www.influencerpulse.com -->


    </main>

@endsection
