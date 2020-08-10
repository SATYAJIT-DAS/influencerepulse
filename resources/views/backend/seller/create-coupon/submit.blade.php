@extends('backend.seller.layouts.app')
@section('content')

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

            <li>
                <a href="">
                    <span class="circle">4</span>
                    <span class="label">Preview</span>
                </a>
            </li>

            <li class="active">
                <a href="#" class="disabled">
                    <span class="circle">5</span>
                    <span class="label">
                        Submission </span>
                </a>
            </li>

        </ul>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-badge-check"></i> Coupon Submission </div>

            <div class="card-body">

                <div class="alert alert-info text-left">
                    <i class="fal fa-exclamation-circle"></i>
                    Your coupon is almost ready to be reviewed by our team. Read the
                    information below carefully before submitting your coupon. Please note that all
                    coupons go through manual approval and can take up to 24 hours to go live. </div>

                <div class="row align-items-center">

                    <div class="col-xl-7 mb-5 mb-xl-0">

                        <ul class="stepper stepper-vertical">

                            <li class="active disabled">
                                <a href="#">
                                    <span class="circle"><i class="fal fa-pencil"></i></span>
                                    <span class="label">Changes in Prices</span>
                                </a>
                                <div class="step-content p-1">
                                    If the price changes on the marketplace, you can edit at any moment. </div>
                            </li>

                            <li class="active disabled">
                                <a href="#">
                                    <span class="circle"><i class="fal fa-check"></i></span>
                                    <span class="label">Coupon Edition</span>
                                </a>
                                <div class="step-content p-1">
                                    If you detect a problem before or after our team approves your coupon, you
                                    can still edit it and fix these errors. </div>
                            </li>

                            <li class="active warning">
                                <a href="#">
                                    <span class="circle"><i class="fal fa-percent"></i></span>
                                    <span class="label">High percentage OFF</span>
                                </a>
                                <div class="step-content p-1">
                                    Using a high percentage OFF for your coupon could put your product inventory
                                    at risk. Please make sure to take corresponding measures to protect your
                                    inventory. </div>
                            </li>

                        </ul>

                    </div>

                    <div class="col-xl-5">

                        <div id="deal-3682" class="deal deal-container deal-item deal-coupon unclickable new"
                            data-id="3682" data-type="coupon">
                            <div class="row mb-2">

                                <div class="col-7 pr-0"><span class="badge badge-remaining">Last day</span></div>

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
                                <a href="">{{$coupon->product_name}}</a>
                            </h3>

                            <div class="line"></div>

                            <div class="row">

                                <div class="col-7 d-flex align-items-center">
                                    <span class="full-price strikethrough text-danger">₹{{ number_format($coupon->price, 2, '.', ',') }}</span>
                                    <span class="price text-green">₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}</span>
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

            <form id="coupon-submission-form" method="post" class="text-center" action="{{route('seller.coupon-submit')}}">
                    @csrf
                    <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                    <div class="form-group">
                        <div class="pt-0-5 px-3 px-lg-0 mt-3">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="terms" value="1" />
                                I have read previous information and I accept <a
                                    href="" target="_blank">Terms and
                                    Conditions</a> of the service. </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg mt-3">
                        Submit Coupon </button>

                </form>

                <script>
                $(function() {

                    $('#coupon-submission-form').formValidation({
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
                            'terms': {
                                validators: {
                                    notEmpty: {
                                        message: 'Please confirm you read information and accept Terms and Conditions.'
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

</main>


@endsection