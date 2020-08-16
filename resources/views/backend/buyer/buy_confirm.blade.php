@extends('backend.buyer.layouts.app')
@section('content')
<main class="main">
    @if (session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-danger" role="alert">
                <i class="fal fa-check"></i> {{ session('status') }}</div>
        </div>
    </section>
    @endisset
    <div class="container-fluid mt-2">

        <div class="card">

            <div class="card-body">

                <h1 class="text-center mb-3">Instructions</h1>

                <div class="row">

                    <div class="col-xl-7 col-uxxl-5 offset-uxxl-1">

                        <ul class="stepper stepper-vertical">

                            <li id="step-1" class="active">
                                <a href="#!" data-toggle="collapse" data-target="#step-content-1">
                                    <span class="circle">1</span>
                                    <span class="label text-left">
                                        Buy The Product <b>At Full Price</b> - <b>Do Not Use Discount Codes</b>
                                        Sold By <span class="text-primary">{{$camp->brand_name}}</span> </span>
                                </a>
                                <div id="step-content-1" class="step-content py-0 px-0-5  d-none d-lg-block">
                                    Click on “Buy Product” - you will be redirected to another website, where you can
                                    buy the product.
                                    All purchases happen outside of influencerpulse. You may be redirected to Amazon, Flipkart,
                                    Snapdeal or another eCommerce website.
                                    <b>Buy the product at full price. Products purchased with discount codes will NOT
                                        get a refund.</b>
                                </div>
                            </li>

                            <li id="step-2" class="active">
                                <a href="#!" data-toggle="collapse" data-target="#step-content-2">
                                    <span class="circle">2</span>
                                    <span class="label">Confirm Your Deal</span>
                                </a>
                                <div id="step-content-2" class="step-content py-0 px-0-5 d-none d-lg-block">
                                    You have <b>1 hour</b> to buy the product and report back with influencerpulse. Use Order
                                    ID  to confirm your purchase to the seller. <b>Don’t postpone!</b>
                                    If you don’t report the Order ID  within 1 hour, the purchase will not be
                                    registered.
                                </div>
                            </li>

                            <li id="step-3" class="active">
                                <a href="#!" data-toggle="collapse" data-target="#step-content-3">
                                    <span class="circle">3</span>
                                    <span class="label">Wait For Seller Approval</span>
                                </a>
                                <div id="step-content-3" class="step-content py-0 px-0-5  d-none d-lg-block">
                                    When the Order ID is provided, the Deal  is automatically pre-approved and on
                                    hold for 10 days.
                                    After that period, the seller has 5 days to approve or dispute it.
                                    The Deal  is automatically approved if the seller does nothing.
                                    After 10 days the money is credited to your account .
                                </div>
                            </li>

                        </ul>

                    </div>

                    <div class="col-xl-5 col-uxxl-3 offset-uxxl-2">

                        <div id="deal-59578" class="deal deal-container deal-item deal-rebate unclickable"
                            data-id="59578" data-type="rebate">
                            <div class="row mb-2">
                                <div class="col-7 pr-0"></div>

                                <div class="col-5 pl-0">
                                    <div class="deal-actions">
                                        <div class="favorite">
                                        @if($camp->favorite ==1)
                                        <i class="text-danger fa-fw fa-heart fas"></i>
                                        @else
                                        <i class="text-danger fa-fw fa-heart fal"></i>
                                        @endif
                                        </div>
                                        <div class="share">
                                            <i class="fal fa-share-alt fa-fw" data-toggle="collapse"
                                                data-target="#share-59578" aria-expanded="false"
                                                aria-controls="share-59578" role="button"></i>
                                            <div id="share-59578" class="collapse">
                                                <div class="addthis_share">
                                                    <i class="addthis_share_button d-block fab fa-facebook fa-fw"
                                                        data-service="facebook"
                                                        data-url=""
                                                        data-title="Bone and Oak Keto"></i>
                                                    <i class="addthis_share_button d-block mt-1 fab fa-twitter fa-fw"
                                                        data-service="twitter"
                                                        data-url=""
                                                        data-title="Bone and Oak Keto"></i>
                                                    <i class="addthis_share_button d-block mt-1 fab fa-pinterest fa-fw"
                                                        data-service="pinterest"
                                                        data-url=""
                                                        data-title="Bone and Oak Keto"></i>
                                                    <i class="addthis_share_button d-block mt-1 d-lg-none fab fa-whatsapp fa-fw"
                                                        data-service="whatsapp"
                                                        data-url=""
                                                        data-title="Bone and Oak Keto"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="release">
                                            <i class="fal fa-clock fa-fw" data-toggle="tooltip" title=""
                                                data-original-title="Rebates released @ 02:00 pm EST"></i>
                                        </div>
                                    </div>
                                </div>

                            </div><a href="" class="preview">



                                <figure class="embed-responsive embed-responsive-4by3 mb-0 lozad"
                                style="background-image : url('{{asset('public/images/'.$camp->pic[0]->image_path)}}')"
                                    data-loaded="true">
                                </figure>

                            </a>

                            <h3 class="title text-truncate">
                                <a href="">{{$camp->product_name}}</a>
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

                </div>

                <div class="row">

                    <div class="col-xl-4 col-uxxl-3 offset-uxxl-1">

                        <ul class="stepper stepper-vertical">

                            <li class="active warning">
                                <a href="#!">
                                    <span class="circle">!</span>
                                    <span class="label">One Account / Household</span>
                                </a>
                                <div class="step-content py-0 px-0-5">
                                    You are only allowed one account per address/household. You can not claim more than
                                    one Deal  for the same product. Please, stay away from cheating or fraud. It's not
                                    worth it!
                                </div>
                            </li>

                        </ul>

                    </div>

                    <div class="col-xl-4 col-uxxl-4">

                        <ul class="stepper stepper-vertical">

                            <li class="active warning">
                                <a href="#!">
                                    <span class="circle">!</span>
                                    <span class="label">15 Days Hold</span>
                                </a>
                                <div class="step-content py-0 px-0-5">
                                    Why 15 days? Most online
                                    stores allow return of the items within 10 days. To avoid situations when you are
                                    given a Deal plus you get a refund for a
                                    returned item, we have to hold the funds for 35 days.
                                    Also, the seller can dispute the Deal within the last 5 days.
                                </div>
                            </li>

                        </ul>

                    </div>

                    <div class="col-xl-4 col-uxxl-3">

                        <ul class="stepper stepper-vertical">

                            <li class="active warning">
                                <a href="#!">
                                    <span class="circle">!</span>
                                    <span class="label">You Shall Not Resell</span>
                                </a>
                                <div class="step-content py-0 px-0-5">
                                    Reselling the products acquired via influencerpulse is against our Terms of Service, and
                                    will result in cancelation of all the Deals and suspension of the buyer account.
                                </div>
                            </li>

                        </ul>

                    </div>

                </div>


                <form id="purchase-form" action="{{route('buyer.confirm_redirect')}}" novalidate="novalidate"  class="text-center fv-form fv-form-bootstrap4" method="post">
                    @csrf
                    <input type="hidden" id="to_market" value="{{$camp->product_url}}">
                    <input type="hidden" name="camp_id" value="{{$camp->id}}">
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <button type="submit" class="fv-hidden-submit"
                        style="display: none; width: 0px; height: 0px;"></button>

                    <div class="form-group my-3 mx-2 fv-has-feedback">

                        <div class="custom-control custom-checkbox pr-3 pt-0-5">
                            <input type="checkbox" name="terms"  id="terms" data-toggle="checkbox"
                                class="custom-control-input" data-fv-field="terms">
                                <i style="" class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="terms"></i>
                            <label class="custom-control-label" for="terms">
                                I have read all instructions and I accept
                                    <a href=""
                                    target="_blank" rel="nofollow">Terms and Conditions</a> of the service. </label>
                        </div>


                        <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                            data-fv-for="terms" data-fv-result="NOT_VALIDATED">Please confirm you read instructions and
                            accept Terms and Conditions.</small>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" name="action" id="confirm" value="buy" >
                        Go to Marketplace &amp; Buy Product </button>

                    <div class="text-muted d-lg-flex align-items-center justify-content-center mt-5">

                        <div>You'd like to buy the product later?</div>

                        <a class="btn btn-link btn-back" href="{{route('buyer.index')}}">
                            Go back to Deals </a>

                    </div>

                </form>
                <script>
                    $(document).ready(function(){
                        $("#confirm").on('click', function(e){
                            url=$("#to_market").val();
                            checked=$("#terms").is(':checked');
                            e.preventDefault();
                            if(checked == 1){

                                var win=window.open(url, '_blank');
                                $('#purchase-form').submit();
                            }else{
                                $(".form-control-feedback").css('display','block');
                                $(".form-control-feedback").css('color','red');
                                $(".custom-control-label").css('color','red');
                            }

                        })


                    })
                </script>



            </div>

        </div>

    </div>

</main>
@endsection
