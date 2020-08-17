@extends('backend.buyer.layouts.app')
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
        <li class="breadcrumb-item"><a href="{{route('buyer.msg')}}">Messages</a></li>
        <li class="breadcrumb-item active">Discussion about rebate #{{$order->id}} with {{$order->getCamp->user->name}}</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                Discussion about rebate #<b>{{$order->id}}</b> Free Item. Thanksgiving Gift to seniors. Britzg... with
                <b>{{$order->getCamp->user->name}}</b> </div>

            <div class="card-body">

                <div id="deal-68951" class="deal-container deal-single deal-rebate">

                    <div class="d-flex flex-column flex-xl-row mb-5">

                        <div class="deal-slider ml-md-3 mx-md-0 mx-auto">



                            <div
                                class="product-gallery col-12 col-md justify-content-center flex-column flex-md-row d-flex">
                                <div class="slider-nav d-md-block d-none slick-initialized slick-slider slick-vertical"
                                    style="visibility: visible;">
                                    <div class="arrow-up slick-arrow" style=""><i
                                            class="fas fa-chevron-up text-center"></i></div>
                                    <div class="slick-list draggable" style="height: 330px;">
                                        <div class="slick-track"
                                            style="opacity: 1; height: 1122px; ">


                                             @foreach($order->getCamp->pic as $key => $img)
                                            <div class="slick-slide slick-cloned pic-small{{$key}}"
                                                data-slick-index="{{$key}}" aria-hidden="true"
                                                style="width: 60px;" tabindex="-1">
                                                <div>
                                                    <img src="{{asset('public/images/'.$img->image_path)}}"
                                                        alt="{{$order->getCamp->product_name}}"
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
                                        <div class="slick-track" style="opacity: 1; width: 2280px;">
                                            @foreach($order->getCamp->pic as $key => $img)
                                            <div class="slick-slide  opacity-zero{{$key}} opacity-zero main-slide"
                                                data-slick-index="0" aria-hidden="false"
                                                style="width: 380px; position: relative; left: {{-380*$key}}px; top: 0px; z-index: 999; opacity: 0;">
                                                <div><img src="{{asset('public/images/'.$img->image_path)}}"
                                                        alt="{{$order->getCamp->product_name}}"
                                                        style="width: 100%; display: inline-block;"></div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="prod-description col pl-xl-3">

                            <div class="sold-by mb-1 small-text">
                                <small>Sold on <span class="text-primary">{{$order->getCamp->market->market_name}}</span> by <span
                                        class="text-primary">{{$order->getCamp->brand_name}}</span></small>
                            </div>
                            <h1 class="deal-title mb-3 roboto-medium">
                                {{$order->getCamp->product_name}} </h1>

                            <div class="d-flex align-items-center mb-1">
                                <div class="percent bg-danger text-white">
                                    Rebate: ₹{{round((1-$order->getCamp->rebate_price/$order->getCamp->price)*10000)/100}}%
                                </div>
                                <div class="d-flex align-items-center text-info font-weight-bold ml-3">
                                    <i class="sprite-icon-piggy-bank mr-1"></i>
                                    YOU SAVE ₹{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2-5">
                                <h5 class="old-price lato-medium mb-0 mr-0-5">
                                    <del>₹{{$order->getCamp->price}}</del>
                                </h5>
                                <h4 class="new-price text-green roboto-black mb-0">
                                    ₹<span>{{$order->getCamp->rebate_price}}</span>
                                </h4>
                            </div>
                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="callout callout-info mb-lg-0">
                                        <small class="text-muted">Rebate ID</small>
                                        <br>
                                        <strong class="h6">#{{$order->id}}</strong>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="callout mb-lg-0 callout-info">
                                        <small class="text-muted">Status</small>
                                        <br>
                                        <strong class="h6">
                                            {{$order->status}} </strong>
                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="callout callout-dark mb-lg-0">
                                        <small class="text-muted">
                                            Seller </small>
                                        <br>
                                        <strong class="h6">{{$order->getCamp->user->name}}</strong>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="callout callout-dark mb-lg-0">
                                        <small class="text-muted">Claim Date</small>
                                        <br>
                                        <strong class="h6">
                                            {{ date('j F, Y', strtotime($order->start_time)) }} </strong>
                                    </div>

                                </div>




                            </div>

                        </div>

                    </div>

                </div>

                <div class="alert alert-info mb-5">
                    <i class="fal fa-info-circle"></i>
                    Attention: if a seller pressures you to leave a review as a condition for rebate approval, please
                    contact our support. You are not obligated to leave any review after the purchase. A seller may not
                    pressure you to leave any review on any marketplace as a condition for rebate approval, its against
                    our TOS and its against TOS of all major marketplaces, including Amazon, Walmart, etc. You can leave
                    an unbiased product review only willingly and only if you wish to do so. </div>



                <ul class="timeline">

                    @foreach($msgs as $key=> $msg)

                    @if($msg->type == 0)
                    <li id="message-680515" class="clearfix">
                        <div class="timeline-badge" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="{{$msg->getOrder->getBuyer->name}}"  style=" text-transform: uppercase;">
                            <?php echo substr($msg->getOrder->getBuyer->name, 0, 1) ?>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                {{$msg->message}}
                            </div>
                            <div class="timeline-footer">
                                <small class="text-muted">
                                    <i class="fal fa-clock"></i>
                                    {{ date('F j, Y  h:m ', strtotime($msg->date)) }}
                                    @if($msg->file_path)
                                    <a href="" onclick="show_file('{{$msg->file_path}}')" title="{{$msg->file_title}}">
                                            <i class="fal fa-file-o"></i> Attachment
                                    </a>
                                    @endif
                                </small>
                            </div>
                        </div>
                    </li>
                    @else
                    <li id="message-675882" class="clearfix timeline-inverted">
                        <div class="timeline-badge" title="" data-placement="bottom" data-toggle="tooltip"
                            data-original-title="{{$msg->getOrder->getCamp->user->name}}"   style=" text-transform: uppercase;">
                            <?php echo substr($msg->getOrder->getCamp->user->name, 0, 1) ?> </div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                {{$msg->message}}
                            </div>
                            <div class="timeline-footer">
                                <small class="text-muted">
                                    <i class="fal fa-clock"></i>
                                    {{ date('F j, Y  h:m ', strtotime($msg->date)) }}
                                </small>
                                @if($msg->file_path)
                                <a href="" onclick="show_file_satya('{{$msg->file_path}}')" title="{{$msg->file_title}}">
                                        <i class="fal fa-file-o"></i> Attachment
                                </a>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach



                </ul>

                <div class="text-center mt-5">
                    <a data-e2e="btn-reply" id="btn-reply" class="btn btn-lg btn-primary" data-toggle="modal"
                        data-target="#generic-modal" style="color:white;"
                        >
                        Reply to {{$order->getCamp->user->name}} </a>

                </div>

            </div>

        </div>

        <!-- modal -->

        <div class="modal fade" id="generic-modal" tabindex="-1" role="dialog"
            style="padding-right: 17px; display: none;" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header align-items-center">

                        <h5 class="modal-title">Write a message to {{$order->getCamp->user->name}}</h5>

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

                            <input type="hidden" name="order_id" value="{{$order->id}}">
                            <input type="hidden" name="action" value="write">

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
                    <script type="text/javascript">
                        function show_file(url){
                            url="https://"+window.location.hostname+"/public/files/"+url;
                            var win=window.open(url, '_blank');
                        }
                        function show_file_satya(url){
                            url="https://"+window.location.hostname+"/"+url;
                            var win=window.open(url, '_blank');
                        }
                    </script>

                    <script>
                    $(function() {

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

    </div>
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

        RK.Deal.slider($('#deal-68951').find('.slider-main-img'));

    });
    </script>

</main>
@endsection

