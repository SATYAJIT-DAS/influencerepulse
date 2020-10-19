@extends('backend.admin.layouts.app')
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

        <form id="coupon-settings-form" method="post" action="{{route('coupon_manage.update', $coupon->id)}}">
        	@csrf
            @method('PUT')

            <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
            <div class="card">

                <div class="card-header">
                    <i class="fal fa-cogs"></i> Coupon Settings </div>

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
                                                    value="{{$coupon->user->name}}"
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
                                                    value="{{$coupon->user->email}}" readonly>
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
                                                    value="{{$coupon->brand_name}}"
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
                                                   value="{{$coupon->product_name}}"
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
                                                value="{{$coupon->amazon_id}}" placeholder="ASIN of your listing" />

                                        </div>
                                    </div>

                                </div>



                            </div>


                        </div>

                    </div>


                    <div class="row align-items-center">

                        <div class="col-xl-6">

                            <div class="row">

                                <div class="col-xl-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="price">
                                            Price <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="The full price of your product without any discounts"></i>
                                        </label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">{{ dynamicCurrency() }}</span>
                                                </div>
                                                <input class="form-control" id="price" name="price" type="number"
                                                    min="0" step="0.01" placeholder="Price" value="{{$coupon->price}}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="discount-value">
                                            % OFF <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="The discount you will be offering your product for on this website"></i>
                                        </label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select name="off_per" id="discount-value" class="form-control"
                                                    value="{{$coupon->off_per}}">
                                                    <option value="">% OFF</option>
                                                    <?php
                                                        for ($i=10; $i < 100; $i++) {
                                                           echo "<option value=".$i.">".$i."</option>";
                                                        }
                                                    ?>

                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="code">
                                            Coupon code <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="The coupon code that will be provided to buyers to obtain the discount"></i>
                                        </label>
                                        <div class="controls">
                                            <input class="form-control" id="code" name="coupon_code" type="text"
                                                maxlength="100" placeholder="Coupon code"
                                                value="{{$coupon->coupon_code}}">
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
                                        value="{{$coupon->product_url}}" placeholder="Product URL">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="start-date">
                                            Start date <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="When will this coupon become available?"></i> </label>
                                        <div class="controls">
                                            <input placeholder="Start date" type="text" class="form-control"
                                                data-toggle="datepicker" id="start-date" name="start_date"
                                                value="{{$coupon->start_date}}">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="end-date">
                                            End date <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="When will this coupon end?"></i>
                                        </label>
                                        <div class="controls">
                                            <input placeholder="End date" type="text" class="form-control"
                                                data-toggle="datepicker" id="end-date" name="end_date"
                                                value="{{$coupon->end_date}}">
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="row">

                                <div class="col-xl-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="keyword1">Keyword 1</label>
                                        <div class="controls keyword-twitter-typeahead">
                                            <input class="form-control form-control-autocomplete-keyword" id="keyword1"
                                                name="keyword1" maxlength="255" value="{{$coupon->keyword1}}"
                                                placeholder="1st keyword to target">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="keyword2">Keyword 2</label>
                                        <div class="controls keyword-twitter-typeahead">
                                            <input class="form-control form-control-autocomplete-keyword" id="keyword2"
                                                name="keyword2" maxlength="255" value="{{$coupon->keyword2}}"
                                                placeholder="2nd keyword to target">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="keyword3">Keyword 3</label>
                                        <div class="controls keyword-twitter-typeahead">
                                            <input class="form-control form-control-autocomplete-keyword" id="keyword3"
                                                name="keyword3" maxlength="255" value="{{$coupon->keyword3}}"
                                                placeholder="3rd keyword to target">
                                        </div>
                                    </div>

                                </div>

                            </div>



                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    @if($coupon->free_status ==1)
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="1" name="free_status" id="free-shipping" checked>
                                    @else
                                    <input type="checkbox" class="custom-control-input" data-toggle="checkbox"
                                        value="0" name="free_status" id="free-shipping">
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
                                                {!! $coupon->description !!}
                                            </textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="card-footer text-right">

                    <button class="btn btn-primary" type="submit">
                        <i class="fal fa-arrow-right"></i> Continue </button>

                </div>

            </div>

        </form>
        <input type="hidden" id="off_per_value" value="{{$coupon->off_per}}">

    </div>

    <script>
    $(document).ready(function() {
       $market=<?php echo $coupon->market_place ?>;
       $category=<?php echo $coupon->category ?>;
       $status=$("#status_per").val();
       $("#marketplace").val($market);
       $("#category").val($category);
       $("#permission").val($status);
    })
    </script>

    <script>
    $(function() {

        off_per=$("#off_per_value").val();
        $("#discount-value").val(off_per);

        const $form = $('#coupon-settings-form');
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
                'off_per': {
                    validators: {
                        notEmpty: {
                            message: 'The percentage off is required.'
                        }
                    }
                },
                'code': {
                    validators: {
                        notEmpty: {
                            message: 'The coupon code is required.'
                        },
                        stringLength: {
                            message: 'The code should be at least 2 characters long.',
                            min: 2
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9\-]{1,}$/i,
                            message: 'The code is invalid. It should be a combination of letters, numbers and dash sign.'
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
                'end_date': {
                    validators: {
                        notEmpty: {
                            message: 'The end date is required.'
                        }
                    }
                },
                'product_url': {
                    validators: {
                        notEmpty: {
                            message: 'The product URL is required.'
                        },
                        uri: {
                            message: 'The product URL is invalid.'
                        }
                    }
                }
            }
        });

        $form.find('#start-date[data-toggle=datepicker]').pickadate({
            format: 'mmm d, yyyy',
            formatSubmit: 'mmmm d, yyyy',
            min: 1
        });
        $form.find('#end-date[data-toggle=datepicker]').pickadate({
            format: 'mmm d, yyyy',
            formatSubmit: 'mmmm d, yyyy',
            min: new Date(2019, 11, 2)
        });


    });
    </script>

</main>


@endsection
