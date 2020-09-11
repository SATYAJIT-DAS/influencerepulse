@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Coupons</a></li>
        <li class="breadcrumb-item active">Create New Coupon</li>
    </ol>
    <div class="container-fluid">

        <ul class="stepper stepper-horizontal">

            <li class="active">
                <a href="">
                    <span class="circle">1</span>
                    <span class="label">Basics</span>
                </a>
            </li>

            <li>
                <a href="#" class="disabled">
                    <span class="circle">2</span>
                    <span class="label">Pictures</span>
                </a>
            </li>

            <li>
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
                    <span class="label">Summary</span>
                </a>
            </li>

        </ul>
        @isset($coupon)
        <form id="create-coupon-form" method="post" action="{{route('seller.coupon-basic-update')}}">
        @else
        <form id="create-coupon-form" method="post" action="{{route('seller.coupon-basic')}}">
        @endisset
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-tag"></i> Create New Coupon </div>

                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col-xl-7">

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="marketplace-id">
                                                Marketplace <i class="fal fa-question-circle" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Select the marketplace where the buyer can find your product on sale."></i>
                                            </label>
                                            <div class="controls">
                                                <select name="market_place" id="marketplace-id" class="form-control"
                                                    data-toggle="select2">
                                                    <option value="">Select Marketplace</option>
                                                    @foreach($markets as $key=>$market)
                                                    <option value="{{$market->id}}">{{$market->market_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="product-id">
                                                <span>ASIN</span>
                                                <i class="fal fa-question-circle" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="The unique identifier provided by the marketplace for the product."></i>
                                            </label>
                                            <div class="controls">
                                                @isset($coupon)
                                                <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                                                <input class="form-control" id="product-id" name="product_id"
                                                    maxlength="20" value="{{$coupon->product_id}}">
                                                @else
                                                <input class="form-control" id="product-id" name="product_id"
                                                    maxlength="20" value="" placeholder="ASIN of the product">
                                                @endisset
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-5">

                                <p class="text-muted">
                                    <small><i>Information about your product will be automatically pulled if you
                                            sell it on Amazon.</i></small>
                                </p>

                            </div>

                        </div>

                        <div class="product-details none">

                            <div class="row align-items-center">

                                <div class="col-xl-7">

                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Product name <i
                                                class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="The name of your product as it will be shown on our website. Keep it as short as possible."></i></label>
                                        <div class="controls">
                                            @isset($coupon)
                                            <input class="form-control" id="product_name" name="product_name"
                                                maxlength="255" value="{{$coupon->product_name}}" />
                                            @else
                                            <input class="form-control" id="product_name" name="product_name"
                                                maxlength="255" />
                                            @endisset
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-5">

                                    <p class="text-muted">
                                        <small><i>Enter the name of your product (255 characters
                                                maximum).</i></small>
                                    </p>

                                </div>

                            </div>

                            <div class="row align-items-center">

                                <div class="col-xl-7">

                                    <div class="form-group">
                                        <label class="form-control-label" for="description">Description <i
                                                class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Add a description of your product."></i></label>
                                        <div class="controls">
                                            @isset($coupon)
                                            <textarea name="description" id="description"
                                                class="form-control">{{$coupon->description}}</textarea>
                                            @else
                                            <textarea name="description" id="description" class="form-control"
                                                placeholder="Enter a detailed description of the product"></textarea>
                                            @endisset
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-5">

                                    <p class="text-muted">
                                        <small><i>Enter a detailed description of your product. HTML markup is
                                                allowed but only basic tags are supported (&lt;p&gt;, &lt;b&gt;,
                                                &lt;ul&gt;, &lt;ol&gt;, &lt;li&gt;, &lt;i&gt;, &lt;u&gt;,
                                                &lt;strike&gt;, &lt;sup&gt;, &lt;sub&gt;, &lt;span&gt;).</i></small>
                                    </p>

                                </div>

                            </div>

                            <div class="row align-items-center">

                                <div class="col-xl-7">

                                    <div class="row">

                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="category-id">
                                                    Product Category <i class="fal fa-question-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Select a category where you want your product to be listed in."></i>
                                                </label>
                                                <div class="controls">
                                                    <select name="category" id="category-id" class="form-control"
                                                        data-toggle="select2">
                                                        <option value="">Select Product Category</option>
                                                        @foreach($categories as $key =>$category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="brand-name">
                                                    Brand name <i class="fal fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Name of the brand used to sell the product on the marketplace."></i>
                                                </label>
                                                <div class="controls">
                                                    @isset($coupon)
                                                    <input class="form-control" id="brand-name" name="brand_name"
                                                        maxlength="255" value="{{$coupon->brand_name}}">
                                                    @else
                                                    <input class="form-control" id="brand-name" name="brand_name"
                                                        maxlength="255" placeholder="Name of your brand">
                                                    @endif
                                                </div>
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
            @isset($coupon)
            <input type="hidden" id="cate_id" value="{{$coupon->category}}">
            <input type="hidden" id="market_id" value="{{$coupon->market_place}}">
            @endisset

    </div>

    <script>
    function edit_init() {
        cate_id = $("#cate_id").val();
        market_id = $("#market_id").val();
        $("#marketplace-id").val(market_id);
        $("#category-id").val(cate_id);

        const $form = $("#create-coupon-form");


        if (market_id === 1) {
            //Amazon
            $('input[name=product_id]').attr('placeholder', 'ASIN of the product')
                .parents('.form-group').find('label span').html('ASIN');

            $('.product-details').hide();
        } else {

            $('input[name=product_id]').attr('placeholder', 'ID of the product')
                .parents('.form-group').find('label span').html('Product ID');

            $('.product-details').show();

        }


    }

    $(function() {

        edit_init();


        const $form = $('#create-coupon-form');
        const fv = $form.on('init.field.fv', function(e, data) {
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
                excluded: [':disabled'],
                fields: {
                    'market_place': {
                        validators: {
                            notEmpty: {
                                message: 'The marketplace is required.'
                            }
                        }
                    },
                    // 'product_id': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'The product ID is required.'
                    //         },
                    //         regexp: {
                    //             regexp: /^[a-zA-Z0-9]{10}$/i,
                    //             message: 'The ASIN is invalid. It should a block of 10 letters and/or numbers (e.g. B00005N5PF).'
                    //         }
                    //     }
                    // },
                    'name': {
                        enabled: false,
                        validators: {
                            notEmpty: {
                                message: 'The name is required.'
                            },
                            stringLength: {
                                message: 'The name should be at least 10 characters long.',
                                min: 10
                            }
                        }
                    },
                    'description': {
                        enabled: false,
                        validators: {
                            message: 'The description is required.',
                            callback: {
                                callback: function() {
                                    const code = $('[name="description"]').summernote('code');
                                    // <p><br></p> is code generated by Summernote for empty content
                                    if (code === '<p><br></p>') {
                                        return {
                                            message: 'The description is required.',
                                            valid: false
                                        }
                                    }

                                    //Include <p></p> HTML characters when counting
                                    if (code.length < 27) {
                                        return {
                                            message: 'The description should be at least 20 characters long.',
                                            valid: false
                                        }
                                    }

                                    return true;
                                }
                            }
                        }
                    },
                    'category': {
                        enabled: false,
                        validators: {
                            notEmpty: {
                                message: 'The category is required.'
                            }
                        }
                    }
                }
            }).on('success.form.fv', function(e) {
                // Prevent form submission
                e.preventDefault();

                const $form = $(e.target);
                const $button = $form.find('button[type=submit]');
                const fv = $form.data('formValidation');
                const marketplace = parseInt($form.find('select[name=market_place]').val());
                if (marketplace === 1) {
                    const asin = $form.find('input[name=product_id]').val();
                    $button.html('<i class="fal fa-spin fa-spinner"></i> Loading ASIN information...');
                    //Load ASIN details first.
                    $.get(`/seller/coupons/coupon/ajax/asin.html?asin=${asin}`).then(function() {
                        $button.html('<i class="fal fa-spin fa-spinner"></i> Creating Coupon...');
                        fv.defaultSubmit();
                    }).fail(function() {
                        $button.html('<i class="fal fa-arrow-right"></i> Continue')
                            .removeClass('disabled').removeAttr('disabled');
                    });
                } else {
                    $button.html('<i class="fal fa-spin fa-spinner"></i> Creating Coupon...');
                    fv.defaultSubmit();
                }
            }).find('[name="description"]')
            .summernote({
                height: '20rem',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['view', ['codeview']]
                ]
            })
            .on('summernote.change', function() {
                $('#create-coupon-form').formValidation('revalidateField', 'description');
            })
            .end();

        $form.find('[data-toggle="select2"]').select2({
            theme: "bootstrap"
        });

        $form.find('select[name=market_place]').on('change', function() {
            if (parseInt($(this).val()) === 1) {
                //Amazon
                $form.find('input[name=product_id]').attr('placeholder', 'ASIN of the product')
                    .parents('.form-group').find('label span').html('ASIN');
                $form.formValidation('enableFieldValidators', 'product_id', true, 'regexp');
                $form.formValidation('enableFieldValidators', 'name', false);
                $form.formValidation('enableFieldValidators', 'description', false);
                $form.formValidation('enableFieldValidators', 'category', false);
                $form.find('.product-details').hide();
            } else {
                $form.find('input[name=product_id]').attr('placeholder', 'ID of the product')
                    .parents('.form-group').find('label span').html('Product ID');
                $form.formValidation('enableFieldValidators', 'product_id', false, 'regexp');
                $form.formValidation('enableFieldValidators', 'name', true);
                $form.formValidation('enableFieldValidators', 'description', true);
                $form.formValidation('enableFieldValidators', 'category', true);
                $form.find('.product-details').show();
            }
        });

    });
    </script>

</main>
@endsection