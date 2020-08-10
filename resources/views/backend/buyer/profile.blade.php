@extends('backend.buyer.layouts.app')
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
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{session('status')}}
            </div>
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

                        <form id="profile-form" method="post" action="{{route('buyer-profile-store')}}">
                            @csrf
                            <input type="hidden" name="action" value="profile" />

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-control-label" for="public-name">
                                            Public name <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Your name to be identified in Influencer Pulse."></i> </label>
                                        <div class="controls">
                                            <input class="form-control" type="text" name="name" id="public-name"
                                                data-e2e="public-name" maxlength="255" value="{{$user->name}}">
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

                            <button class="btn btn-primary btn-block" data-e2e="update-profile" type="submit">
                                Update Profile </button>

                        </form>

                    </div>

                </div>

                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-flag"></i> System Notifications </div>

                    <div class="card-body">

                        <form id="system-notifications-form" method="post" action="{{route('buyer-notif')}}">
                            @csrf
                            <input type="hidden" name="action" value="notifications" />

                            <div class="form-group">

                                <div class="custom-control custom-checkbox">
                                    @if($user->key_update_status==1)
                                    <input data-e2e="icheck-newsletter" type="checkbox" data-toggle="checkbox"
                                        id="system-notification-newsletter" name="newsletter_nof"
                                        class="custom-control-input" checked="checked">
                                    @else
                                    <input data-e2e="icheck-newsletter" type="checkbox" data-toggle="checkbox" 
                                        id="system-notification-newsletter" name="newsletter_nof"
                                        class="custom-control-input">
                                    @endif
                                    <label class="custom-control-label" for="system-notification-newsletter">
                                        InfluencerPulse updates <br />
                                        <small class="text-muted">
                                            Receive the latest news about InfluencerPulse in your inbox. </small>
                                    </label>
                                </div>

                            </div>

                            <hr class="mb-3">

                            <div class="form-group">

                                <div class="custom-control custom-checkbox">
                                    @if($user->lastet_status==1)
                                    <input data-e2e="icheck-rebates" type="checkbox" data-toggle="checkbox"
                                        id="system-notification-rebates" name="lastet_status"
                                        class="custom-control-input" checked="checked">
                                    @else
                                    <input data-e2e="icheck-rebates" type="checkbox" data-toggle="checkbox"
                                        id="system-notification-rebates" name="lastet_status"
                                        class="custom-control-input">
                                    @endif
                                    <label class="custom-control-label" for="system-notification-rebates">
                                        Latest DEALS <br />
                                        <small class="text-muted">
                                            Receive the latest DEALS offered in InfluencerPulse every week in your
                                            inbox. </small>
                                    </label>
                                </div>

                            </div>

                            <hr class="mb-3">

                            <div class="form-group">

                                <div class="custom-control custom-checkbox">
                                    @if($user->claimed_status==1)
                                    <input data-e2e="icheck-claim" type="checkbox" data-toggle="checkbox"
                                        id="system-notification-claim" name="claimed_status"
                                        class="custom-control-input" checked="checked">
                                    @else
                                    <input data-e2e="icheck-claim" type="checkbox" data-toggle="checkbox"
                                        id="system-notification-claim" name="claimed_status"
                                        class="custom-control-input">
                                    @endif
                                    <label class="custom-control-label" for="system-notification-claim">
                                        DEAL claim <br />
                                        <small class="text-muted">
                                            Receive an email in your inbox each time you claim a DEAL.
                                        </small>
                                    </label>
                                </div>

                            </div>

                            <hr class="mb-3">

                            <div class="form-group">

                                <div class="custom-control custom-checkbox">
                                    @if($user->purchase_status==1)
                                    <input data-e2e="icheck-purchase" type="checkbox" data-toggle="checkbox"
                                        id="system-notification-purchase" name="purchase_status"
                                        class="custom-control-input" checked="checked">
                                    @else
                                    <input data-e2e="icheck-purchase" type="checkbox" data-toggle="checkbox"
                                        id="system-notification-purchase" name="purchase_status"
                                        class="custom-control-input">
                                    @endif
                                    <label class="custom-control-label" for="system-notification-purchase">
                                        Purchase confirmation <br />
                                        <small class="text-muted">
                                            Receive an email in your inbox each time you report back a Order ID. </small>
                                    </label>
                                </div>

                            </div>

                            <button data-e2e="save-notifications" class="btn btn-primary btn-block" type="submit">
                                Save Notification Settings </button>

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
                        <a class="btn btn-primary btn-block" href="{{route('buyer.email')}}"
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
                        <a class="btn btn-primary btn-block" href="{{route('buyer.pass')}}"
                            title="Manage password">
                            Manage password </a>

                    </div>

                </div>



            </div>

        </div>

    </div>
    <input type="hidden" id="timezone_id" value="{{$user->time_zone}}">

    <script type="text/javascript">
        $(function(){
            timezone_id=$("#timezone_id").val();
            console.log("d",timezone_id)
            $("#timezone").val(timezone_id);
        })
        
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

    </script>

    <script>
    $(function() {
        

        $(document).on('click', '.btn-timezone', function(event) {
            event.preventDefault();
            Project.Timezone.detect().then(function(response) {
                $('[name=timezone]').val(response.timezone).trigger('change');
                $('.timezone-detection').html(response.html);
                Project.Notifications.success(response.message);
            });
        });

        $('#profile-form').on('init.field.fv', function(e, data) {
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
                'timezone': {
                    validators: {
                        notEmpty: {
                            message: 'The timezone is required.'
                        }
                    }
                }
            }
        }).find('[data-toggle="select2"]').select2({
            theme: "bootstrap"
        });

    });
    </script>

</main>

@endsection