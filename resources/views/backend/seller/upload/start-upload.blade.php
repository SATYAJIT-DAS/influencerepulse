@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
    <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Coupons</a></li>
        <li class="breadcrumb-item"><a href="{{route('seller.listings')}}">Bulk Upload</a></li>
        <li class="breadcrumb-item active">Start Bulk Import</li>
    </ol>
    <div class="container-fluid">

        <form id="create-bulk-import-form" method="post" enctype="multipart/form-data" action="{{route('seller.upload-submit')}}">
            @csrf
            <div class="card">

                <div class="card-header">
                    <i class="fal fa-tag"></i> Start Bulk Upload </div>

                <div id="first-step">

                    <div class="card-body">

                        <div class="alert alert-info">

                            <i class="fal fa-info-circle"></i>
                            Easily offer coupon codes for your products by just uploading a simple CSV file.
                            Download our CSV file template, add your coupons and upload it back.
                        </div>

                        <div class="row align-items-end">

                            <div class="col-md-6 col-lg-7">

                                <div class="form-group">
                                    <label for="marketplace-id">Marketplace</label>
                                    <div class="controls">
                                        <select name="marketplace_id" id="marketplace-id" class="form-control"
                                            data-toggle="select2">
                                            <option value="">Select Marketplace</option>
                                            <option value="1" selected>Amazon</option>
                                            <option value="2">eBay</option>
                                            <option value="3">Jet</option>
                                            <option value="4">Shopify</option>
                                            <option value="5">Walmart</option>
                                            <option value="6">Other</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6 col-lg-5">

                                {{-- <a href="" --}}
                                <a href="/seller/coupons/imports/templates/amazon.csv"
                                    class="btn btn-dark btn-block btn-download mb-2-5">
                                    Download CSV File </a>

                            </div>

                        </div>

                        <div class="row align-items-center">

                            <div class="col-xl-7">

                                <div class="form-group mb-0">
                                    <label>Fields description</label>
                                    <div class="controls">
                                        <ul id="amazon-fields-description">
                                            <li>
                                                Seller ID <span class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 50</span>
                                                <span class="badge badge-warning">Example: A3TMS0KOW86KGK</span>
                                            </li>
                                            <li>
                                                ASIN <span class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 10</span>
                                                <span class="badge badge-warning">Example: BOOOOOOOOO</span>
                                            </li>
                                            <li>
                                                Coupon code <span class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 50</span>
                                                <span class="badge badge-warning">Example: SUPERCOUPON</span>
                                            </li>
                                            <li>
                                                % OFF <span class="badge badge-primary">number</span>
                                                <span class="badge badge-warning">Example: 50</span>
                                            </li>
                                            <li>
                                                Expiration date (yyyy-mm-dd) <span
                                                    class="badge badge-primary">date</span>
                                                <span class="badge badge-dark">Format: yyyy-mm-dd</span>
                                            </li>
                                            <li>
                                                Product title [ optional ] <span
                                                    class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 255</span>
                                            </li>
                                            <li>
                                                Description [ optional ] <span
                                                    class="badge badge-primary">string</span>
                                            </li>
                                            <li>
                                                Category [ optional ] <span
                                                    class="badge badge-primary">string</span>
                                            </li>
                                            <li>
                                                Brand name [ optional ] <span
                                                    class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 255</span>
                                            </li>
                                            <li>
                                                Price [ optional ] <span
                                                    class="badge badge-primary">amount</span>
                                                <span class="badge badge-warning">Example: 12.99</span>
                                            </li>
                                            <li>
                                                Keyword [ optional ] <span
                                                    class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 255</span>
                                            </li>
                                        </ul>

                                        <ul id="generic-fields-description" class="none">
                                            <li>
                                                Product ID <span class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 50</span>
                                            </li>
                                            <li>
                                                Coupon code <span class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 50</span>
                                                <span class="badge badge-warning">Example: SUPERCOUPON</span>
                                            </li>
                                            <li>
                                                % OFF <span class="badge badge-primary">integer</span>
                                                <span class="badge badge-dark">Min value: 10</span>
                                                <span class="badge badge-dark">Max value: 99</span>
                                                <span class="badge badge-warning">Example: 50</span>
                                            </li>
                                            <li>
                                                Expiration date (yyyy-mm-dd) <span
                                                    class="badge badge-primary">date</span>
                                                <span class="badge badge-dark">Format: yyyy-mm-dd</span>
                                            </li>
                                            <li>
                                                Product title <span class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 255</span>
                                            </li>
                                            <li>
                                                Product URL <span class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 4096</span>
                                                <span class="badge badge-warning">Example:
                                                    https://www.example.com/product</span>
                                            </li>
                                            <li>
                                                Description <span class="badge badge-primary">string</span>
                                            </li>
                                            <li>
                                                Category <span class="badge badge-primary">string</span>
                                            </li>
                                            <li>
                                                Brand name <span class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 255</span>
                                            </li>
                                            <li>
                                                Price <span class="badge badge-primary">amount</span>
                                                <span class="badge badge-warning">Example: 12.99</span>
                                            </li>
                                            <li>
                                                Keyword <span class="badge badge-primary">string</span>
                                                <span class="badge badge-dark">Max length: 255</span>
                                            </li>
                                        </ul>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-5">

                                <p class="text-muted">
                                    <small>
                                        <i>
                                            <i class="fal fa-info-circle"></i>
                                            If you don't provide data for optional fields, we will try to
                                            automatically obtain that information from Amazon. </i>
                                    </small>
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="card-footer text-center">

                        <span class="d-inline-block mr-3">
                            You downloaded the CSV template and filled it in? Let's continue... </span>

                        <button id="btn-next" type="button" class="btn btn-primary">
                            <i class="fal fa-arrow-alt-right"></i> Go to Next Step </button>

                    </div>

                </div>

                <div id="second-step" class="none">

                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col-lg-7">

                                <div class="form-group">
                                    <label for="csv">CSV file</label>
                                    <div class="form-controls">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="csv" name="csv"
                                                    aria-describedby="csvFile">
                                                <label class="custom-file-label" for="csvFile">
                                                    Choose file </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-5">

                                <p class="text-muted">
                                    <small>
                                        <i>
                                            Please make sure your file uses comma to separate fields. </i>
                                    </small>
                                </p>

                            </div>

                        </div>

                        <button class="btn btn-primary btn-block" type="submit">
                            Create Bulk Upload </button>

                        <button id="btn-back" class="btn btn-sm btn-link mx-auto d-block mt-4 text-muted"
                            type="button">
                            <i class="fal fa-arrow-alt-left"></i> Go back to first step </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

    <script>
        $(function () {

            const $form = $('#create-bulk-import-form');
            $form.on('click', '#btn-next', () => {
                $('#first-step').fadeOut(() => {
                    const secondStep = $('#second-step');
                    secondStep.fadeIn();
                });
            }).on('click', '#btn-back', () => {
                $('#second-step').fadeOut(() => {
                    $('#first-step').fadeIn();
                });
            }).on('change', 'select[name=marketplace_id]', (event) => {
                if (parseInt($(event.target).val()) === 1) {
                    $form.find('.btn-download').attr('href', '/seller/coupons/imports/templates/amazon.csv');
                    $form.find('#generic-fields-description').hide();
                    $form.find('#amazon-fields-description').show();
                    console.log($form.find('#amazon-fields-description'));
                } else {
                    $form.find('.btn-download').attr('href', '/seller/coupons/imports/templates/generic.csv');
                    $form.find('#amazon-fields-description').hide();
                    $form.find('#generic-fields-description').show();
                }
            }).find('[data-toggle="select2"]').select2({
                theme: "bootstrap"
            });

        });
    </script>

</main>
@endsection