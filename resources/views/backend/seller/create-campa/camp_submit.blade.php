@extends('backend.seller.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Campaign</a></li>
        <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Campaign
                #3682</a></li>
        <li class="breadcrumb-item active">Pictures</li>
    </ol>
    @isset ($msg)
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{ $msg }}</div>
        </div>
    </section>
    @endisset
        <div class="container-fluid">
    
            <ul class="stepper stepper-horizontal">

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'basics'))}}">
                <!-- <a href=""> -->
                    <span class="circle">1</span>
                    <span class="label">Basics</span>
                </a>
            </li>

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'pic'))}}">
                <!-- <a href=""> -->

                    <span class="circle">2</span>
                    <span class="label">Pictures</span>
                   
                </a>
            </li>

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'set'))}}" >
                <!-- <a href=""> -->

                    <span class="circle">3</span>
                    <span class="label">Settings</span>
                    
                </a>
            </li>

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'preview'))}}">
                <!-- <a href=""> -->

                    <span class="circle">4</span>
                    <span class="label">Preview</span>
                </a>
            </li>

            <li>
                <a href="{{route('camp-forms', array('camp_id' => $camp->id, 'page' => 'payment'))}}">
                <!-- <a href=""> -->
                    
                    <span class="circle">5</span>
                    <span class="label">Payment</span>
                </a>
            </li>

            <li class="active">
                <a href="#">
                    <span class="circle">6</span>
                    <span class="label">
                        Submission </span>
                </a>
            </li>


        </ul>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-badge-check"></i> Campaign Submission </div>

            <div class="card-body">

                <div class="alert alert-info text-left">
                    <i class="fal fa-exclamation-circle"></i>
                    Your Campaign is almost ready to be reviewed by our team. Read the
                    information below carefully before submitting your Campaign. Please note that all
                    Campaigns go through manual approval and can take up to 24 hours to go live. </div>

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
                                    <span class="label">Campaign Edition</span>
                                </a>
                                <div class="step-content p-1">
                                    If you detect a problem before or after our team approves your Campaign, you
                                    can still edit it and fix these errors. </div>
                            </li>

                            <li class="active warning">
                                <a href="#">
                                    <span class="circle"><i class="fal fa-percent"></i></span>
                                    <span class="label">High percentage OFF</span>
                                </a>
                                <div class="step-content p-1">
                                    Using a high percentage OFF for your Campaign could put your product inventory
                                    at risk. Please make sure to take corresponding measures to protect your
                                    inventory. </div>
                            </li>
                            @if($camp->private_status == 1)

                            <li>
                                <label class="sr-only" for="affiliate-url">Private URL</label>
                                <div class="controls controls-no-label" style="width:100%;">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text px-2">
                                                <i class="fal fa-link"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" type="text" readonly id="private-url"
                                            value="">

                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-dark clipboard px-2"
                                                data-clipboard-target="#affiliate-url">
                                                <i class="fal fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            @endif

                        </ul>

                    </div>

                    <div class="col-xl-5">

                        <div id="deal-3682" class="deal deal-container deal-item deal-campaign unclickable new"
                            data-id="3682" data-type="campaign">
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
                                    <span class="full-price strikethrough text-danger">₹{{ number_format($camp->price, 2, '.', ',') }}</span>
                                    <span class="price text-green">₹{{ number_format($camp->rebate_price, 2, '.', ',') }}</span>
                                </div>

                                <div class="col-5 d-flex align-items-center justify-content-end discount">
                                    <div class="percent bg-coupon">
                                        <span class="discount" style="color:">
                                        {{round(100-($camp->rebate_price)/($camp->price)*100)}}% OFF
                                        </span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            <form id="camp-submission-form" method="post" class="text-center" action="{{route('seller.camp-submit')}}">
                    @csrf
                    <input type="hidden" name="camp_id" id="camp_id" value="{{$camp->id}}">
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
                        Submit Campaign </button>

                </form>

              

                <script>
                $(function() {

                    new Clipboard('.clipboard').on('success', function(e) {
                        const $button = $(e.trigger);
                        $button.attr('title', 'Affiliate URL copied to clipboard').tooltip('show');
                        setTimeout(function() {
                            $button.tooltip('hide').tooltip('dispose');
                        }, 2000);
                    });


                    camp_id=$("#camp_id").val();
                    private_url=window.location.hostname+'/shop_site/buyer/buy_confirm/'+camp_id;
                    $("#private-url").val(private_url);


                    $('#camp-submission-form').formValidation({
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