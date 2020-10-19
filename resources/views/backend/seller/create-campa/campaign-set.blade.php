@extends('backend.seller.layouts.app')
@section('content')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> -->
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('seller.campaigns')}}">Campaigns</a></li>
        <li class="breadcrumb-item"><a href="{{route('seller.campaigns')}}">Campaign
                #{{$camp->id}}</a></li>
        <li class="breadcrumb-item active">Settings</li>
    </ol>
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

            <li class="active">
                <a href="#" class="disabled">
                    <span class="circle">3</span>
                    <span class="label">Settings</span>
                </a>
            </li>

            <li>
                <a href="#" class="disabled">
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

        <form id="create-campaign-form" method="post" action="{{route('campaign-set')}}">
            @csrf
            <input type="hidden" name="camp_id" value="{{$camp->id}}">
            <div class="card">

                <div class="card-header">
                    <i class="fal fa-cogs"></i> Campaign Settings </div>

                <div class="card-body">

                    <div class="alert alert-info">
                        <i class="fal fa-info-circle"></i>
                        The daily amount of deals distributed is reset at your scheduled start time as well as the daily charges made to your credit card or wallet balance. 
                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="price">
                                            Price <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="The full price of your product without any discounts"></i>
                                        </label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">₹</span>
                                                </div>
                                                <input class="form-control" id="price" name="price" type="number"
                                                    min="0" step="0.01" placeholder="Price" value="{{$camp->price}}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="discounted-price">
                                            Price offer <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="The price you will be offering your product for on this website"></i>
                                        </label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">₹</span>
                                                </div>
                                                <input class="form-control" id="discounted-price" name="rebate_price"
                                                    type="number" min="0" step="0.01" placeholder="Price"
                                                    value="{{$camp->rebate_price}}">
                                            </div>

                                            <div class="d-block text-right text-muted">
                                                <button type="button" class="btn btn-link btn-percent-off p-0">
                                                    <small>Set to % OFF <i class="fal fa-question-circle"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="This tool can help you calculate the discounted price."></i></small>
                                                </button>
                                                <div class="popover-content none">
                                                    <div class="form-group m-0">
                                                        <label class="sr-only form-control-label" for="percent">
                                                            Set to % OFF <i class="fal fa-question-circle"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="This tool can help you calculate the discounted price."></i>
                                                        </label>
                                                        <div class="controls">
                                                            <select name="percent" id="percent" class="form-control">
                                                                <option value="">% OFF</option>
                                                                <?php 
                                                                for ($i=1; $i < 101; $i++) { 
                                                                    echo "<option value=".$i.">".$i."</option>";
                                                                }
                                                               ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-5">
                            <small class="text-muted">
                                <i>
                                    The offer price must match the full listing price without any
                                    discount/promotion. <b>Any campaign that doesn't follow the requirements
                                        will be declined.</b>
                                </i>
                            </small>
                        </div>

                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="start-date">Start date <i
                                                class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="When will this deals become available?"></i></label>
                                        <div class="controls">
                                            @if($camp->start_date)
                                            <input placeholder="Start date" type="text" value="{{$camp->start_date}}"
                                                class="form-control" data-toggle="datepicker" id="start-date"
                                                name="start_date">
                                            @else
                                            <input placeholder="Start date" type="text" value="{{$camp->start_date}}"
                                                class="form-control" data-toggle="datepicker" id="start-date"
                                                name="start_date">
                                            @endif

                                                
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="start-time">Start time</label>
                                        <div class="controls">
                                            <input placeholder="Start time" type="text" value="{{$camp->start_time}}"
                                                class="form-control" data-toggle="timepicker" id="start-time"
                                                name="start_time">
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-5">
                            <small class="text-muted">
                                <i>
                                    You are currently using the timezone <span
                                        class="font-weight-bold">ASIA/INDIA</span>. You can edit the
                                    timezone in <a href="{{route('seller.profile')}}" target="_blank">your
                                        profile</a>. <b>
                                        The daily amount of deals distributed is reset every day at your
                                        scheduled start time. </b>
                                </i>
                            </small>
                        </div>

                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="max-intents-daily">
                                            Daily deals <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Daily number of people that can claim this deals."></i>
                                        </label>
                                        <div class="controls">
                                            <input class="form-control" id="max-intents-daily" name="max_intents_daily"
                                                type="number" min="1" step="1" value="{{$camp->daily_rebates}}">
                                        </div>
                                    </div>

                                </div>

                                <!--<div class="col-xl-4">-->

                                <!--    <label>-->
                                <!--        Running strategy <i class="fal fa-question-circle" data-toggle="tooltip"-->
                                <!--            data-placement="top"-->
                                <!--            title="By default, the campaign will not have a limit of deals offered. You can pause it at any moment."></i>-->
                                <!--    </label>-->

                                <!--    <div class="form-group mt-1">-->
                                <!--        <div class="custom-control custom-checkbox">-->

                                <!--            @if($camp->total_rebates)-->
                                <!--            <input type="checkbox" class="custom-control-input" data-toggle="checkbox"-->
                                <!--                value="0" name="indefinite" id="indefinite">-->
                                <!--            @else-->
                                <!--            <input type="checkbox" class="custom-control-input" data-toggle="checkbox"-->
                                <!--                value="1" name="indefinite" id="indefinite" checked="checked">-->
                                <!--            @endif-->
                                <!--            <label class="custom-control-label" for="indefinite">-->
                                <!--                Unlimited deals </label>-->
                                <!--        </div>-->
                                <!--    </div>-->

                                <!--</div>-->

                                <div class="col-xl-6 " id="total_rebates_show">

                                    <div class="form-group">
                                        <label class="form-control-label" for="max-intents-total">
                                            Total Deals <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="The campaign will be completed once the total limit is reached."></i>
                                        </label>
                                        <div class="controls">
                                            <input class="form-control" id="max-intents-total" name="max_intents_total"
                                                type="number" step="1" value="{{$camp->total_rebates}}">
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="form-group">
                                <label class="form-control-label" for="product-url">
                                    Product URL <i class="fal fa-question-circle" data-toggle="tooltip"
                                        data-placement="top" title="The URL of your Product Listing"></i>
                                </label>
                                <!--https://www.amazon.in/s?url=search-alias%3Daps&field-keywords=B082HZQXHF&field-brand=VITAL%20ORGANICS -->
                                @if($camp->marketplace == 1 && !is_null($camp->amazon_id) && !is_null($camp->brand_name) )
                                <div class="controls">
                                    <input class="form-control" id="product-url" name="product_url"
                                        value="{{'https://www.amazon.in/s?url=search-alias%3Daps&field-keywords='.$camp->amazon_id.'&field-brand='.urlencode($camp->brand_name)}}" placeholder="Product URL">
                                </div>
                                @else
                                <div class="controls">
                                    <input class="form-control" id="product-url" name="product_url"
                                        value="{{$camp->product_url}}" placeholder="Product URL">
                                </div>
                                @endif
                            </div>

                        </div>

                        <div class="col-xl-5">
                            <p class="text-muted">
                                <small>
                                    <i>
                                        Please check your URL leads to your deal product to avoid confusing
                                        buyers. </i>
                                </small>
                            </p>
                        </div>

                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="row">

                                <div class="col-xl-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="keyword1">Keyword 1</label>
                                        <div class="controls keyword-twitter-typeahead">
                                            <input class="form-control form-control-autocomplete-keyword" id="keyword1"
                                                name="keyword1" maxlength="255" value="{{$camp->keyword1}}"
                                                placeholder="1st keyword to target">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="keyword2">Keyword 2</label>
                                        <div class="controls keyword-twitter-typeahead">
                                            <input class="form-control form-control-autocomplete-keyword" id="keyword2"
                                                name="keyword2" maxlength="255" value="{{$camp->keyword2}}"
                                                placeholder="2nd keyword to target">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="keyword3">Keyword 3</label>
                                        <div class="controls keyword-twitter-typeahead">
                                            <input class="form-control form-control-autocomplete-keyword" id="keyword3"
                                                name="keyword3" maxlength="255" value="{{$camp->keyword3}}"
                                                placeholder="3rd keyword to target">
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-5">
                            <p class="text-muted">
                                <small>
                                    <i>
                                        Please fill in one or more target keywords. These keywords will help
                                        buyers find your products easily when searching on InfluencerPulse, in our new
                                        chrome extension or on the marketplace of your choice. </i>
                                </small>
                            </p>
                        </div>

                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    @if($camp->private_status == 1)
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="1" id="private" checked>
                                    <input type="hidden" class="custom-control-input hide" 
                                        value="1" name="private_status" id="pri_value">
                                    @else
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="0" name="private_status" id="private">
                                    <input type="hidden" class="custom-control-input hide" 
                                        value="0" name="private_status" id="pri_value"> 
                                    @endif
                                    <label class="custom-control-label" for="private">
                                        Private campaign<br>
                                        <small>
                                            By selecting the Private campaign option, <b>only the people you
                                                share your
                                                URL with will be able to view this
                                                deal</b>. It will not be shown anywhere on the InfluencerPulse
                                            platform (including product listings). </small>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-5">
                            <p class="text-muted">
                                <small>
                                    <i>
                                        You can use this option if you want to drive specific traffic to your
                                        campaign from Facebook or Google Ads. </i>
                                </small>
                            </p>
                        </div>

                    </div>


                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    @if($camp->free_status ==1)
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="1" checked name="free_status" id="free-shipping">
                                    <input type="hidden" value="1" name="free_status" id="free">
                                    @else
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="0" name="free_status" id="free-shipping">
                                    <input type="hidden" value="0" name="free_status" id="free">
                                    @endif
                                    <label class="custom-control-label" for="free-shipping">
                                        Free shipping </label>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-5">
                            <p class="text-muted">
                                <small>
                                    <i>
                                        Do you offer free shipping on your product? </i>
                                </small>
                            </p>
                        </div>

                    </div>

                </div>

                <div class="card-footer text-right">

                    <button class="btn btn-primary" type="submit" id="continue-action">
                        <i class="fal fa-arrow-right"></i> Continue </button>
                </div>

            </div>

        </form>

    </div>

    @isset($camp->price)
    <script type="text/javascript">
        function edit_action(){
            old_camp_price=<?php echo $camp->price; ?>;
            new_camp_price=$("#price").val();

            old_off_price=<?php echo $camp->rebate_price; ?>;
            new_off_price=$("#discounted-price").val();

            old_daily_count=<?php echo $camp->daily_rebates; ?>;
            new_daily_count=$("#max-intents-daily").val();
            console.log("init")
            if((old_camp_price == new_camp_price)&&(old_off_price == new_off_price)&&(old_daily_count == new_daily_count)){
                console.log("asdf");
                $("#continue-action").attr('disabled','disabled');
            }


        }
        $(function(){
            edit_action();
            $("#price").keyup(function(){
                edit_action();
            })   
            $("#discounted-price").keyup(function(){
                edit_action();
            })   
            $("#max-intents-daily").keyup(function(){
                edit_action();
            })          
        })
    </script>
    @endif

    <script>
    $(document).ready(function() {

        // $indefinite = $("#indefinite").val();
        // if ($indefinite == 0) {
        //     $("#total_rebates_show").removeClass('none');
        // }

        $("#private").on('change',function(){
            if($("#private").is(":checked")){
                $("#pri_value").val(1);
            }else{
                $("#pri_value").val(0);
            }
        })

        $("#free-shipping").on('change',function(){
            if($(this).is(":checked")){
                $("#free").val(1);
            }else{
                $("#free").val(0);
            }
        })
    })
    </script>

    <script>
    $(function() {
        document.getElementById("start-time").defaultValue = "12:00 AM";
        


        // now date set
        now_date = new Date().toUTCString().slice(5, 16);
        $("#start-date").val(now_date);
        // now date set end


        const $form = $('#create-campaign-form');
        $form.on('init.field.fv', function(e, data) {
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
                'product_url': {
                    validators: {
                        notEmpty: {
                            message: 'The product URL is required.'
                        },
                        uri: {
                            message: 'The product URL is invalid.'
                        }
                    }
                },
                'price': {
                    validators: {
                        notEmpty: {
                            message: 'The price is required.'
                        },
                        greaterThan: {
                            min: 0,
                            inclusive: false,
                            message: 'The price should be greater than 0.'
                        }
                    }
                },
                'discounted_price': {
                    validators: {
                        notEmpty: {
                            message: 'The discounted price is required.'
                        },
                        lessThan: {
                            value: function(value, validator, $field) {
                                return $("input[name='price']").val();
                            },
                            message: 'The discounted price should be lower than the full price.'
                        }
                    }
                },
                'start_date': {
                    validators: {
                        notEmpty: {
                            message: 'The start date is required.'
                        }
                    }
                },
                'start_time': {
                    validators: {
                        notEmpty: {
                            message: 'The start time is required.'
                        }
                    }
                },
                'max_intents_daily': {
                    validators: {
                        notEmpty: {
                            message: 'The number of keys per day is required.'
                        }
                    }
                },
                'max_intents_total': {
                    enabled: 0,
                    validators: {
                        notEmpty: {
                            message: 'The number of total keys is required.'
                        },
                        greaterThan: {
                            value: function(value, validator, $field) {
                                return $("input[name='max_intents_daily']").val();
                            },
                            message: 'The number of total keys should be higher or equal to the number of daily keys.'
                        }
                    }
                },
                'keyword1': {
                    validators: {
                        notEmpty: {
                            message: 'At least one keyword is required.'
                        }
                    }
                }
            }
        }).on('click', 'input[name=indefinite]', function() {
            const indefinite = $(this).is(':checked');
            const fv = $form.data('formValidation');
            fv.enableFieldValidators('max_intents_total', indefinite ? 1 : 0);
            const $col = $form.find('input[name=max_intents_total]').parents('.col-xl-4');
            if (!indefinite) {
                $col.removeClass('none');
            } else {
                $col.addClass('none');
            }
        }).on('change', 'select[name=percent]', function() {
            const price = $('input[name=price]').val();
            const percent = $(this).val();
            const discountedPrice = price - (percent * price / 100);
            $('#discounted-price').val(discountedPrice.toFixed(2));
            $(this).parents('.popover').popover('hide');
        }).find('.btn-percent-off').each(function() {
            const $btn = $(this);
            $btn.popover({
                title: 'Select % OFF',
                html: true,
                placement: 'bottom',
                content: $btn.siblings('.popover-content:eq(0)').clone().removeClass('none'),
                container: $form
            });
        });

        $form.find('[data-toggle=datepicker]').pickadate({
            format: 'mmm d, yyyy',
            formatSubmit: 'mmmm d, yyyy',
            min: 1
        });

        $form.find('[data-toggle=timepicker]').pickatime();



    });
    </script>

</main>

@endsection