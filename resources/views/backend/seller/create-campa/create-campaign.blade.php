@extends('backend.seller.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('seller.campaigns')}}">Campaigns</a></li>
        <li class="breadcrumb-item active">Create New Campaign</li>
    </ol>
    
    <div class="container-fluid">

        <ul class="stepper stepper-horizontal">

            <li class="active">
                <a href="#">
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
                    <span class="label">Payment</span>
                </a>
            </li>

            <li>
                <a href="#" class="disabled">
                    <span class="circle">6</span>
                    <span class="label">Summary</span>
                </a>
            </li>

        </ul>
        @isset($camp)
        <form id="create-campaign-form" method="post" action="{{route('seller.update_campaign')}}">
            @else
            <form id="create-campaign-form" method="post" action="{{route('seller.create-campaign')}}">
                @endif
                @csrf
                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-percent"></i> Create New Campaign </div>

                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col-xl-7">

                                <div class="form-group">
                                    <label class="form-control-label" for="name">Product name <i
                                            class="fal fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="The name of your product as it will be shown on our website. Keep it as short as possible."></i></label>
                                    <div class="controls">

                                        @isset($camp)
                                        <input type="hidden" name="camp_id" value="{{$camp->id}}">
                                        <input class="form-control" id="product_name" name="product_name"
                                            maxlength="255" value="{{$camp->product_name}}"
                                            placeholder="Name of the product" />
                                        @else
                                        <input class="form-control" id="product_name" name="product_name"
                                            maxlength="255" value="" placeholder="Name of the product" />
                                        @endisset
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-5">

                                <p class="text-muted">
                                    <small><i>Enter the name of your product you'd like to offer (255 characters
                                            maximum).</i></small>
                                </p>

                            </div>

                        </div>

                        <div class="row align-items-center">

                            <div class="col-xl-7">

                                <div class="form-group">
                                    <label class="form-control-label" for="description">Description <i
                                            class="fal fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            title="Add a description of your product."></i></label>
                                    <div class="controls">
                                        @isset($camp)
                                        <textarea name="description" id="description" class="form-control"
                                            placeholder="Enter a detailed description of the product">
                                        {{$camp->description}}</textarea>
                                        @else
                                        <textarea name="description" id="description" class="form-control"
                                            placeholder="Enter a detailed description of the product"></textarea>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-5">

                                <p class="text-muted">
                                    <small><i>Enter a detailed description of your product. HTML markup is allowed
                                            but only basic tags are supported (&lt;p&gt;, &lt;b&gt;, &lt;ul&gt;,
                                            &lt;ol&gt;, &lt;li&gt;, &lt;i&gt;, &lt;u&gt;, &lt;strike&gt;,
                                            &lt;sup&gt;, &lt;sub&gt;, &lt;span&gt;).</i></small>
                                </p>

                            </div>

                        </div>

                        <div class="row align-items-center">

                            <div class="col-xl-7">

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="category-id">Product Category <i
                                                    class="fal fa-question-circle" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Select a category where you want your campaign to be listed in."></i></label>
                                            <div class="controls">
                                                <select name="category" id="category" class="form-control"
                                                    data-toggle="select2">
                                                    <option value="">Select Product Category</option>
                                                    @foreach($categories as $key => $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="marketplace-id">
                                                Marketplace <i class="fal fa-question-circle" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Select the marketplace where the buyer can find your product on sale."></i>
                                            </label>
                                            <div class="controls">
                                                <select name="marketplace" id="marketplace" class="form-control"
                                                    data-toggle="select2">
                                                    <option value="">Select Marketplace</option>
                                                    @foreach($markets as $key=> $market)
                                                    <option value="{{$market->id}}">{{$market->market_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row align-items-center none">

                            <div class="col-xl-7">

                                <div class="form-group">
                                    <label class="form-control-label" for="asin">ASIN (Amazon Standard
                                        Identification Number) <i class="fal fa-question-circle" data-toggle="tooltip"
                                            data-placement="top"
                                            title="The ASIN of your listing in Amazon."></i></label>
                                    <div class="controls">
                                        @isset($camp)
                                        <input class="form-control" id="amazon_id" name="amazon_id" maxlength="255"
                                            value="{{$camp->amazon_id}}" placeholder="ASIN of your listing" />
                                        @else
                                        <input class="form-control" id="amazon_id" name="amazon_id" maxlength="255"
                                            value="" placeholder="ASIN of your listing" />
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-5">

                                <p class="text-muted">
                                    <small><i>Enter the ASIN of your listing provided by Amazon (10 alphanumeric
                                            characters).</i></small>
                                </p>

                            </div>

                        </div>

                        <div class="row align-items-center">

                            <div class="col-xl-7">

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="brand-name">
                                                Brand name <i class="fal fa-question-circle" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Name of the brand used to sell the product on the marketplace."></i>
                                            </label>
                                            <div class="controls">
                                                @isset($camp)

                                                <input class="form-control" id="brand-name" name="brand_name"
                                                    value="{{$camp->brand_name}}" maxlength="255" value=""
                                                    placeholder="Name of your brand">
                                                @else
                                                <input class="form-control" id="brand-name" name="brand_name"
                                                    maxlength="255" value="" placeholder="Name of your brand">
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="product-id">
                                                Product ID <i class="fal fa-question-circle" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="A unique identifier for the product to get protection against repeat buyers."></i>
                                            </label>
                                            <div class="controls">
                                                @isset($camp)
                                                <input class="form-control" id="product-id" name="product_id"
                                                    maxlength="20" value="{{$camp->product_id}}"
                                                    placeholder="ID of the product">
                                                @else
                                                <input class="form-control" id="product-id" name="product_id"
                                                    maxlength="20" value="" placeholder="ID of the product">
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-5">

                                <p class="text-muted">
                                    <small><i>Providing a unique ID for your product over multiple campaigns allows
                                            us to protect you against repeat buyers. You can use a SKU, an ASIN, any
                                            unique identifier provided by a marketplace or simply a unique ID that
                                            you define inside InfluencerPulse for your product.</i></small>
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="card-footer text-right">

                        <button class="btn btn-primary" type="submit">
                            <i class="fal fa-arrow-right"></i> Continue </button>

                    </div>

                </div>

            </form>

    </div>
    @isset($camp)
    <script>
    $(document).ready(function() {
        category = <?php echo $camp->category ?> ;
        marketplace = <?php echo $camp->marketplace ?> ;
        $("#category").val(category);
        $("#marketplace").val(marketplace);
    })
    </script>
    @endif
    <script>
    $(function() {


        const $form = $('#create-campaign-form');
        const fv = $form.formValidation({
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
                    'name': {
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
                        validators: {
                            message: 'The description is required.',
                            callback: {
                                callback: function(value, validator, $field) {
                                    var code = $('[name="description"]').summernote('code');
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
                        validators: {
                            notEmpty: {
                                message: 'The category is required.'
                            }
                        }
                    },
                    'product_id': {
                        validators: {
                            notEmpty: {
                                message: 'The category is required.'
                            }
                        }
                    },
                    'brand_name': {
                        validators: {
                            notEmpty: {
                                message: 'The category is required.'
                            }
                        }
                    },
                    'marketplace': {
                        validators: {
                            notEmpty: {
                                message: 'The marketplace is required.'
                            }
                        }
                    },
                    'asin': {
                        enabled: false,
                        validators: {
                            notEmpty: {
                                message: 'The ASIN is required.'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9]{10}$/i,
                                message: 'The ASIN is invalid. It should a block of 10 letters and/or numbers (e.g. B00005N5PF).'
                            }
                        }
                    }
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
            .on('summernote.change', function(customEvent, contents, $editable) {
                $('#create-campaign-form').formValidation('revalidateField', 'description');
            })
            .end();

        $form.find('[data-toggle="select2"]').select2({
            theme: "bootstrap"
        });

        $form.find('select[name=marketplace_id]').on('change', function() {
            if (parseInt($(this).val()) === 1) {
                //Amazon
                $form.find('input[name=asin]').parents('.row').first().removeClass('none');
                $form.formValidation('enableFieldValidators', 'asin', true);
            } else {
                $form.find('input[name=asin]').parents('.row').first().addClass('none');
                $form.formValidation('enableFieldValidators', 'asin', false);
            }
        });

    });
    </script>

</main>

@endsection