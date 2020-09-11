@extends('backend.admin.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Settings</li>
    </ol>
    <div class="container-fluid">

        <form id="create-campaign-form" method="post" action="{{route('camp_manage.update',$camp->id  )}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="camp_id" value="{{$camp->id}}">
            <div class="card">

                <div class="card-header">
                    <i class="fal fa-cogs"></i> Campaign Info </div>

                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col-xl-6">

                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="price">
                                            Seller Name
                                        </label>
                                        <div class="controls">
                                            <div class="input-group">

                                                <input class="form-control" type="text"
                                                    value="{{$camp->user->name}}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="discounted-price">
                                            Email
                                        </label>
                                        <div class="controls">
                                            <div class="input-group">

                                                <input class="form-control"
                                                    type="text"
                                                    value="{{$camp->user->email}}" readonly>
                                            </div>


                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-6">
                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="price">
                                            Brand Name
                                        </label>
                                        <div class="controls">
                                            <div class="input-group">

                                                <input class="form-control" id="brand_name" name="brand_name" type="text"
                                                    value="{{$camp->brand_name}}"
                                                    >
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">


                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-6">

                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="price">
                                            Product Name
                                        </label>
                                        <div class="controls">
                                            <div class="input-group">

                                                <input class="form-control" id="product_name" name="product_name" type="text"
                                                   value="{{$camp->product_name}}"
                                                    >
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="category-id">Product Category <i
                                                class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Select a category where you want your campaign to be listed in."></i></label>
                                        <div class="controls">
                                            <select name="category" id="category" class="form-control"
                                                data-toggle="select2">
                                                <option value="">Select Product Category</option>
                                                @foreach($categories as $key=> $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-6">
                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="category-id">Marketplace <i
                                                class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Select a marketplace where you want your campaign to be listed in."></i></label>
                                        <div class="controls">
                                            <select name="marketplace" id="marketplace" class="form-control"
                                                data-toggle="select2">
                                                <option value="">Select Marketplace</option>
                                                @foreach($markets as $key =>$market)
                                                <option value="{{$market->id}}">{{$market->market_name}}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="asin">ASIN (Amazon Standard
                                            Identification Number) <i class="fal fa-question-circle"
                                                data-toggle="tooltip" data-placement="top"
                                                title="The ASIN of your listing in Amazon."></i></label>
                                        <div class="controls">
                                            <input class="form-control" id="amazon_id" name="amazon_id" maxlength="255"
                                                value="{{$camp->amazon_id}}" placeholder="ASIN of your listing" />
                                           
                                        </div>
                                    </div>

                                </div>



                            </div>


                        </div>

                    </div>





                    <div class="row align-items-center">

                        <div class="col-xl-6">

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
                                            Price after rebate <i class="fal fa-question-circle" data-toggle="tooltip"
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


                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-6">

                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="max-intents-daily">
                                            Daily rebates <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Daily number of people that can claim this rebate."></i>
                                        </label>
                                        <div class="controls">
                                            <input class="form-control" id="max-intents-daily" name="daily_rebates"
                                                type="number" min="1" step="1" value="{{$camp->daily_rebates}}">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="max-intents-total">
                                            Total rebates <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="The campaign will be completed once the total limit is reached."></i>
                                        </label>
                                        <div class="controls">
                                            <input class="form-control" id="max-intents-total" name="total_rebates"
                                                type="number" step="1" value="{{$camp->total_rebates}}">
                                        </div>
                                    </div>



                                </div>

                                <div class="col-xl-4 none" id="total_rebates_show">

                                    <div class="form-group">
                                        <label class="form-control-label" for="max-intents-total">
                                            Total rebates <i class="fal fa-question-circle" data-toggle="tooltip"
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

                        <div class="col-xl-6">

                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="start-date">Start date <i
                                                class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="When will this rebate become available?"></i></label>
                                        <div class="controls">
                                            <input placeholder="Start date" type="text" value="{{$camp->start_date}}"
                                                class="form-control" data-toggle="datepicker" id="start-date"
                                                name="start_date">
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

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label" for="category-id">Permission Status </label>
                                <div class="controls">
                                    <select name="permission" id="permission" class="form-control" data-toggle="select2">
                                        <option value="">Select Status</option>
                                        <option value="online">Online</option>
                                        <option value="ready">Ready</option>
                                        <option value="pending">Pending</option>
                                        <option value="incomplete">Incomplete</option>
                                        <option value="completed">Completed</option>



                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="row align-items-center">

                        <div class="col-xl-6">

                            <div class="form-group">
                                <label class="form-control-label" for="product-url">
                                    Product URL <i class="fal fa-question-circle" data-toggle="tooltip"
                                        data-placement="top" title="The URL of your Product Listing"></i>
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="product-url" name="product_url"
                                        value="{{$camp->product_url}}" placeholder="Product URL">
                                </div>
                            </div>


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

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    @if($camp->private_status ==1)
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="{{$camp->private_status}}" name="private_status" id="private" checked>
                                    @else
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="{{$camp->private_status}}" name="private_status" id="private">
                                    @endif
                                    <label class="custom-control-label" for="private">
                                        Private campaign<br>

                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    @if($camp->free_status ==1)
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="{{$camp->free_status}}" checked name="free_status" id="free-shipping">
                                    @else
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="{{$camp->free_status}}" name="free_status" id="free-shipping">
                                    @endif
                                    <label class="custom-control-label" for="free-shipping">
                                        Free shipping </label>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-6">

                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="product-url">
                                            Description
                                        </label>
                                        <div class="controls">
                                            <textarea name="description" class="form-control">
                                                {!! $camp->description !!}
                                            </textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="card-footer text-right">
                    <a href="{{route('camp_manage.index')}}" class="btn btn-secondary" type="submit">
                        <i class="fal fa-arrow-left"></i> Back </a>
                    <button class="btn btn-primary" type="submit">
                        <i class="fal fa-arrow-right"></i> Update </button>
                    
                        <input type="hidden" id="status_per" value="{{$camp->permission}}">

                </div>

            </div>

        </form>

    </div>
    <script>
    $(document).ready(function() {
       $market=<?php echo $camp->marketplace ?>;
       $category=<?php echo $camp->category ?>;
       $status=$("#status_per").val();
       $("#marketplace").val($market);
       $("#category").val($category);
       $("#permission").val($status);
    })
    </script>

    <script>
    $(function() {

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