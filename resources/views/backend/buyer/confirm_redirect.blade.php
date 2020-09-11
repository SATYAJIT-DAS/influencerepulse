@extends('backend.buyer.layouts.app')
@section('content')
<style>
.opacity-zero {
    opacity: 0;
}

.opacity-one {
    opacity: 1;
}

.msg-btn{
    color:black !important;
}
</style>

<main class="main">
    <section class="section section-flash" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-info" role="alert">
                <i class="fal fa-info-circle"></i> You already claimed that deal. Please provide your order number.</div>
        </div>
    </section>

    <div class="container-fluid mt-2">


        <div id="activity-section" class="row d-lg-flex collapse">

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-primary border-primary text-uppercase p-1 p-xl-2">
                        <b>Purchases</b>
                    </div>
                    <div
                        class="card-body d-flex flex-row flex-xl-column align-items-center justify-content-center p-1 p-xl-2">
                        <h3 class="mb-0 mb-xl-1">
                            <a href="{{route('buyer.purchases')}}">{{$purcha_count}}</a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold ml-1 ml-xl-0">
                            Unclaimed Purchases </small>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-light border-light text-uppercase p-1 p-xl-2">
                        <b>Next Payout</b>
                    </div>
                    <div
                        class="card-body d-flex flex-row flex-xl-column align-items-center justify-content-center p-1 p-xl-2">
                        <h3 class="mb-0 mb-xl-1">
                            <a href="{{route('buyer.wallet')}}">
                                <i class="fal fa-times text-muted"></i>
                            </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold ml-1 ml-xl-0">
                            No payout coming </small>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-danger border-danger text-uppercase p-1 p-xl-2">
                        <b>Disputes</b>
                    </div>
                    <div
                        class="card-body d-flex flex-row flex-xl-column align-items-center justify-content-center p-1 p-xl-2">
                        <h3 class="mb-0 mb-xl-1">
                            <a href="{{route('buyer.purchases')}}">
                                {{$dispute_count}} </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold ml-1 ml-xl-0">
                            Unresolved Disputes </small>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xxl-3">

                <div class="card text-center">
                    <div class="card-header bg-warning border-warning text-uppercase p-1 p-xl-2">
                        <b>Messages</b>
                    </div>
                    <div
                        class="card-body d-flex flex-row flex-xl-column align-items-center justify-content-center p-1 p-xl-2">
                        <h3 class="mb-0 mb-xl-1">
                            <a href="{{route('buyer.msg')}}">
                                {{count($msg_count)}} </a>
                        </h3>
                        <small class="text-muted text-uppercase font-weight-bold ml-1 ml-xl-0">
                            Unread messages </small>
                    </div>
                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-shopping-cart"></i> Latest Purchases </div>

            <div class="card-body">

                <div class="table-responsive-xl">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Picture</th>
                                <th>Product</th>
                                <th>Pricing</th>
                                <th>Payout</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $key => $order)

                            <tr>
                                <td>{{$order->id}}</td>
                                <td>
                                    <a href="{{$order->getCamp->product_url}}" target="_blank">
                                        <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}"
                                            class="deal-img" alt="{{$order->getCamp->product_name}}">
                                    </a>
                                </td>
                                <td style="width: 30%;">
                                    <a href="{{$order->getCamp->product_url}}" target="_blank">
                                        {{$order->getCamp->product_name}}</a>
                                </td>
                                <td>
                                    <small class="text-danger strikethrough">₹{{$order->getCamp->price}}</small>
                                    <span class="text-success">₹{{$order->getCamp->rebate_price}}</span><br />
                                    <small>80% OFF</small>
                                </td>
                                <td>₹{{$order->getCamp->price-$order->getCamp->rebate_price}}</td>
                                <td>

                                    <small>
                                        <i class="fal fa-clock"></i>
                                        @if(3600-strtotime($current)+strtotime($order->start_time) <= 0)
                                        <span class="text-danger">Expired</span><br>
                                        @else
                                        <span class="text-info">{{$order->status}}</span><br>
                                            <?php
                                                $second=3599-strtotime($current)+strtotime($order->start_time);
                                                echo date('H:i:s',$second);
                                                ?> left
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    <a href="{{route('buyer.again_confirm', $order->id)}}" class="btn btn-danger btn-block" style="color:white;"
                                        data-modal-size="modal-xl">
                                        Confirm Purchase </a>
                                    <a class="btn btn-success btn-block" target="_blank"
                                        href="{{$order->getCamp->product_url}}">
                                        Buy Product </a>
                                    <form method="post" action="{{route('buyer.order_cancel')}}" class="mt-1">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$order->id}}" />
                                        <input type="hidden" name="action" value="cancel">

                                        <button class="btn btn-dark btn-block" type="submit">
                                            Cancel Purchase </button>

                                    </form>
                                    <div class="dropdown mt-1">
                                        <button class="btn btn-primary btn-block w-100 dropdown-toggle" type="button"
                                            id="menu-plus-1534392" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            More... </button>
                                        <div class="dropdown-menu" aria-labelledby="menu-plus-1534392">
                                            <a class="dropdown-item msg-btn" data-toggle="modal" data-target="#msg-modal"
                                                data-id="{{$order->id}}" data-to="{{$order->getCamp->user->name}}" >
                                                Message Seller </a>
                                            <a class="dropdown-item"
                                                href="{{route('buyer.discussion',$order->id)}}">
                                                View Discussion </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

    </div>

    @empty($activety)

    <input type="hidden" id="btn-process" data-modal-size="modal-xl" data-toggle="modal" data-target="#generic-modal">



    <div class="modal fade show loaded" id="generic-modal" tabindex="-1" role="dialog"
        style="padding-right: 17px; display: block;" aria-modal="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header align-items-center">

                    <h5 class="modal-title">Confirm Your Purchase</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>

                </div>

                <div class="modal-body">

                    <div class="row align-items-center">

                        <div class="col-xl-6">

                            <div class="my-3 text-center">
                                <div id="report-clock" class="countdown flip-clock-wrapper"><span
                                        class="flip-clock-divider minutes"><span
                                            class="flip-clock-label">Minutes</span><span
                                            class="flip-clock-dot top"></span><span
                                            class="flip-clock-dot bottom"></span></span>
                                    <ul class="flip ">
                                        <li class="flip-clock-before"><a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">4</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">4</div>
                                                </div>
                                            </a></li>
                                        <li class="flip-clock-active"><a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">5</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">5</div>
                                                </div>
                                            </a></li>
                                    </ul>
                                    <ul class="flip ">
                                        <li class="flip-clock-before"><a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">8</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">8</div>
                                                </div>
                                            </a></li>
                                        <li class="flip-clock-active"><a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">9</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">9</div>
                                                </div>
                                            </a></li>
                                    </ul><span class="flip-clock-divider seconds"><span
                                            class="flip-clock-label">Seconds</span><span
                                            class="flip-clock-dot top"></span><span
                                            class="flip-clock-dot bottom"></span></span>
                                    <ul class="flip play">
                                        <li class="flip-clock-before"><a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">2</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">2</div>
                                                </div>
                                            </a></li>
                                        <li class="flip-clock-active"><a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">1</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">1</div>
                                                </div>
                                            </a></li>
                                    </ul>
                                    <ul class="flip play">
                                        <li class="flip-clock-before"><a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">9</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">9</div>
                                                </div>
                                            </a></li>
                                        <li class="flip-clock-active"><a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">8</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">8</div>
                                                </div>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="alert alert-warning">
                                <i class="fal fa-exclamation-circle"></i>
                                Providing a fake or non-existent order ID could result in banning of your account.
                            </div>

                            {{--<div class="alert alert-danger">
                                <i class="fal fa-exclamation-circle"></i>
                                Reselling any items you bought through RebateKey will result in suspension of your
                                account and rebate checks. </div>--}}

                            <form id="report-key-form" method="post" action="{{route('buyer.order_purchase')}}"
                                novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                                @csrf
                                <input type="hidden" name="action" value="pending">
                                <button type="submit" class="fv-hidden-submit"
                                    style="display: none; width: 0px; height: 0px;"></button>

                                <input type="hidden" name="camp_id" value="{{$camp->id}}">
                                <input type="hidden" name="order_id" value="{{$new_order->id}}">

                                <div class="form-group fv-has-feedback">
                                    <label class="form-control-label" for="key-reported">Order ID</label>
                                    <div class="controls">
                                        <input class="form-control" type="text" id="key-reported" name="key_reported"
                                            maxlength="100" value=""
                                            placeholder="Enter the order ID generated by the merchant"
                                            data-fv-field="key_reported">
                                     
                                        <i style="" class="fv-control-feedback fal fa-asterisk"
                                            data-fv-icon-for="key_reported">
                                        </i>
                                    </div>
                                    <small style="display: none;" class="form-control-feedback"
                                        data-fv-validator="notEmpty" data-fv-for="key_reported"
                                        data-fv-result="NOT_VALIDATED">The rebate key is required.</small><small
                                        style="display: none;" class="form-control-feedback" data-fv-validator="regexp"
                                        data-fv-for="key_reported" data-fv-result="NOT_VALIDATED">The Amazon order ID is
                                        invalid.</small><small style="display: none;" class="form-control-feedback"
                                        data-fv-validator="stringLength" data-fv-for="key_reported"
                                        data-fv-result="NOT_VALIDATED">Please enter a value with valid length</small>
                                </div>

                                <button class="btn btn-danger btn-lg btn-block" type="submit">
                                    Confirm Purchase </button>

                            </form>

                            <form class="mt-3" method="post" action="{{route('buyer.order_cancel')}}"
                                novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                                @csrf

                                <input type="hidden" name="order_id" value="{{$new_order->id}}">
                                <input type="hidden" name="action" value="cancel">

                                <button class="btn btn-link btn-block" type="submit">
                                    <small>I didn't buy the product</small>
                                </button>

                            </form>

                        </div>

                        <div class="col-xl-6">

                            <div id="deal-66043" class="deal-container deal-single deal-rebate">

                                <div class="deal-slider ml-md-3 mx-md-0 mx-auto">



                                    <div
                                        class="product-gallery col-12 col-md justify-content-center flex-column flex-md-row d-flex">
                                        <div class="slider-nav d-md-block d-none slick-initialized slick-slider slick-vertical"
                                            style="visibility: visible;">
                                            <div class="arrow-up slick-arrow" style=""><i
                                                    class="fas fa-chevron-up text-center"></i></div>
                                            <div class="slick-list draggable" style="height: 330px;">
                                                <div class="slick-track" style="opacity: 1; height: 1254px; ">


                                                    @foreach($camp->pic as $key => $img)
                                                    <div class="slick-slide slick-cloned pic-small{{$key}}"
                                                        data-slick-index="{{$key}}" aria-hidden="true"
                                                        style="width: 60px;" tabindex="-1">
                                                        <div>
                                                            <img src="{{asset('public/images/'.$img->image_path)}}"
                                                                alt="{{$camp->product_name}}"
                                                                style="width: 100%; display: inline-block;">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="arrow-down slick-arrow" style=""><i
                                                    class="fas fa-chevron-down text-center"></i></div>
                                        </div>
                                        <div class="slider-main-img slick-initialized slick-slider"
                                            style="visibility: visible;">
                                            <div class="slick-list draggable">
                                                <div class="slick-track" style="opacity: 1; width: 2660px;">
                                                    @foreach($camp->pic as $key => $img)
                                                    <div class="slick-slide  opacity-zero{{$key}} opacity-zero main-slide"
                                                        data-slick-index="0" aria-hidden="false"
                                                        style="width: 380px; position: relative; left: {{-380*$key}}px; top: 0px; z-index: 999; opacity: 0;">
                                                        <div><img src="{{asset('public/images/'.$img->image_path)}}"
                                                                alt="{{$camp->product_name}}"
                                                                style="width: 100%; display: inline-block;"></div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <input type="hidden" id="left_time" value="{{$left_time}}">
                    <input type="hidden" id="market_amazon" value="{{$camp->marketplace}}">

                </div>
                <script>
                $(function() {

                    $("#btn-process").trigger('click');

                });
                </script>

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

                <script>
                $(function() {

                    market_amazon=$("#market_amazon").val();
                    if(market_amazon == 1){
                        $('#report-key-form').formValidation({
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
                                'key_reported': {
                                    validators: {
                                        notEmpty: {
                                            message: 'The rebate key is required.'
                                        }
                                    }
                                }
                            }
                        });
                    }else{
                        $('#report-key-form').formValidation({
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
                                'key_reported': {
                                    validators: {
                                        notEmpty: {
                                            message: 'The order key is required.'
                                        }
                                    }
                                }
                            }
                        });
                    }



                    left_time=$("#left_time").val();

                    $('#report-clock').FlipClock(left_time, {
                        clockFace: 'MinuteCounter',
                        countdown: true
                    });

                    $('[data-inputmask-regex]').inputmask();

                });
                </script>
            </div>
        </div>
    </div>

    @endempty

    <div class="modal fade" id="msg-modal" tabindex="-1" role="dialog"
        style="padding-right: 17px; display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header align-items-center">

                    <h5 class="modal-title">Write a message to <b id="modal_title"></b></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>

                </div>

                <div class="modal-body">

                    <form id="write-message-form" method="post" action="{{route('buyer.msg_store')}}"
                        enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                        @csrf
                        <button
                            type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

                        <input type="hidden" name="order_id" id="order_id" value="">
                        <input type="hidden" name="action" id="action" value="write">

                        <div class="form-group fv-has-feedback">
                            <label for="message" class="form-control-label">Message</label>
                            <div class="controls">
                                <textarea data-e2e="message" name="message" id="message" class="form-control md-textarea"
                                    autofocus="" data-fv-field="message">

                                    </textarea>
                                    <i style=""
                                    class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="message"></i>
                            </div>
                            <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                data-fv-for="message" data-fv-result="NOT_VALIDATED">The message is required.</small>
                        </div>

                        <div class="row align-items-center mb-4">

                            <div class="col-6">
                                You can attach a file to your message. Images and PDF files are allowed. Maximum size 20MB.
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <label class="sr-only" for="attachment">Attach a file</label>
                                    <input type="file" class="form-control-file w-100" id="attachment" name="attachment">
                                </div>

                            </div>

                        </div>

                        <button data-e2e="send-message" class="btn btn-primary btn-block btn-lg" type="submit">
                            Send Message </button>

                    </form>

                </div>

                <script>
                $(function() {
                    $(".msg-btn").click(function(){
                        order_id=$(this).data('id');
                        to=$(this).data('to');
                        console.log("sadf",order_id,to)
                        $("#modal_title").html(to);
                        $("#order_id").val(order_id);
                    })

                    $('#write-message-form').on('init.field.fv', function(e, data) {
                        const $icon = data.element.data('fv.icon'),
                            options = data.fv.getOptions(), // Entire options
                            validators = data.fv.getOptions(data.field).validators; // The field validators

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
                            'message': {
                                validators: {
                                    notEmpty: {
                                        message: 'The message is required.'
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
