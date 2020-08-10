@extends('backend.seller.layouts.app')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>


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
    @isset($msg)
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{$msg}}</div>
        </div>
    </section>
    @endisset
    <div class="container-fluid">

        <ul class="stepper stepper-horizontal">

            <li>
                <a href="">
                    <span class="circle">1</span>
                    <span class="label">Basics</span>
                </a>
            </li>

            <li class="active">
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
                    <span class="label">
                        Submission </span>
                </a>
            </li>

        </ul>

        <div class="card">

            <div class="card-header">
                <i class="fal fa-image"></i> Coupon Pictures </div>

            <div class="card-body">

                <input type="hidden" id="img_count" value="{{count($coupon->coupon_image)}}">
                <section id="pic-show">

                    <div class="container-fluid py-6">



                        <div class="row">


                            @foreach($coupon->coupon_image as $key => $pic )
                            <div data-e2e="my-card" class="card-deal col-md-6 col-lg-4 col-xl-3 col-uxxl-2">
                                <div class="deal deal-container deal-item deal-rebate new" data-id="66822"
                                    data-type="rebate">
                                    <div class="row mb-2">
                                        <div class="col-12 pr-0"><a data-id="{{$pic->id}}"
                                                onclick="remove_pic({{$pic->id}})" class="pic-remove badge badge-danger"
                                                style="color:white;">Remove</a>
                                        </div>
                                    </div>

                                    <a class="preview">

                                        <img src="{{asset('public/images/'.$pic->image_path)}}" width="100%"
                                            alt="{{asset('public/images/'.$pic->image_path)}}" style=" height: 180px;">

                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>

                </section>

                <div class="container">

                    <form method="post" action="{{route('seller.coupon_pic_store', $coupon->id)}}"
                        enctype="multipart/form-data" class="dropzone" id="dropzone">
                        @csrf
                        @method('PUT')

                    </form>

                </div>


            </div>

            <div class="card-footer">

                <div class="row">

                    <div class="col-6">

                        <button class="btn btn-primary dropzone-clickable" type="button">
                            <i class="fal fa-upload"></i> Upload Pictures </button>


                    </div>

                    <div class="col-6 text-right">

                        <form method="post" action="{{route('seller.coupon-pic-save')}}">

                            @csrf
                            @isset($coupon)
                            <input type="hidden" name="coupon_id" id="coupon_id" value="{{$coupon->id}}">
                            @endif
                            <button class="btn btn-primary btn-next" type="submit" name="action" value="continue">
                                <!-- <button class="btn btn-primary btn-next" type="submit" name="action" value="continue" disabled> -->
                                <i class="fal fa-arrow-right"></i> Continue </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script type="text/javascript">
    count = $("#img_count").val();
    if (count == 0) {
        $("#pic-show").hide();
    }
    </script>

    <script>
    function remove_pic(id) {
        coupon_id = $("#coupon_id").val();
        $.ajax({
            url: "{{route('coupon_pic_delete')}}",
            data: {
                _token: "{{csrf_token()}}",
                del_id: id,
                coupon_id: coupon_id
            },
            type: "post",
            dataType: "json",
            success: function(result) {
                state_msg = "";
                state_msg =
                    "<section class='section section-flash aos-init aos-animate' data-aos='flip-up'><div class='container-fluid'><div class='alert alert-success' role='alert'><i class='fal fa-check'></i> Your campaign has been deleted.</div></div></section>";
                image_tag = "";
                images = result.success;
                if (images.length != 0) {
                    $.each(images, function(i) {
                        img_path = 'public/images/' + images[i].image_path;
                        image_tag +=
                            `<div data-e2e='my-card' class='card-deal col-md-6 col-lg-4 col-xl-3 col-uxxl-2'><div class='deal deal-container deal-item deal-rebate new'><div class='row mb-2'><div class='col-12 pr-0'><a  onclick="remove_pic(` +
                            images[i].id +
                            `)" class='pic-remove badge badge-danger' style='color:white;'   >Remove</a></div></div><a  class='preview'><img src="`;
                        image_tag += `{{asset('` + img_path + `')}}`;
                        image_tag +=
                            `" width=100% style=' height: 180px;'></a></div></div>`;
                    });
                    $(".py-6>.row").html(image_tag);
                } else {
                    $("#pic-show").hide();
                }


            },
            error: function(e) {
                console.log(e);
            }
        })
    }
    </script>


    <script type="text/javascript">
    Dropzone.options.dropzone = {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,

        // var myDropzone = this;

        // $.get('/seller/camp_image', function(data) {

        //     $.each(data.images, function(key, value) {

        //         var file = {
        //             name: value.original,
        //             size: value.size
        //         }
        //         this.options.addedfile.call(this, file)
        //         this.options.thumbnail.call(this, file, 'images/icon_size/' + value.server)
        //         this.emit('complete', file)
        //     })
        // })

        removedfile: function(file) {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{ route("coupon_pic_destroy") }}',
                data: {
                    _token: "{{csrf_token()}}",
                    filename: name
                },
                success: function(data) {
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function(file, response) {
            state_msg = "";
            state_msg =
                "<section class='section section-flash aos-init aos-animate' data-aos='flip-up'><div class='container-fluid'><div class='alert alert-success' role='alert'><i class='fal fa-check'></i> Your coupon has been updated.</div></div></section>"
            image_tag = "";
            images = response.success;
            if (images.length > 0) {
                $("#pic-show").show();
                $.each(images, function(i) {
                    img_path = 'public/images/' + images[i].image_path;
                    image_tag +=
                        `<div data-e2e='my-card' class='card-deal col-md-6 col-lg-4 col-xl-3 col-uxxl-2'><div class='deal deal-container deal-item deal-rebate new'><div class='row mb-2'><div class='col-12 pr-0'><a  onclick="remove_pic(` +
                        images[i].id +
                        `)"  class='pic-remove badge badge-danger' style='color:white;'>Remove</a></div></div><a href="" class='preview'><img src="`;
                    image_tag += `{{asset('` + img_path + `')}}`;
                    image_tag += `" width=100% style=' height: 180px;'></a></div></div>`;
                });
                $(".py-6>.row").html(image_tag);
            }
        },
        error: function(file, response) {
            return false;
        }
    };
    </script>

</main>

@endsection