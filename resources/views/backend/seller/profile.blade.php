@extends('backend.seller.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    @if(session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid"> 
            @if(session('status') == "No file was uploaded")
            <div class="alert alert-danger" role="alert">
                <i class="fal fa-exclamation-triangle"></i> {{session('status')}}
            </div>
            @else
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{session('status')}}
            </div>
            @endif
        </div>
    </section>
    @endif
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-8">

                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-user-cog"></i> Profile </div>

                    <div class="card-body">

                        <form id="profile-form" method="post" action="{{route('seller.profile-update')}}">
                            @csrf
                            <input type="hidden" name="action" value="profile" />

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="name">
                                            Full name </label>
                                        <div class="controls">
                                            <input class="form-control" type="text" name="name" id="name"
                                                maxlength="255" value="{{$user->name}}" />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="public-name">
                                            Brand name <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="This will help buyers to buy the product from your brand."></i>
                                        </label>
                                        <div class="controls">
                                            <input class="form-control" type="text" name="public_name" id="public-name"
                                                maxlength="255" value="{{$user->brandname}}" />
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="address1">Address (line 1)</label>
                                <div class="controls">
                                    <input class="form-control" id="address1" name="address1" value="{{$user->address1}}"
                                        placeholder="Address (line 1)" />
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-8">

                                    <div class="form-group">
                                        <label class="form-control-label" for="address2">Address (line
                                            2)</label>
                                        <div class="controls">
                                            <input class="form-control" id="address2" name="address2"
                                                value="{{$user->address2}}" placeholder="Address (line 2)" />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="zip-code">ZIP code</label>
                                        <div class="controls">
                                            <input class="form-control" id="zip-code" name="zip_code" value="{{$user->zip_code}}"
                                                placeholder="ZIP code" />
                                        </div>
                                    </div>

                                </div>

                            </div>

                           <div class="form-group">
                                <label class="form-control-label" for="address1">Phone Number</label>
                                <div class="controls">
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}"
                                        placeholder="Phone Number..." />
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="country">Country</label>
                                        <div class="controls">
                                            <select name="country" id="country" class="form-control"
                                                data-toggle="select2">
                                                @foreach($countries as $key=>$country)
                                                <option value="{{$key}}">{{$country}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="state-id">State</label>
                                        <div class="controls">
                                            <select name="state_id" id="state-id" class="form-control"
                                                data-toggle="select2">
                                                @foreach($states as $key=>$state)
                                                    <option value="{{$key}}">{{$state}}</option>
                                                @endforeach  
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="city">City</label>
                                        <div class="controls">
                                            <input class="form-control" id="city" name="city" value="new york"
                                                placeholder="City" />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="timezone">
                                            Timezone </label>
                                        <div class="controls">
                                            <select name="timezone" id="timezone" class="form-control"
                                                data-toggle="select2">
                                                @foreach($timezones as $key => $timezone)
                                                <option value="{{$key}}">{{$timezone}}</option>
                                                @endforeach
                                                <option value="UTC">UTC</option>
                                            </select>

                                            <div class="d-block text-right text-muted timezone-detection">
                                                Don't know your timezone? <a
                                                    href="" onclick="get_timezone()"
                                                    class="btn-timezone" id="my_timezone">
                                                    Click to autodetect </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <button class="btn btn-primary btn-block" type="submit">
                                Update Profile </button>

                        </form>

                    </div>

                </div>

                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-flag"></i> System Notifications </div>

                    <div class="card-body">

                        <form id="system-notifications-form" method="post" action="{{route('notificate-update')}}">
                            @csrf

                            <input type="hidden" name="action" value="notifications" />

                            <div class="form-group">

                                <div class="custom-control custom-checkbox">
                                    @if($user->key_update_status==1)
                                    <input type="checkbox" data-toggle="checkbox" value="1"
                                        id="system-notifications-newsletter" name="notifications[newsletter][enabled]"
                                        class="custom-control-input" checked="checked" />
                                    @else
                                    <input type="checkbox" data-toggle="checkbox" value="0"
                                        id="system-notifications-newsletter" name="notifications[newsletter][enabled]"
                                        class="custom-control-input" />
                                    @endif
                                    <label class="custom-control-label" for="system-notifications-newsletter">
                                        Influencer Pulse updates <br />
                                        <small class="text-muted">Receive the latest news about Influencer Pulse in
                                            your inbox.</small>
                                    </label>
                                </div>

                            </div>

                            <hr class="mb-3">

                            <div class="row">

                                <div class="col-md-7">

                                    <div class="form-group">
                                        <input type="hidden" id="claimed_status" value="{{$user->claimed_status}}">
                                        <input type="hidden" id="approval_status" value="{{$user->approval_status}}">
                                        <div class="custom-control custom-checkbox custom-checkbox-email">
                                            @if($user->claimed_status==1)
                                            <input type="checkbox" data-toggle="checkbox" value="1"
                                                name="notifications[claim][enabled]"
                                                class="custom-control-input custom-control-email"
                                                id="system-notification-claim" checked="checked" />
                                            @else
                                            <input type="checkbox" data-toggle="checkbox" value="0"
                                                name="notifications[claim][enabled]"
                                                class="custom-control-input custom-control-email"
                                                id="system-notification-claim" />
                                            @endif
                                            <label class="custom-control-label" for="system-notification-claim">
                                                Deals claimed <br />
                                                <small class="text-muted">Receive an email in your inbox each
                                                    time a buyer reports a Influencer Pulse.</small>
                                            </label>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-5 claim">

                                    <div class="form-group mb-0">
                                        <label class="sr-only" for="email">Email address</label>
                                        <div class="controls controls-no-label">
                                            <input type="email" class="form-control" id="email"
                                                name="notifications[claim][email]" maxlength="190"
                                                value="{{Auth()->user()->email}}"
                                                placeholder="Different email address to notify" />
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <hr class="mb-3">

                            <div class="row">

                                <div class="col-md-7">

                                    <div class="form-group">

                                        <div class="custom-control custom-checkbox">
                                            @if($user->approval_status==1)
                                            <input type="checkbox" data-toggle="checkbox" value="1"
                                                name="notifications[approval][enabled]"
                                                class="custom-control-input custom-control-email"
                                                id="system-notification-approval" checked="checked" />
                                            @else
                                            <input type="checkbox" data-toggle="checkbox" value="0"
                                                name="notifications[approval][enabled]"
                                                class="custom-control-input custom-control-email"
                                                id="system-notification-approval" />
                                            @endif
                                            <label class="custom-control-label" for="system-notification-approval">
                                                Deals approval <br />
                                                <small class="text-muted">Receive daily an email in your inbox
                                                    if you have Deals to approve.</small>
                                            </label>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-5">

                                    <div class="form-group approval">
                                        <label class="sr-only" for="email">Email address</label>
                                        <div class="controls controls-no-label">
                                            <input type="email" class="form-control" id="email-claim"
                                                name="notifications[approval][email]" maxlength="190"
                                                value="{{auth()->user()->email}}"
                                                placeholder="Different email address to notify" />
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <button class="btn btn-primary btn-block" type="submit">
                                Save Notification Settings </button>

                        </form>

                    </div>

                </div>

                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-address-book"></i> Invoicing Information
                    </div>

                    <div class="card-body">

                        <div class="alert alert-info">
                            <i class="fal fa-info-circle"></i> Below you can override your billing address as it
                            appears on your invoices.
                        </div>

                        <form id="invoicing-information-form" method="post" action="{{route('seller.invoice-input')}}">
                            @csrf
                            <input type="hidden" name="action" value="invoice">

                            <div class="form-group">
                                <label class="form-control-label" for="invoice-line-1">Invoice line 1</label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="invoice_line_1" id="invoice-line-1"
                                        maxlength="255" value="{{$user->invoice1}}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="invoice-line-2">Invoice line 2</label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="invoice_line_2" id="invoice-line-2"
                                        maxlength="255" value="{{$user->invoice2}}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="invoice-line-3">Invoice line 3</label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="invoice_line_3" id="invoice-line-3"
                                        maxlength="255" value="{{$user->invoice3}}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="invoice-line-4">Invoice line 4</label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="invoice_line_4" id="invoice-line-4"
                                        maxlength="255" value="{{$user->invoice4}}" />
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">
                                Update Invoicing Information </button>

                        </form>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-camera"></i> Avatar </div>

                    <div class="card-body text-center">

                        <form method="post" enctype="multipart/form-data" action="{{route('avatar-upload')}}">
                            @csrf
                            <input type="hidden" name="action" value="avatar" />

                            <div class="row align-items-center mb-3">

                                <div class="col-md-6">
                                    <div class="text-center">
                                        @if($user->image)

                                        <img src="{{asset('public/images/'.$user->image)}}" height="80"
                                            class="mx-auto rounded-circle" />
                                        @else
                                        <i class="fal fa-image fa-4x grey-text text-lighten-2"></i>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div>Maximum size of 2000k JPG, GIF, PNG.</div>
                                    @if($user->image)
                                    <a class="btn btn-danger btn-sm mt-1" title="Delete your avatar"
                                        href="{{route('remove-avatar', $user->id)}}">
                                        <i class="fal fa-remove"></i> Delete </a>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="avatar">Avatar</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar" />
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">
                                Upload </button>

                        </form>

                    </div>

                </div>

                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-at"></i> Email address </div>

                    <div class="card-body">

                        <p>Manage your email address. Be sure your email address is working, we will send you
                            notifications from users, renewals.</p>
                        <a class="btn btn-primary btn-block" href="{{route('seller.mail')}}"
                            title="Manage email address">
                            Manage email address </a>

                    </div>

                </div>

                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-lock"></i> Password </div>

                    <div class="card-body">

                        <p>Manage your password. We highly recommend to update your password regularly for
                            security reasons.</p>
                        <a class="btn btn-primary btn-block" href="{{route('seller.pass')}}"
                            title="Manage password">
                            Manage password </a>

                    </div>

                </div>



            </div>

        </div>

    </div>
    <input type="hidden" id="user_country" value="{{$user->country}}">
    <input type="hidden" id="user_state" value="{{$user->state}}">
    <input type="hidden" id="user_timezone" value="{{$user->time_zone}}">

    <script type="text/javascript">
        function get_timezone(){
            $.ajax({
                url: "{{route('get-timezone')}}",
                data: {
                    _token: "{{csrf_token()}}",
                },
                type: "post",
                dataType: "json",
                success: function(result) {
                    console.log(result);
                    $("#my_timezone").html(result.timezone);

                    console.log("ssss",result.time_key);

                    $("#timezone").val(result.time_key);
                    $("#timezone").select2({
                        theme: "bootstrap"
                    });

                },
                error:function(e){
                    console.log(e);
                }
            })
        }

        function get_state(country_id){
            $.ajax({
                url: "{{route('get-state')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    country_id: country_id,
                },
                type: "post",
                dataType: "json",
                success: function(result) {
                    html_state="";
                    $.each(result, function(i) {
                        html_state+="<option value='"+i+"'>"+result[i]+"</option>";
                    });
                    console.log("html",html_state);
                    $("#state-id").html(html_state);
                },
                error:function(e){
                    console.log(e);
                }
            })
        }

        function alam_status(){
            approval_status=$("#system-notification-claim").is(':checked');
            if(approval_status==1){
                $(".claim").show();
            }else{
                $(".claim").hide();
            }

            approval_status=$("#system-notification-approval").is(':checked');
            if(approval_status==1){
                $(".approval").show();
            }else{
                $(".approval").hide();
            }
        }
    </script>

    <script>
    $(function() {

        country_id=$("#user_country").val();
        state_id=$("#user_state").val();
        timezone_id=$("#user_timezone").val();

        $("#country").val(country_id);
        $("#state-id").val(state_id);
        $("#timezone").val(timezone_id);

        approval_status=$("#system-notification-claim").is(':checked');
        if(approval_status==1){
            $(".claim").show();
        }else{
            $(".claim").hide();
        }

        approval_status=$("#system-notification-approval").is(':checked');
        if(approval_status==1){
            $(".approval").show();
        }else{
            $(".approval").hide();
        }

        $("#system-notification-claim").on('change',function(){
            alam_status();
        })

        $("#system-notification-approval").on('change',function(){
            alam_status();
        })

        $("#country").on('change',function(){
            country_id=$(this).val();

            get_state(country_id);           

        })

        const $form = $('#profile-form');
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
                'name': {
                    validators: {
                        notEmpty: {
                            message: 'The name is required.'
                        },
                        stringLength: {
                            min: 5,
                            message: 'The full name is too short.'
                        }
                    }
                },
                'address1': {
                    validators: {
                        notEmpty: {
                            message: 'The address is required.'
                        }
                    }
                },
                'zip_code': {
                    validators: {
                        notEmpty: {
                            message: 'The ZIP code is required.'
                        }
                    }
                },
                'country': {
                    validators: {
                        notEmpty: {
                            message: 'The country is required.'
                        }
                    }
                },
                'city': {
                    validators: {
                        notEmpty: {
                            message: 'The city is required.'
                        }
                    }
                },
                'timezone': {
                    validators: {
                        notEmpty: {
                            message: 'The timezone is required.'
                        }
                    }
                }
            }
        }).on('change', 'select[name=country]', function() {
            $.get('/ajax/states.php', {
                country: $(this).val()
            }).then(function(response) {
                if (response.html.length > 0) {
                    $form.find('select[name=state_id]').removeAttr('disabled').html(response
                        .html).select2({
                        theme: "bootstrap"
                    }).show();
                    $form.formValidation('enableFieldValidators', 'state_id', true)
                        .formValidation('validateField', 'state_id');
                } else {
                    $form.find('select[name=state_id]').html('<option>No state</option>').attr(
                        'disabled', 'disabled').select2({
                        theme: "bootstrap"
                    });
                    $form.formValidation('enableFieldValidators', 'state_id', false)
                        .formValidation('validateField', 'state_id');
                }
            });
        }).on('click', '.btn-timezone', function(event) {
            event.preventDefault();
            Project.Timezone.detect().then(function(response) {
                $('[name=timezone]').val(response.timezone).trigger('change');
                $('.timezone-detection').html(response.html);
                Project.Notifications.success(response.message);
            });
        }).find('[data-toggle="select2"]').select2({
            theme: "bootstrap"
        });

        $('#invoicing-information-form').on('init.field.fv', function(e, data) {
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
                'invoice_line_1': {
                    validators: {
                        notEmpty: {
                            message: 'The first line is required.'
                        }
                    }
                }
            }
        });

        $('#system-notifications-form').on('click', '.custom-control-email', function() {
            const $col = $(this).parents('.row:first').find('.col-md-5');
            if (!$(this).is(':checked')) {
                $col.addClass('none');
            } else {
                $col.removeClass('none');
            }
        });

    });
    </script>

</main>

@endsection